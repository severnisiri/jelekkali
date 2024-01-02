<?php
/**
 * Theme functions and definitions
 *
 * @package NewsDaily
 */

/**
 * After setup theme hook
 */
function newsdaily_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'newsdaily' );	
}
add_action( 'after_setup_theme', 'newsdaily_theme_setup' );

/**
 * Load assets.
 */

function newsdaily_theme_css() {
	wp_enqueue_style( 'newsdaily-parent-theme-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'newsdaily_theme_css', 99);


require get_stylesheet_directory() . '/inc/customizer/newsdaily-header-customize-setting.php';


/*=========================================
 NewsDaily Remove Customize Panel from parent theme
=========================================*/
function newsdaily_remove_parent_setting( $wp_customize ) {
	$wp_customize->remove_control('newsmash_tabfirst_cat');
}
add_action( 'customize_register', 'newsdaily_remove_parent_setting',99 );

/*=========================================
NewsDaily Header Banner
=========================================*/
if ( ! function_exists( 'newsdaily_header_banner' ) ) :
function newsdaily_header_banner() {
	$newsmash_hs_hdr_banner 		= get_theme_mod( 'newsmash_hs_hdr_banner','1'); 
	$newsmash_hdr_banner_img 		= get_theme_mod( 'newsmash_hdr_banner_img',esc_url(get_stylesheet_directory_uri() .'/assets/images/ad-900.png')); 
	$newsmash_hdr_banner_link 		= get_theme_mod( 'newsmash_hdr_banner_link','#'); 
	$newsmash_hdr_banner_target 	= get_theme_mod( 'newsmash_hdr_banner_target');
	if($newsmash_hdr_banner_target=='1'): $target='target=_blank'; else: $target=''; endif; 
	if($newsmash_hs_hdr_banner=='1'  && !empty($newsmash_hdr_banner_img)):	
?>
	<li class="dt_navbar-banner-item">
		<a href="<?php echo esc_url($newsmash_hdr_banner_link); ?>" <?php echo esc_attr($target); ?>><img src="<?php echo esc_url($newsmash_hdr_banner_img); ?>"></a>
	</li>
<?php endif;
	} 
endif;
add_action( 'newsdaily_header_banner', 'newsdaily_header_banner' );




/*=========================================
NewsDaily Slider Right
=========================================*/
if ( ! function_exists( 'newsdaily_site_slider_right' ) ) :
function newsdaily_site_slider_right() {
	$newsmash_tabfirst_cat			= get_theme_mod('newsmash_tabfirst_cat','0');
	$newsmash_tabsecond_cat			= get_theme_mod('newsmash_tabsecond_cat','0');
	$newsmash_hs_slider_tab_meta	= get_theme_mod('newsmash_hs_slider_tab_meta','1');
	$newsmash_hs_slider_tab_title	= get_theme_mod('newsmash_hs_slider_tab_title','1');
	$newsmash_hs_slider_tab_cat_meta= get_theme_mod('newsmash_hs_slider_tab_cat_meta','1');
	$newsmash_hs_slider_tab_date_meta= get_theme_mod('newsmash_hs_slider_tab_date_meta','1');
	$newsmash_hs_slider_tab_author_meta= get_theme_mod('newsmash_hs_slider_tab_author_meta','1');
	$newsmash_num_slides_tab		= get_theme_mod('newsmash_num_slides_tab','3');
	$newsmash_slider_tab1_posts		= newsmash_get_posts($newsmash_num_slides_tab, $newsmash_tabfirst_cat);
	$newsmash_slider_tab2_posts		= newsmash_get_posts($newsmash_num_slides_tab, $newsmash_tabsecond_cat);	
?>
	 <div class="post_columns-grid">
		<?php
		if ($newsmash_slider_tab2_posts->have_posts()) :
			while ($newsmash_slider_tab2_posts->have_posts()) : $newsmash_slider_tab2_posts->the_post();

			global $post;
		?>		
		<div class="post featured-post-lg">
			<div class="details rounded clearfix">
				<?php if($newsmash_hs_slider_tab_cat_meta=='1'): ?>	
					<?php newsmash_getpost_categories(); ?>
				<?php endif; ?>
				<?php     
					if($newsmash_hs_slider_tab_title=='1'):
						newsmash_common_post_title('h6','post-title');
					endif;	
				?> 
				<ul class="meta list-inline dt-mt-0 dt-mb-0">
					<?php if($newsmash_hs_slider_tab_author_meta=='1'): ?>
						<li class="list-inline-item"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html(the_author()); ?></a></li>
					<?php endif; ?>
					
					<?php if($newsmash_hs_slider_tab_date_meta=='1'): ?>
						<li class="list-inline-item"><?php echo esc_html(get_the_date( 'F j, Y' )); ?></li>
					<?php endif; newsmash_edit_post_link(); ?>
				</ul>
			</div>
			<a href="<?php echo esc_url(get_permalink()); ?>">
				<div class="thumb rounded">					
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="inner data-bg-image" data-bg-image="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"></div>
					<?php else: ?>
					<div class="inner"></div>
					<?php endif; ?>
				</div>			
			</a>
		</div>
		<?php endwhile;endif;wp_reset_postdata(); ?>
		
	</div>
	<?php
	} 
endif;
add_action( 'newsdaily_site_slider_right', 'newsdaily_site_slider_right' );

/**
 * Import Options From Parent Theme
 *
 */
function newsdaily_parent_theme_options() {
	$newsmash_mods = get_option( 'theme_mods_newsmash' );
	if ( ! empty( $newsmash_mods ) ) {
		foreach ( $newsmash_mods as $newsmash_mod_k => $newsmash_mod_v ) {
			set_theme_mod( $newsmash_mod_k, $newsmash_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'newsdaily_parent_theme_options' );