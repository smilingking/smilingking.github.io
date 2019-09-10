<?php
/**
 * All Purpose Theme Customizer
 *
 * @package All Purpose
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function seos_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	

/***********************************************************************************
 * Sanitize Functions
***********************************************************************************/
					
		function seos_sanitize_checkbox( $input ) {
			if ( $input ) {
				return 1;
			}
			return 0;
		}
/***********************************************************************************/
		
		function seos_sanitize_social( $input ) {
			$valid = array(
				'' => esc_attr__( ' ', 'seos' ),
				'_self' => esc_attr__( '_self', 'seos' ),
				'_blank' => esc_attr__( '_blank', 'seos' ),
			);

			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
		
		
/***********************************************************************************
 * Social media option
***********************************************************************************/
 
		$wp_customize->add_section( 'seos_social_section' , array(
			'title'       => __( 'Social Media', 'seos' ),
			'description' => __( 'Social media buttons', 'seos' ),
			'priority'   => 64,
		) );
		
		$wp_customize->add_setting( 'social_media_activate_header', array (
			'sanitize_callback' => 'seos_sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_media_activate_header', array(
			'label'    => __( 'Activate Social Icons in Header:', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'social_media_activate_header',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'social_media_activate', array (
			'sanitize_callback' => 'seos_sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_media_activate', array(
			'label'    => __( 'Activate Social Icons in Footer:', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'social_media_activate',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'seos_social_link_type', array (
			'sanitize_callback' => 'seos_sanitize_social',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_social_link_type', array(
			'label'    => __( 'Link Type', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_social_link_type',
			'type'     =>  'select',
            'choices'  => array(
				'' => esc_attr__( ' ', 'seos' ),
				'_self' => esc_attr__( '_self', 'seos' ),
				'_blank' => esc_attr__( '_blank', 'seos' ),
            ),			
		) ) );
		
		$wp_customize->add_setting( 'social_media_color', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
				
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_media_color', array(
			'label'    => __( 'Social Icons Color:', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'social_media_color',
		) ) );
				
		$wp_customize->add_setting( 'social_media_hover_color', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
				
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_media_hover_color', array(
			'label'    => __( 'Social Hover Icons Color:', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'social_media_hover_color',
		) ) );
		
		$wp_customize->add_setting( 'seos_facebook', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_facebook', array(
			'label'    => __( 'Enter Facebook url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_facebook',
		) ) );
	
		$wp_customize->add_setting( 'seos_twitter', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_twitter', array(
			'label'    => __( 'Enter Twitter url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_twitter',
		) ) );

		$wp_customize->add_setting( 'seos_google', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_google', array(
			'label'    => __( 'Enter Google+ url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_google',
		) ) );
		
		$wp_customize->add_setting( 'seos_linkedin', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_linkedin', array(
			'label'    => __( 'Enter Linkedin url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_linkedin',
		) ) );


		$wp_customize->add_setting( 'seos_rss', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_rss', array(
			'label'    => __( 'Enter RSS url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_rss',
		) ) );
		
		$wp_customize->add_setting( 'seos_pinterest', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_pinterest', array(
			'label'    => __( 'Enter Pinterest url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_pinterest',
		) ) );
		
		$wp_customize->add_setting( 'seos_youtube', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_youtube', array(
			'label'    => __( 'Enter Youtube url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_youtube',
		) ) );
					
		$wp_customize->add_setting( 'seos_vimeo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_vimeo', array(
			'label'    => __( 'Enter Vimeo url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_vimeo',
		) ) );
		
							
		$wp_customize->add_setting( 'seos_instagram', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_instagram', array(
			'label'    => __( 'Enter Ynstagram url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_instagram',
		) ) );
			
		$wp_customize->add_setting( 'seos_stumbleupon', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_stumbleupon', array(
			'label'    => __( 'Enter Stumbleupon url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_stumbleupon',
		) ) );
											
		$wp_customize->add_setting( 'seos_flickr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_flickr', array(
			'label'    => __( 'Enter Flickr url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_flickr',
		) ) );
		
													
		$wp_customize->add_setting( 'seos_dribbble', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_dribbble', array(
			'label'    => __( 'Enter Dribbble url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_dribbble',
		) ) );
															
		$wp_customize->add_setting( 'seos_digg', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_digg', array(
			'label'    => __( 'Enter Digg url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_digg',
		) ) );
																	
		$wp_customize->add_setting( 'seos_skype', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_skype', array(
			'label'    => __( 'Enter Skype url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_skype',
		) ) );
																			
		$wp_customize->add_setting( 'seos_deviantart', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_deviantart', array(
			'label'    => __( 'Enter Deviantart url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_deviantart',
		) ) );
																					
		$wp_customize->add_setting( 'seos_yahoo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_yahoo', array(
			'label'    => __( 'Enter Yahoo url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_yahoo',
		) ) );
																							
		$wp_customize->add_setting( 'seos_reddit_alien', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_reddit_alien', array(
			'label'    => __( 'Enter Reddit Alien url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_reddit_alien',
		) ) );
		
																									
		$wp_customize->add_setting( 'seos_paypal', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_paypal', array(
			'label'    => __( 'Enter Paypal url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_paypal',
		) ) );
																											
		$wp_customize->add_setting( 'seos_dropbox', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_dropbox', array(
			'label'    => __( 'Enter Dropbox url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_dropbox',
		) ) );
																													
		$wp_customize->add_setting( 'seos_soundcloud', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_soundcloud', array(
			'label'    => __( 'Enter Soundcloud url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_soundcloud',
		) ) );
		
																															
		$wp_customize->add_setting( 'seos_vk', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_vk', array(
			'label'    => __( 'Enter VK url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_vk',
		) ) );
																																	
		$wp_customize->add_setting( 'seos_envelope', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_envelope', array(
			'label'    => __( 'Enter Envelope url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_envelope',
		) ) );
																																			
		$wp_customize->add_setting( 'seos_address_book', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_address_book', array(
			'label'    => __( 'Enter Address Book url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_address_book',
		) ) );
																																					
		$wp_customize->add_setting( 'seos_address_apple', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_address_apple', array(
			'label'    => __( 'Enter Apple url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_address_apple',
		) ) );
																																							
		$wp_customize->add_setting( 'seos_address_apple', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_address_amazon', array(
			'label'    => __( 'Enter Amazon url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_address_amazon',
		) ) );
																																									
		$wp_customize->add_setting( 'seos_address_slack', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_address_slack', array(
			'label'    => __( 'Enter Slack url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_address_slack',
		) ) );
																																											
		$wp_customize->add_setting( 'seos_address_slideshare', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_address_slideshare', array(
			'label'    => __( 'Enter Slideshare url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_address_slideshare',
		) ) );
																																													
		$wp_customize->add_setting( 'seos_address_wikipedia', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_address_wikipedia', array(
			'label'    => __( 'Enter Wikipedia url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_address_wikipedia',
		) ) );
																																															
		$wp_customize->add_setting( 'seos_address_wordpress', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_address_wordpress', array(
			'label'    => __( 'Enter WordPress url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_address_wordpress',
		) ) );
																																																	
		$wp_customize->add_setting( 'seos_address_odnoklassniki', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_address_odnoklassniki', array(
			'label'    => __( 'Enter Odnoklassniki url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_address_odnoklassniki',
		) ) );
																																																			
		$wp_customize->add_setting( 'seos_address_tumblr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_address_tumblr', array(
			'label'    => __( 'Enter Tumblr url', 'seos' ),
			'section'  => 'seos_social_section',
			'settings' => 'seos_address_tumblr',
		) ) );
			
	
		
