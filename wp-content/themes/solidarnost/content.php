<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Solidarnost_si
 * @since Twenty Twelve 1.0
 */
?>
<?php if (!is_home()) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>


		<header class="entry-header">
<!--			<?php the_post_thumbnail(); ?> -->
	
			<div class="cat-list">	<?php the_category(); ?></div>
			<div class="date-published"><?php echo strtolower( get_the_time('j. F Y') ); ?></div>
			<div class="social-media">
				<div class="list"><!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style" addthis:url="<?php the_permalink();?>" addthis:title="<?php the_title(); ?>" addthis:description="<?php the_excerpt(); ?>">
					<a class="addthis_button_facebook"></a>
					<a class="addthis_button_twitter"></a>
					<a class="addthis_button_google"></a>
					<a class="addthis_button_google_plusone_share"></a>
					<a class="addthis_button_email"></a>
					<a href="<?php the_permalink();?>" class="addthis_button_print" ></a>
					</div>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5202956113357715"></script>
					<!-- AddThis Button END --></div>
			<div class="social-media-text">Deli naprej</div>
			<div class="social-media-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/share.png" width=100%></div>

	</div>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php if ( comments_open() && 0) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content" id="entry-content-<?php the_ID() ?>">
			<?php if(is_single() ) : ?>
				<?php 
				global $more;
				$more=1;
				the_content();
				$more=0;
				?>
			<?php else : ?>
				<?php the_content('več <img class="img-none" align="center" src="'.get_template_directory_uri().'/images/more.png" border=0 width="15">', 'twentytwelve'  ); ?>

			<?php endif; ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<div class="entry-hidden entry-content" id="entry-hidden-<?php the_ID(); ?>">
			<?php 

				global $more;
				$more=1;
				the_content();
				$more=0;

			?>
			<div class="more-link" onclick="collapse(<?php the_ID(); ?>)">manj
			<img class="img-none" src="<?php echo get_template_directory_uri(); ?>/images/less.png" width="15"></div>
		</div><!-- .entry-hidden -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php //twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->

<?php else : ?> <!-- global article if -->






<div class="post-feat-wrap">
<div class="post-feat">	
<div class="post-feat-cat">
<?php 
//	$category = get_the_category(); 
	$args=array('orderby' => 'none');
	$terms = wp_get_post_terms( $post->ID , 'category', $args);
  	echo '<a href="' . esc_attr(get_term_link($terms[0], 'category')) . '" title="' . sprintf( __( "View all posts in %s" ), $terms[0]->name ) . '" ' . '>' . $terms[0]->name.'</a> '; 
?>
</div>
<?php if (has_post_thumbnail()) : ?>
<div class="post-feat-thumb"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a></div>
<?php elseif($category[0]->slug=="v-medijih") :?>
<div class="post-feat-thumb"><a href="<?php the_permalink(); ?>" rel="bookmark"><img class="img-none" src="<?php echo get_template_directory_uri(); ?>/images/Mediji_290x218.jpg"></a></div>
<?php elseif($category[0]->slug=="sporocila-za-javnost") :?>
<div class="post-feat-thumb"><a href="<?php the_permalink(); ?>" rel="bookmark"><img class="img-none" src="<?php echo get_template_directory_uri(); ?>/images/Sporocila_za_javnost_290x218.jpg"></a></div>
<?php elseif($category[0]->slug=="dogodki") :?>
<div class="post-feat-thumb"><a href="<?php the_permalink(); ?>" rel="bookmark"><img class="img-none" src="<?php echo get_template_directory_uri(); ?>/images/Dogodki_290x218.jpg"></a></div>
<?php elseif($category[0]->slug=="blog") :?>
<div class="post-feat-thumb"><a href="<?php the_permalink(); ?>" rel="bookmark"><img class="img-none" src="<?php echo get_template_directory_uri(); ?>/images/Blog_290x218.jpg"></a></div>
<?php else : ?>
<div class="post-feat-nothumb"></div>
<?php endif; ?>
<div class="post-feat-content"><div class="post-feat-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></div><?php echo get_post_meta(get_the_ID(), "podnaslov", true); ?></div>
<div class="post-feat-excerpt"><?php echo solidarnost_excerpt(30); //the_excerpt(); ?></div>
<div class="post-feat-more"><a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/images/more-post.png"  width="40px"/></a></div>

</div>

</div>



<?php endif; ?> <!-- global article if -->