<?php
/**
 * Features Section
 * 
 * @package Book_Landing_Page
 */
$section_title   = get_theme_mod( 'book_landing_page_features_section_title' );
$section_content = get_theme_mod( 'book_landing_page_features_section_content' );
$block_one       = get_theme_mod( 'book_landing_page_features_block_one' );
$block_two       = get_theme_mod( 'book_landing_page_features_block_two' );
$block_three     = get_theme_mod( 'book_landing_page_features_block_three' );
$block_four      = get_theme_mod( 'book_landing_page_features_block_four' );
$block_five      = get_theme_mod( 'book_landing_page_features_block_five' );
$block_six       = get_theme_mod( 'book_landing_page_features_block_six' );    
$features_blocks = array( $block_one, $block_two, $block_three, $block_four, $block_five, $block_six );
$features_blocks = array_diff( array_unique( $features_blocks  ), array('') );
$features_qry = new WP_Query( array( 
    'post_type'             => 'post',
    'posts_per_page'        => -1,
    'post__in'              => $features_blocks,
    'orderby'               => 'post__in',
    'ignore_sticky_posts'   => true
) ); 
if( $section_title || $section_content || $features_blocks ){ ?>
<section class="about" id="features_section">
    <div class="container">
        <?php if( $section_title || $section_content ){ ?>
            <header class="header">
                <?php 
                    if( $section_title ) echo '<h2 class="main-title">'. esc_html( $section_title ) .'</h2>';
                    if( $section_content ) echo wpautop( wp_kses_post( $section_content ) );         
                ?>
            </header>
        <?php } 
             if( $features_blocks && $features_qry->have_posts() ){
            ?>
                <div class="row">
                    <?php
                        while( $features_qry->have_posts() ){
                        $features_qry->the_post(); ?>
                            <div class="col">
                                <div class="holder">
                                    <?php
                                    echo '<div class="img-holder">';
                                        if( has_post_thumbnail() ){ 
                                            the_post_thumbnail( 'book-landing-page-featured-post' ); 
                                        }else{
                                            book_landing_page_get_fallback_svg( 'book-landing-page-featured-post' );
                                        } 
                                    echo '</div>';
                                    ?>
                                    <div class="text-holder">
                                        <h2 class="title"><?php the_title(); ?></h2>
                                            <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                        wp_reset_postdata();
                    ?>
                </div>
         <?php } ?>
    </div>
</section>
<?php }
   