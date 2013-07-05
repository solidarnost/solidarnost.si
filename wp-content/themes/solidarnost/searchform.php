<?php /* idea from: http://codex.wordpress.org/Function_Reference/get_search_form */ ?>
<form action="<?php echo home_url( '/' ); ?>" method="get">
    <fieldset>
        <input type="image" alt="Search" src="<?php echo get_template_directory_uri(); ?>/images/search.png" />
        <input type="text" name="s" id="search" style="vertical-align: top" size=40 value="<?php the_search_query(); ?>" />
    </fieldset>
</form>

