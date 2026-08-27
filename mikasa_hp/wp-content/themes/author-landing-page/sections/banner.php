<?php
/**
 * Banner Section
 * 
 * @package book_landing_Page
 */
$banner_post  = get_theme_mod('book_landing_page_banner_section_post');
$banner_image = get_theme_mod( 'book_landing_page_banner_image' );
$button_text  = get_theme_mod( 'book_landing_page_banner_section_button_text' );
$button_link  = get_theme_mod( 'book_landing_page_banner_section_button_link' );
$header_image = get_header_image(); 
$banner_style = 'background:url(' . esc_url( $header_image ) . ') no-repeat; background-size: cover;';
$banner_qry = new WP_Query( 
        array(
                'p'           => $banner_post,
                'post_type'   => 'post',
                'post_status' => 'publish',
        ));
if( $banner_post && $banner_qry->have_posts() ){
 $banner_qry->the_post(); ?>  
        <section class="banner" id="banner_section">
            <div class="custom-bg" style="<?php echo esc_attr( $banner_style ); ?>">
            <div class="banner-holder">
                 <div class="book-banner-holder">
                    <?php 
                        if( has_post_thumbnail() ){
                            the_post_thumbnail( 'author-landing-page-banner-image', array( 'itemprop' => 'image' ) );
                        }
                    ?>
                </div>
                <div class="caption-holder">
                    <div class="text-holder">
                        <?php 
                            the_title( '<h2 class="title">', '</h2>'); 
                            the_excerpt();
                            if ( $button_text ) { ?>
                                <a href="<?php echo esc_url( $button_link ); ?>" class="btn-buy"><?php echo esc_html( $button_text ); ?></a>
                            <?php } if( $banner_image ){ 
                                echo '<div class="cards"><img src="' . esc_url( $banner_image ) . '" alt="' . the_title_attribute( 'echo=0' ) . '" ></div>'; 
                            } 
                        ?>
                    </div>
                </div>
            </div>
     </div>
</section>
<?php wp_reset_postdata(); }