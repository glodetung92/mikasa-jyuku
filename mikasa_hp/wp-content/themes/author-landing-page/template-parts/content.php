<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Book_Landing_Page
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
	<?php if( has_post_thumbnail() ){
    echo ( !is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' : '<div class="post-thumbnail">'; 
         ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'book-landing-page-with-sidebar' ) : the_post_thumbnail( 'book-landing-page-without-sidebar' ) ; 
    echo ( !is_single() ) ? '</a>' : '</div>' ;    
    } ?>
    <div class="text-holder">
    	<header class="entry-header">
        <?php
            if ( is_single() ) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }   
        ?>
    </header><!-- .entry-header -->
  	<?php if( is_single() ) { ?>
    	<footer class="entry-footer">
			<div class="entry-meta">
				<?php book_landing_page_entry_footer(); ?>
			</div><!-- .entry-meta -->
		</footer><!-- .entry-footer -->
	<?php } ?>

	<div class="entry-content">
		<?php
		if( is_single() ){
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Read More', 'author-landing-page' ), array( 'span' => array( 'class' => '' ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		 }else{ 
		 	if( false === get_post_format() ){
                    the_excerpt();
                }else{
                    the_content( sprintf(
        				/* translators: %s: Name of current post. */
        				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'author-landing-page' ), array( 'span' => array( 'class' => array() ) ) ),
        				the_title( '<span class="screen-reader-text">"', '"</span>', false )
        			) );
                }
            }
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'author-landing-page' ),
				'after'  => '</div>',
			) );
		?>

	<?php if( !is_single() ){ ?>
		<a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Read More', 'author-landing-page' ); ?></a>
    <?php }?>
	</div><!-- .entry-content -->
	<?php if( !is_single() ){ ?>
		<footer class="entry-footer">
			<div class="entry-meta">
				<?php book_landing_page_entry_footer(); ?>
			</div><!-- .entry-meta -->
		</footer><!-- .entry-footer -->
    <?php } ?>
    </div>

</article><!-- #post-## -->
