<?php 
/**
 *Implementing the Parent theme banner with static banner in child theme
*/
function book_landing_page_customize_register_banner( $wp_customize ) {

	global $book_landing_page_options_posts;
    /** Banner Section */
    $wp_customize->get_section( 'header_image' )->panel       = 'book_landing_page_home_page_settings';
    $wp_customize->get_section( 'header_image' )->title       = __( 'Banner Section', 'author-landing-page' );
    $wp_customize->get_section( 'header_image' )->priority    = 20;
    $wp_customize->get_section( 'header_image' )->description = '';
    $wp_customize->get_setting( 'header_image' )->transport   = 'refresh';

	/** Banner Section */
    $wp_customize->add_section(
        'book_landing_page_banner_settings',
        array(
            'title' => __( 'Banner Section', 'author-landing-page' ),
            'priority' => 20,
            'panel' => 'book_landing_page_home_page_settings',
        )
    );
        
    /** Enable/Disable Banner Section */
    $wp_customize->add_setting(
        'book_landing_page_ed_banner_section',
        array(
            'default' => '',
            'sanitize_callback' => 'book_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'book_landing_page_ed_banner_section',
        array(
            'label' => __( 'Enable Banner Section', 'author-landing-page' ),
            'section' => 'header_image',
            'type' => 'checkbox',
        )
    );
    
    /** Banner Post */
    $wp_customize->add_setting(
        'book_landing_page_banner_section_post',
        array(
            'default' => '',
            'sanitize_callback' => 'book_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'book_landing_page_banner_section_post',
        array(
            'label' => __( 'Select Post', 'author-landing-page' ),
            'section' => 'header_image',
            'type' => 'select',
            'choices' => $book_landing_page_options_posts,
        )
    );
   
    /** Promotional Section Button Text */
    $wp_customize->add_setting(
        'book_landing_page_banner_section_button_text',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'book_landing_page_banner_section_button_text',
        array(
            'label' => __( 'Banner Section Button Text', 'author-landing-page' ),
            'section' => 'header_image',
            'type' => 'text',
        )
    );

    /** banner Section Button Link */
    $wp_customize->add_setting(
        'book_landing_page_banner_section_button_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'book_landing_page_banner_section_button_link',
        array(
            'label' => __( 'Banners Section Button Link', 'author-landing-page' ),
            'section' => 'header_image',
            'type' => 'text',
        )
    );

    /** Upload a Accepted Cards Image */
    $wp_customize->add_setting(
        'book_landing_page_banner_image',
        array(
            'default' => '',
            'sanitize_callback' => 'book_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'book_landing_page_banner_image',
           array(
               'label'      => __( 'Upload Accepted Cards Image', 'author-landing-page' ),
               'section'    => 'header_image',
           )
       )
    );
    /** Banner Section Ends */
}

/**
 * Add Child theme info
 */
function book_landing_page_customizer_theme_info( $wp_customize ) {
    
    $wp_customize->add_section( 'theme_info_section', array(
        'title'       => __( 'Demo & Documentation' , 'author-landing-page' ),
        'priority'    => 6,
    ) );
    
    /** Important Links */
    $wp_customize->add_setting( 'theme_info_setting',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<p>';

    /* translators: 1: string, 2: preview url, 3: string */
    $theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Demo Link : ', 'author-landing-page' ), esc_url( __( 'https://rarathemes.com/previews/?theme=author-landing-page', 'author-landing-page' ) ), esc_html__( 'Click here.', 'author-landing-page' ) );

    $theme_info .= '</p><p>';

    /* translators: 1: string, 2: documentation url, 3: string */
    $theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Documentation Link : ', 'author-landing-page' ), esc_url( 'https://docs.rarathemes.com/docs/author-landing-page/' ), esc_html__( 'Click here.', 'author-landing-page' ) );

    $theme_info .= '</p>';

    $wp_customize->add_control( new Book_Landing_Page_Note_Control( $wp_customize,
        'theme_info_setting', 
            array(
                'section'     => 'theme_info_section',
                'description' => $theme_info
            )
        )
    );
    
}
add_action( 'customize_register', 'book_landing_page_customizer_theme_info',15 );

/*
Overriding Footer for Child Theme
*/
function book_landing_page_footer_credit(){
  $copyright_text = get_theme_mod( 'book_landing_page_footer_copyright_text' );
  echo '<div class="site-info"><span class="copyright">';
    if( $copyright_text ){
      echo wp_kses_post( $copyright_text ); 
    }else{
      esc_html_e( 'Copyright &copy; ', 'author-landing-page' ); 
      echo date_i18n( esc_html__( 'Y', 'author-landing-page' ) );
      echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) );
      echo '</a>';
    }
    echo "</span>";
    echo esc_html__( 'Author Landing Page | Developed By ', 'author-landing-page' );
    echo '<span class="author-link"><a href="' . esc_url( 'https://rarathemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Rara Theme ', 'author-landing-page' ) . '</a>';
    printf( esc_html__( 'Powered by %s ', 'author-landing-page' ), '<span class="wp-link"><a href="'. esc_url( __( 'https://wordpress.org/', 'author-landing-page' ) ) .'" target="_blank">WordPress.</a></span>' );
    if ( function_exists( 'the_privacy_policy_link' ) ) {
        the_privacy_policy_link();
    }
  echo '</div>';

}