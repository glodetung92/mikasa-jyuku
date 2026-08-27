<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Book_Landing_Page
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( has_post_thumbnail() ){
    echo '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">';
         ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'book-landing-page-with-sidebar' ) : the_post_thumbnail( 'book-landing-page-without-sidebar' ) ; 
    echo '</a>';    
    } ?>
    <div class="text-holder">
    	<header class="entry-header">
            <?php the_title( '<h2 class="entry-title"><a href="' .esc_url( get_permalink() ). '" rel="bookmark">','</a></h2>' ); ?>
         </header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php book_landing_page_entry_footer(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</div>
</article><!-- #post-## -->