/***********************************************************************************
 * Sidebar Options
***********************************************************************************/
 
		$wp_customize->add_section( 'seos_sidebar' , array(
			'title'       => __( 'Sidebar Options', 'seos' ),
			'priority'   => 64,
		) );
		
		$wp_customize->add_setting( 'seos_sidebar_width', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_sidebar_width', array(
			'label'    => __( 'Sidebar Width:', 'seos' ),
			'section'  => 'seos_sidebar',		
			'settings' => 'seos_sidebar_width',
			'type'     =>  'range',		
			'input_attrs'     => array(
				'min'  => 10,
				'max'  => 50,
				'step' => 1,
	),			
		) ) );
		
		$wp_customize->add_setting( 'seos_sidebar_position', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_sidebar_position', array(
			'label'    => __( 'Sidebar Position', 'seos' ),
			'section'  => 'seos_sidebar',
			'settings' => 'seos_sidebar_position',
			'type' => 'radio',
			'choices' => array(
				'1' => __( 'Left', 'seos' ),
				'2' => __( 'Right', 'seos' ),
				'3' => __( 'No Sidebar', 'seos' ),
				),			
			
		) ) );
		
/********************************************
* Sidebar Title Background
*********************************************/ 
	
		$wp_customize->add_setting('seos_aside_background_color', array(         
		'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seos_aside_background_color', array(
		'label' => __('Sidebar Title Background Color', 'seos'),        
		'section' => 'seos_sidebar',
		'settings' => 'seos_aside_background_color'
		)));
		
