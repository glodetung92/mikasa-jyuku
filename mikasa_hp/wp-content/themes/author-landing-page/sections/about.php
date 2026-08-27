<?php
/**
 * About Section
 * 
 * @package Book_Landing_Page
 */
$about_section_title   = get_theme_mod( 'book_landing_page_about_section_title');
$about_section_content = get_theme_mod( 'book_landing_page_about_section_content');
$about_video           = get_theme_mod( 'book_landing_page_about_video');
$about_section_post    = get_theme_mod( 'book_landing_page_about_section_post' );
?>
<section class="about-author" id="about_section">
    <div class="container">
        <?php if( $about_section_title || $about_section_content ){ ?>
            <header class="header">
                <?php 
                    if( $about_section_title ) echo '<h2 class="main-title">'. esc_html( $about_section_title ) .'</h2>';
                    if( $about_section_content ) echo '<p>'. wpautop( wp_kses_post( $about_section_content ) ).'</p>';             
                ?>
            </header>
        <?php } ?>
        <div class="row">
            <?php
                if( $about_section_post ){
                $about_qry = new WP_Query( "p=$about_section_post" );

                if( $about_qry->have_posts() ){
                    while( $about_qry->have_posts() ){
                        $about_qry->the_post();
                        echo '<div class="col">';
                            echo '<div class="video-holder">';
                                if( $about_video ){ 
                                    if( book_landing_page_iframe_match( $about_video ) ){    
                                        echo book_landing_page_sanitize_iframe( $about_video );         
                                    }else{
                                        echo wp_oembed_get( $about_video );
                                    }   
                                }else{
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'author-landing-page-about-block' ); 
                                    }else{
                                        book_landing_page_get_fallback_svg( 'thumbnail' );
                                    }
                                }
                            echo '</div>';
                        echo '</div>';
                        ?>
                        <div class="col">
                            <div class="text-holder">
                            <?php 
                                 the_title( '<h3 class="title">', '</h3>'); 
                                 the_content(); 
                            ?>
                            </div>
                        </div>
                    <?php }
                    wp_reset_postdata();
                } 
            } ?>
        </div>
    </div>
</section>
<?php 
