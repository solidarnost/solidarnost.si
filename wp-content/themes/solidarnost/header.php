<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

<div id="topbar"><div class="sform"><?php get_search_form(); ?></div><div class="socialbuttons">
<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png">
<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png">
<img src="<?php echo get_template_directory_uri(); ?>/images/gplus.png">
</div>
</div>
<div class="logobanner">
<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/logo.png" alt="Logotip stranke Solidarnost"></div>
<div class="parole"><?php bloginfo( 'description' ); ?></div>
</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	<div class="overflow"></div>
	</header><!-- #masthead -->
	<div id="main" class="wrapper">

<?php 
/* SAMO: Tukaj vrinem notri slider (carousel). Povzeto po temi Magazino. */
 if (is_home()) :
?>

        <div id="slide-wrap">
			  <?php 
                $args = array(
                    'posts_per_page' => 4,
					'post_status' => 'publish',
                    'post__in' => get_option("sticky_posts")
                );
                $fPosts = new WP_Query( $args );
				$countPosts = $fPosts->found_posts;
              ?>
    
                <?php if ( $fPosts->have_posts() ) : ?>
                  
                  <?php if ($countPosts > 1) : ?>
                  <div id="load-cycle"></div>
                  <div class="cycle-slideshow" <?php 
				  	if ( get_theme_mod('solidarnost_slider_effect') ) {
						echo 'data-cycle-fx="' . wp_kses_post( get_theme_mod('solidarnost_slider_effect') ) . '" data-cycle-tile-count="10"';
					} else {
						echo 'data-cycle-fx="scrollVert"';
					}
				  ?> data-cycle-slides="> div.slides" <?php
                  	if ( get_theme_mod('solidarnost_slider_timeout') ) {
						$slider_timeout = wp_kses_post( get_theme_mod('solidarnost_slider_timeout') );
						if ( $slider_timeout != 0 || $slider_timeout != '' ) {
							echo 'data-cycle-timeout="' . $slider_timeout . '000" data-cycle-pause-on-hover="true"';
						} else {
							echo 'data-cycle-timeout="5000"';
						}
					} else {
						echo 'data-cycle-timeout="5000"';
					}
				  ?> data-cycle-prev="#sliderprev" data-cycle-next="#slidernext">
                  	<?php if ( get_theme_mod('solidarnost_slider_pager') ) : ?>
                  	<div class="cycle-pager"></div>
                    <?php endif; ?>
                    <?php /* Start the Loop */ ?>
                    <?php while ( $fPosts->have_posts() ) : $fPosts->the_post(); ?>
                    
                    <div class="slides">
                      <div id="post-<?php the_ID(); ?>" <?php post_class('post-theme'); ?>>
                         <?php if ( has_post_thumbnail()) : ?>
                            <div class="slide-thumb"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'magazino' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail( array(1000, 640), array( 'style' => 'position:absolute', 'onload' => 'feat_img_onload(this)' ) ); ?></a></div>
                         <?php else : ?>
                         
							<?php $postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
                            if ( !empty($postimgs) ) :
                                $firstimg = array_shift( $postimgs );
                                $my_image = wp_get_attachment_image( $firstimg->ID, array( 1000, 640 ), false, array( 'style' => 'position:absolute', 'onload' => 'feat_img_onload(this)') );
                            ?>
                            <div class="slide-thumb"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'magazino' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $my_image; ?></a></div>
                            
                            <?php else : ?>
                         	
                            <div class="slide-noimg"><?php _e('No featured image set for this post.', 'magazino') ?></div>
                            
                           <?php endif; ?>
                           
                         <?php endif; ?>
                         <div class="slide-content">
                            <h2 class="slide-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'magazino' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                         	<?php echo solidarnost_excerpt(25); ?>	
                         </div>						
                      </div>
                    </div>
                    
                    <?php endwhile; ?>

                    <?php wp_reset_query(); // reset the query ?>

                  </div>
                  
                  <div class="slidernav">
                        <a id="sliderprev" href="#" title="<?php _e('Previous', 'magazino'); ?>"><?php _e('&#9650;', 'magazino'); ?></a>
                        <a id="slidernext" href="#" title="<?php _e('Next', 'magazino'); ?>"><?php _e('&#9660;', 'magazino'); ?></a>
                    </div>
                    
                    <div class="clearfix"></div>
                  
                  <?php else : ?>
                  
                  <?php /* Start the Loop */ ?>
                   <?php while ( $fPosts->have_posts() ) : $fPosts->the_post(); ?>
                  	<div class="slides">
                      <div id="post-<?php the_ID(); ?>" <?php post_class('post-theme'); ?>>
                         <?php if ( has_post_thumbnail()) : ?>
                            <div class="slide-thumb"><?php the_post_thumbnail( array(1000, 640) ); ?></div>
                         <?php else : ?>
                            <div class="slide-noimg"><?php _e('No featured image set for this post.', 'magazino') ?></div>
                         <?php endif; ?>
                         <div class="slide-content">
                            <h2 class="slide-title"><?php the_title(); ?></h2>
                         	<?php echo solidarnost_excerpt(25); ?>	
                         </div>						
                      </div>
                    </div>
                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); // reset the query ?>
                  
                  <?php endif; ?>
                  
                <?php endif; ?>
                    
              </div>
<div class="grnbar"></div>
<?php endif; // is_home ?>