/********************************************
* Sidebar Title Color
*********************************************/ 
	
		$wp_customize->add_setting('seos_aside_title_color', array(         
		'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seos_aside_title_color', array(
		'label' => __('Sidebar Title Color', 'seos'),        
		'section' => 'seos_sidebar',
		'settings' => 'seos_aside_title_color'
		)));

/********************************************
* Sidebar Background
*********************************************/ 
	
		$wp_customize->add_setting('seos_aside_background_color1', array(         
		'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seos_aside_background_color1', array(
		'label' => __('Sidebar Background Color', 'seos'),        
		'section' => 'seos_sidebar',
		'settings' => 'seos_aside_background_color1'
		)));
		
/********************************************
* Sidebar Link Color
*********************************************/ 
	
		$wp_customize->add_setting('seos_aside_link_color', array(         
		'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seos_aside_link_color', array(
		'label' => __('Sidebar Link Color', 'seos'),        
		'section' => 'seos_sidebar',
		'settings' => 'seos_aside_link_color'
		)));
						
/********************************************
* Sidebar Link Hover Color
*********************************************/ 
	
		$wp_customize->add_setting('seos_aside_link_hover_color', array(         
		'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seos_aside_link_hover_color', array(
		'label' => __('Sidebar Link Hover Color', 'seos'),        
		'section' => 'seos_sidebar',
		'settings' => 'seos_aside_link_hover_color'
		)));
			
	
}
add_action( 'customize_register', 'seos_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function seos_customize_preview_js() {
	wp_enqueue_script( 'seos_customizer', get_template_directory_uri() . '/framework/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'seos_customize_preview_js' );


		function seos_customize_all_css() {
    ?>
		<style type="text/css">

			<?php if(get_theme_mod('seos_aside_background_color')) { ?>#content aside h2 {background:<?php echo esc_attr (get_theme_mod('seos_aside_background_color')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('seos_aside_background_color1')) { ?>#content aside ul, #content .widget {background:<?php echo esc_attr (get_theme_mod('seos_aside_background_color1')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('seos_aside_title_color')) { ?>#content aside h2 {color:<?php echo esc_attr (get_theme_mod('seos_aside_title_color')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('seos_aside_link_color')) { ?>#content aside a {color:<?php echo esc_attr (get_theme_mod('seos_aside_link_color')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('seos_aside_link_hover_color')) { ?>#content aside a:hover {color:<?php echo esc_attr (get_theme_mod('seos_aside_link_hover_color')); ?>;} <?php } ?> 
			
			<?php if(get_theme_mod('social_media_color')) { ?> .social .fa-icons i {color:<?php echo esc_attr (get_theme_mod('social_media_color')); ?> !important;} <?php } ?> 
			<?php if(get_theme_mod('social_media_hover_color')) { ?> .social .fa-icons i:hover {color:<?php echo esc_attr (get_theme_mod('social_media_hover_color')); ?> !important;} <?php } ?>

			<?php if(get_theme_mod('seos_titles_setting_1')) { ?> .single-title, .sr-no-sidebar .entry-title, .full-p .entry-title { display: none !important;} <?php } ?>

		</style>
		
    <?php	
}
		add_action('wp_head', 'seos_customize_all_css');
		
/**************************************
Sidebar Options
**************************************/


	function seos_sidebar_width () {
		if(get_theme_mod('seos_sidebar_width')) {
	
	$seos_content_width = 96;
	$seos_sidebar_width = esc_attr(get_theme_mod('seos_sidebar_width'));
	$seos_sidebar_sum = $seos_content_width - $seos_sidebar_width;

	?>
		<style>
			#content aside {width: <?php echo esc_attr(get_theme_mod('seos_sidebar_width')); ?>% !important;}
			#content main {width: <?php echo esc_attr($seos_sidebar_sum); ?>%  !important;}
		</style>
		
	<?php }
}
	add_action('wp_head','seos_sidebar_width');
	

	
/*********************************************************************************************************
* Sidebar Position
**********************************************************************************************************/

	function seos_sidebar(){
	$option_sidebar = get_theme_mod( 'seos_sidebar_position');		
	if($option_sidebar == '2') { 
			wp_enqueue_style( 'seos-right-sidebar', get_template_directory_uri() . '/css/right-sidebar.css');
		}

	$option_sidebar = get_theme_mod( 'seos_sidebar_position');			
		if($option_sidebar == '3') { 
			wp_enqueue_style( 'seos-no-sidebar', get_template_directory_uri() . '/css/no-sidebar.css');
		}
	}
	add_action( 'wp_enqueue_scripts', 'seos_sidebar' );
	
	
	
	
/***********************************************************************************
 * Seos Premium Buy
***********************************************************************************/

		function seos_support($wp_customize){
			class seos_Customize extends WP_Customize_Control {
				public function render_content() { ?>
				<div class="seos-info"> 
						<a href="<?php echo esc_url( 'https://seosthemes.info/seos-premium-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'Seos Premium', 'seos' ); ?>" target="_blank">
						<?php _e( 'Preview Premium', 'seos' ); ?>
						</a>
				</div>
				<?php
				}
			}
		}
		add_action('customize_register', 'seos_support');

		function customize_styles_seos( $input ) { ?>
			<style type="text/css">
				#customize-theme-controls #accordion-panel-seos_buy_panel .accordion-section-title,
				#customize-theme-controls #accordion-panel-seos_buy_panel > .accordion-section-title {
					background: #555555;
					color: #FFFFFF;
				}

				.seos-info button a {
					color: #FFFFFF;
				}

				#customize-theme-controls   #accordion-section-seos_buy_section .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section1 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section2 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section3 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section4 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section5 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section6 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section7 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section8 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section9 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section10 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section11 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section12 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section13 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section14 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section15 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section16 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section17 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section18 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section19 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section20 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section21 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_buy_section22 .accordion-section-title:after {
					font-size: 13px;
					font-weight: bold;
					content: "Premium";
					float: right;
					right: 40px;
					position: relative;
					color: #FF0000;
				}			
				
				#_customize-input-seos_setting0 {
					display: none;
				}
				
			</style>
		<?php }
		
		add_action( 'customize_controls_print_styles', 'customize_styles_seos');

		if ( ! function_exists( 'seos_buy' ) ) :
			function seos_buy( $wp_customize ) {
			$wp_customize->add_panel( 'seos_buy_panel', array(
				'title'			=> __('Seos Premium', 'seos'),
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 10,
			));
			
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section0', array(
				'title'			=> __('Preview The Theme', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	<a href="https://seosthemes.com/seos/" target="_blank">Learn more about Seos Premium.</a> ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting0', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,'seos_setting0', array(
						'section'	=> 'seos_buy_section0',
						'settings'	=> 'seos_setting0',
					)
				)
			);
						
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section', array(
				'title'			=> __('Footer Slider', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting', array(
						'label'		=> __('Menu Slider', 'seos'),
						'section'	=> 'seos_buy_section',
						'settings'	=> 'seos_setting',
					)
				)
			);
			
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section1', array(
				'title'			=> __('Contacts', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting1', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting1', array(
						'label'		=> __('Contacts', 'seos'),
						'section'	=> 'seos_buy_section1',
						'settings'	=> 'seos_setting1',
					)
				)
			);
						
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section2', array(
				'title'			=> __('Animations', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting2', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting2', array(
						'label'		=> __('Animations', 'seos'),
						'section'	=> 'seos_buy_section2',
						'settings'	=> 'seos_setting2',
					)
				)
			);
									
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section3', array(
				'title'			=> __('All Google Fonts', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting3', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting3', array(
						'label'		=> __('All Google Fonts', 'seos'),
						'section'	=> 'seos_buy_section3',
						'settings'	=> 'seos_setting3',
					)
				)
			);
												
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section4', array(
				'title'			=> __('Banners', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting4', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting4', array(
						'label'		=> __('Banners', 'seos'),
						'section'	=> 'seos_buy_section4',
						'settings'	=> 'seos_setting4',
					)
				)
			);
															
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section5', array(
				'title'			=> __('Shortcode Scroll Animation', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting5', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting5', array(
						'label'		=> __('Shortcode Scroll Animation', 'seos'),
						'section'	=> 'seos_buy_section5',
						'settings'	=> 'seos_setting5',
					)
				)
			);
																		
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section6', array(
				'title'			=> __('Home Page Custom Images', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting6', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting6', array(
						'label'		=> __('About US Section', 'seos'),
						'section'	=> 'seos_buy_section6',
						'settings'	=> 'seos_setting6',
					)
				)
			);
																					
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section7', array(
				'title'			=> __('Disabel all Comments', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting7', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting7', array(
						'label'		=> __('Disabel all Comments', 'seos'),
						'section'	=> 'seos_buy_section7',
						'settings'	=> 'seos_setting7',
					)
				)
			);
																								
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section8', array(
				'title'			=> __('Entry Meta', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting8', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting8', array(
						'label'		=> __('Entry Meta', 'seos'),
						'section'	=> 'seos_buy_section8',
						'settings'	=> 'seos_setting8',
					)
				)
			);
			
																											
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section9', array(
				'title'			=> __('Hide Options', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting9', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting9', array(
						'label'		=> __('Hide All Titles', 'seos'),
						'section'	=> 'seos_buy_section9',
						'settings'	=> 'seos_setting9',
					)
				)
			);
																														
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section10', array(
				'title'			=> __('Mobile Call Now', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting10', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting10', array(
						'label'		=> __('Mobile Call Now', 'seos'),
						'section'	=> 'seos_buy_section10',
						'settings'	=> 'seos_setting10',
					)
				)
			);
																																	
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section11', array(
				'title'			=> __('Testimonials Post Type', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting11', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting11', array(
						'label'		=> __('Testimonials Custom Post Type', 'seos'),
						'section'	=> 'seos_buy_section11',
						'settings'	=> 'seos_setting11',
					)
				)
			);
																																				
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section12', array(
				'title'			=> __('WooCommerce Colors', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting12', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting12', array(
						'label'		=> __('WooCommerce Colors', 'seos'),
						'section'	=> 'seos_buy_section12',
						'settings'	=> 'seos_setting12',
					)
				)
			);
			
																																							
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section13', array(
				'title'			=> __('WooCommerce Options', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting13', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting13', array(
						'label'		=> __('WooCommerce Options', 'seos'),
						'section'	=> 'seos_buy_section13',
						'settings'	=> 'seos_setting13',
					)
				)
			);
																																										
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section14', array(
				'title'			=> __('Footer Options', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting14', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting14', array(
						'label'		=> __('Footer Options', 'seos'),
						'section'	=> 'seos_buy_section14',
						'settings'	=> 'seos_setting14',
					)
				)
			);
																																													
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section15', array(
				'title'			=> __('Font Sizes', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting15', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting15', array(
						'label'		=> __('Font Sizes', 'seos'),
						'section'	=> 'seos_buy_section15',
						'settings'	=> 'seos_setting15',
					)
				)
			);
																																																
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section16', array(
				'title'			=> __('Under Construction', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting16', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting16', array(
						'label'		=> __('Under Construction', 'seos'),
						'section'	=> 'seos_buy_section16',
						'settings'	=> 'seos_setting16',
					)
				)
			);
																																																			
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section17', array(
				'title'			=> __('Read More Button Options', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting17', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting17', array(
						'label'		=> __('Read More Button Options', 'seos'),
						'section'	=> 'seos_buy_section17',
						'settings'	=> 'seos_setting17',
					)
				)
			);
																																																						
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section18', array(
				'title'			=> __('Pagination Options', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting18', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting18', array(
						'label'		=> __('Pagination Options', 'seos'),
						'section'	=> 'seos_buy_section18',
						'settings'	=> 'seos_setting18',
					)
				)
			);
																																																									
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section19', array(
				'title'			=> __('Antispam Login Form', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting19', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting19', array(
						'label'		=> __('Antispam Login Form', 'seos'),
						'section'	=> 'seos_buy_section19',
						'settings'	=> 'seos_setting19',
					)
				)
			);
																																																												
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section20', array(
				'title'			=> __('Back To Top Button Options', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting20', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting20', array(
						'label'		=> __('Back To Top Button Options', 'seos'),
						'section'	=> 'seos_buy_section20',
						'settings'	=> 'seos_setting20',
					)
				)
			);
																																																															
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section21', array(
				'title'			=> __('Copy Protection', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting21', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting21', array(
						'label'		=> __('Copy Protection', 'seos'),
						'section'	=> 'seos_buy_section21',
						'settings'	=> 'seos_setting21',
					)
				)
			);
																																																																		
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_buy_section22', array(
				'title'			=> __('Custom JS', 'seos'),
				'panel'			=> 'seos_buy_panel',
				'description'	=> __('	Learn more about Seos Premium. ','seos'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting22', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting22', array(
						'label'		=> __('Custom JS', 'seos'),
						'section'	=> 'seos_buy_section22',
						'settings'	=> 'seos_setting22',
					)
				)
			);
			
			
		}
		endif;
		 
		add_action('customize_register', 'seos_buy');
		
		
		
