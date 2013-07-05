<?php /* idea from: http://codex.wordpress.org/Function_Reference/get_search_form */ ?>
<form action="<?php echo home_url( '/' ); ?>" method="get">
    <fieldset>
        <input type="image" alt="Search" style="vertical-align: middle" src="<?php echo get_template_directory_uri(); ?>/images/search.png" />
        <input type="text" name="s" id="search" style="vertical-align: middle" size=40 value="<?php the_search_query(); ?>" />
    </fieldset>
</form>

