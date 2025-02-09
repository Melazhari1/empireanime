<h3 class="my-3">
<?php if (is_category()) : single_cat_title(); elseif ( is_post_type_archive()) : post_type_archive_title(); elseif ( is_tax() ) : single_term_title(); elseif (is_tag()) : single_tag_title(); echo tag_description(); elseif (is_date()) : single_month_title(' '); endif; ?>
</h3> 

<div class="line my-3"></div>