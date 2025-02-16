<?php
function dd($variable)
{
    echo '<style>
        .dump-container { background: #282c34; color: #abb2bf; padding: 10px; border-radius: 5px; font-family: monospace; font-size: 14px; white-space: pre-wrap; word-wrap: break-word; }
        .dump-key { color: #61afef; }
        .dump-type { color: #98c379; }
        .dump-string { color: #e5c07b; }
        .dump-int { color: #d19a66; }
        .dump-float { color: #c678dd; }
        .dump-bool { color: #56b6c2; }
        .dump-null { color: #be5046; }
    </style>';

    echo '<div class="dump-container">';
    dump_variable($variable);
    echo '</div>';
}

function dump_variable($var, $depth = 0)
{
    if ($depth > 10) {
        echo "<span class='dump-null'>...</span>";
        return;
    }

    if (is_array($var)) {
        echo "<span class='dump-type'>Array</span> (\n";
        foreach ($var as $key => $value) {
            echo str_repeat("  ", $depth + 1) . "<span class='dump-key'>[$key]</span> => ";
            dump_variable($value, $depth + 1);
        }
        echo str_repeat("  ", $depth) . ")\n";
    } elseif (is_object($var)) {
        $class = get_class($var);
        echo "<span class='dump-type'>Object ($class)</span> {\n";
        foreach (get_object_vars($var) as $key => $value) {
            echo str_repeat("  ", $depth + 1) . "<span class='dump-key'>$key</span>: ";
            dump_variable($value, $depth + 1);
        }
        echo str_repeat("  ", $depth) . "}\n";
    } elseif (is_string($var)) {
        echo "<span class='dump-string'>\"$var\"</span>\n";
    } elseif (is_int($var)) {
        echo "<span class='dump-int'>$var</span>\n";
    } elseif (is_float($var)) {
        echo "<span class='dump-float'>$var</span>\n";
    } elseif (is_bool($var)) {
        echo "<span class='dump-bool'>" . ($var ? 'true' : 'false') . "</span>\n";
    } elseif (is_null($var)) {
        echo "<span class='dump-null'>NULL</span>\n";
    } else {
        echo "<span class='dump-null'>Unknown Type</span>\n";
    }
}

class AnimeNewsScraper
{
    // URL to scrape news from
    private $url;

    public function __construct($url = 'https://www.animenewsnetwork.com/news/')
    {
        $this->url = $url;
    }

    /**
     * Fetches the raw HTML content from the URL using cURL.
     *
     * @return string|false The HTML content or false on failure.
     */
    private function fetchContent($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // Return the content instead of printing it out
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set a user agent (some sites block default cURL user agents)
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; AnimeNewsScraper/1.0)');
        $html = curl_exec($ch);
        if (curl_errno($ch)) {
            // Error handling
            echo 'Curl error: ' . curl_error($ch);
            curl_close($ch);
            return false;
        }
        curl_close($ch);
        return $html;
    }

    /**
     * Scrapes news items from the fetched HTML.
     *
     * @return array An array of news items, each as an associative array with title, link, and time.
     */
    public function scrapeNews()
    {
        $html = $this->fetchContent($this->url);
        if ($html === false) {
            return [];
        }

        // Create a new DOMDocument and load the HTML
        $doc = new DOMDocument();
        // Suppress errors due to malformed HTML
        libxml_use_internal_errors(true);
        $doc->loadHTML($html);
        libxml_clear_errors();

        // Create a new DOMXPath to query the DOM
        $xpath = new DOMXPath($doc);
        $newsItems = [];

        // Example XPath: if news items are contained in <article> tags.
        // Adjust this XPath query based on the current site structure.
        $articles = $xpath->query("//div[contains(@data-topics, 'anime') and contains(@data-topics, 'news')]");
        // Find articles with data-topics attribute containing 'anime' and 'news'


        // If no <article> tags are found, you may need to adjust the query.
        if ($articles->length === 0) {
            // For example, try looking for list items in a container that holds news.
            $articles = $xpath->query("//div[contains(@class, 'news')]//div[contains(@class, 'item')]");
        }



        // Loop through each article/news item found
        foreach ($articles as $article) {
            // Get the title text (assuming it's in an <h3> or similar heading tag)
            $titleNode = $xpath->query(".//h3", $article)->item(0);
            $title = $titleNode ? trim($titleNode->textContent) : 'No Title';

            // Get the link URL (assuming the title is wrapped in an <a> tag)
            $linkNode = $xpath->query(".//a", $article)->item(0);
            $link = $linkNode ? $linkNode->getAttribute('href') : '';

            // Get the publication time (if available, for example in a <time> tag)
            $timeNode = $xpath->query(".//time", $article)->item(0);
            $time = $timeNode ? trim($timeNode->textContent) : '';

            // Fetch the full article content
            $fullContent = '';
            $thumbnailNode = $xpath->query(".//div[contains(@class, 'thumbnail')]", $article)->item(0);
            $thumbnail = $thumbnailNode ? $thumbnailNode->getAttribute('data-src') : '';
            $thumbnail = 'https://www.animenewsnetwork.com' . $thumbnail;
            $hookNode = $xpath->query(".//span[contains(@class, 'hook')]", $article)->item(0);
            $postexcerpt = $hookNode ? trim($hookNode->textContent) : '';
            $newsItems[] = [
                'title'       => $title,
                'link'        => $link,
                'time'        => $time,
                'thumbnail'   => $thumbnail,
                'excerpt' => $postexcerpt,
            ];
        }
        return $newsItems;
    }
}

// Example usage:
$scraper = new AnimeNewsScraper();
$news = $scraper->scrapeNews();

// Include WordPress functions
require_once('../wp-load.php');

// Insert news items into WordPress posts
foreach ($news as $item) {
    // Prepare post data
    $post_data = [
        'post_title'    => $item['title'],
        'post_status'   => 'draft',
        'post_author'   => 1, // Change to the desired author ID
        'post_category' => [get_cat_ID('news')], // Ensure 'news' category exists
        'post_excerpt'  => $item['excerpt'],
    ];
    // Check if a post with the same title already exists
    $existing_post = get_posts([
        'title'        => $item['title'],
        'post_type'    => 'post',
        'post_status'  => 'any',
        'numberposts'  => 1,
    ]);
    $existing_post = !empty($existing_post) ? $existing_post[0] : null;
    if ($existing_post) {
        // Skip this item if a post with the same title already exists
        continue;
    }
    // Insert the post into the database
    $post_id = wp_insert_post($post_data);

    // Set post thumbnail if available
    if ($item['thumbnail']) {
        // Download the image
        $image_url = $item['thumbnail'];
        $upload_dir = wp_upload_dir();
        $image_data = file_get_contents($image_url);
        $filename = basename($image_url);
        if (wp_mkdir_p($upload_dir['path'])) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        file_put_contents($file, $image_data);

        // Check the type of file. We'll use this as the 'post_mime_type'.
        $wp_filetype = wp_check_filetype($filename, null);

        // Prepare an array of post data for the attachment.
        $attachment = [
            'post_mime_type' => $wp_filetype['type'],
            'post_title'     => sanitize_file_name($filename),
            'post_content'   => '',
            'post_status'    => 'inherit'
        ];

        // Insert the attachment.
        $attach_id = wp_insert_attachment($attachment, $file, $post_id);

        // Generate the metadata for the attachment, and update the database record.
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attach_data = wp_generate_attachment_metadata($attach_id, $file);
        wp_update_attachment_metadata($attach_id, $attach_data);

        // Set the featured image
        set_post_thumbnail($post_id, $attach_id);
    }
}
