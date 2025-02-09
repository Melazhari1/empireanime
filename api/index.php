<?php
function dd($variable) {
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

function dump_variable($var, $depth = 0) {
    if ($depth > 10) { echo "<span class='dump-null'>...</span>"; return; }

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

class AnimeNewsScraper {
    // URL to scrape news from
    private $url;

    public function __construct($url = 'https://www.animenewsnetwork.com/news/') {
        $this->url = $url;
    }

    /**
     * Fetches the raw HTML content from the URL using cURL.
     *
     * @return string|false The HTML content or false on failure.
     */
    private function fetchContent($url) {
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
    public function scrapeNews() {
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
            $thumbnail = '';
            if ($link) {
            $link = 'https://www.animenewsnetwork.com' . $link;
            $fullContentHtml = $this->fetchContent($link);
            
            if ($fullContentHtml !== false) {
                $fullDoc = new DOMDocument();
                libxml_use_internal_errors(true);
                $fullDoc->loadHTML($fullContentHtml);
                libxml_clear_errors();

                $fullXpath = new DOMXPath($fullDoc);

                // Get the full text content (assuming it's in a <div> with class 'full-text')
                $fullTextNode = $fullXpath->query("//div[contains(@class, 'meat')]")->item(0);
                $fullContent = $fullTextNode ? trim($fullTextNode->textContent) : '';
                dd($fullTextNode);die;
                // Get the first image for the thumbnail (assuming it's in an <img> tag)
                $imageNode = $fullXpath->query("//img")->item(0);
                $thumbnail = $imageNode ? $imageNode->getAttribute('src') : '';
                $thumbnail = 'https://www.animenewsnetwork.com' . $thumbnail;
            }
            }

            $newsItems[] = [
            'title'       => $title,
            'link'        => $link,
            'time'        => $time,
            'fullContent' => $fullContent,
            'thumbnail'   => $thumbnail,
            ];
        }
        return $newsItems;
    }
    
}

// Example usage:
$scraper = new AnimeNewsScraper();
$news = $scraper->scrapeNews();

dd($news);die;
?>
