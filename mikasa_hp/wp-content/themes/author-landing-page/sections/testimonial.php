<?php
/**
 * Testimonial Section
 * 
 * @package Book_Landing_Page
 */

$section_title = get_theme_mod( 'book_landing_page_testimonial_section_title' );
$section_content = get_theme_mod( 'book_landing_page_testimonial_section_content' );
$block_post_one = get_theme_mod( 'book_landing_page_testimonial_block_one' );
$block_post_two = get_theme_mod( 'book_landing_page_testimonial_block_two' );
$testimonial_blocks = array( $block_post_one, $block_post_two );
$testimonial_blocks = array_filter( $testimonial_blocks );
$testimonial_qry = new WP_Query( array( 
    'post_type'             => 'post',
    'posts_per_page'        => -1,
    'post__in'              => $testimonial_blocks,
    'orderby'               => 'post__in',
    'ignore_sticky_posts'   => true
) );
?>
<section class="testimonial" id="testimonial_section">
    <div class="container">
        <?php if( $section_title || $section_content ){ ?>
                <header class="header">
                    <?php 
                        if( $section_title ) echo '<h2 class="main-title">'. esc_html( $section_title) .'</h2>';
                        if( $section_content ) echo wpautop( wp_kses_post( $section_content ) );       
                    ?>
                </header>
            <?php
             }
            if( $testimonial_blocks && $testimonial_qry->have_posts() ){ 
                ?>
                <div class="row">
                <?php
                    while( $testimonial_qry->have_posts() ){
                        $testimonial_qry->the_post();
                    ?>
                    <div class="col">
                        <blockquote>
                        	 <svg xmlns="http://www.w3.org/2000/svg" width="48" height="30.047" viewBox="0 0 48 30.047"><path id="noun_Quote_89663_000000" d="M5.129,40.776a9.664,9.664,0,0,1,9.121-8.161C13.13,28.455,10.41,26.8,7.1,25.841a.387.387,0,0,1-.267-.427l.533-3.307s.053-.267.48-.213C19.264,23.174,27,31.868,25.558,42.43c-1.333,7.308-7.041,10.135-12.322,9.388A9.726,9.726,0,0,1,5.129,40.776ZM41.56,32.615c-1.067-4.161-3.894-5.814-7.148-6.774a.387.387,0,0,1-.267-.427l.48-3.307s.053-.267.48-.213c11.415,1.227,19.1,9.921,17.762,20.483-1.387,7.361-7.148,10.188-12.375,9.441a9.649,9.649,0,0,1-8.054-11.041A9.52,9.52,0,0,1,41.56,32.615Z" transform="translate(53.018 51.934) rotate(180)"/></svg>
                            <?php the_content(); ?>
                        </blockquote>
                        <cite>
                            <span class="img-holder">
                                <a href="<?php the_permalink(); ?>" >
                                    <?php
                                    if( has_post_thumbnail() ){ 
                                        the_post_thumbnail( 'book-landing-page-recent-post' ); 
                                    }else{
                                        book_landing_page_get_fallback_svg( 'book-landing-page-recent-post' );
                                    } ?>
                                </a>
                            </span>
                            <div class="text-holder">
                                <?php the_title('<strong class="name">','</strong>');
                                if( has_excerpt() ){
                                    the_excerpt();
                                } ?>
                                </div>
                        </cite>
                    </div> 
                <?php
                    }
                    wp_reset_postdata();
                ?>
                </div>
        <?php } ?>
    </div>
</section>
<?php 
