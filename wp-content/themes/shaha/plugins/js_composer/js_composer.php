<?php
/* WPBakery Page Builder support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('shaha_vc_theme_setup9')) {
	add_action( 'after_setup_theme', 'shaha_vc_theme_setup9', 9 );
	function shaha_vc_theme_setup9() {
		if (shaha_exists_visual_composer()) {
			add_action( 'wp_enqueue_scripts', 				'shaha_vc_frontend_scripts', 1100 );
			add_filter( 'shaha_filter_merge_styles',		'shaha_vc_merge_styles' );
	
			// Add/Remove params in the standard VC shortcodes
			//-----------------------------------------------------
			add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,	'shaha_vc_add_params_classes', 10, 3 );
			add_filter( 'vc_iconpicker-type-fontawesome',	'shaha_vc_iconpicker_type_fontawesome' );
			
			// Color scheme
			$scheme = array(
				"param_name" => "scheme",
				"heading" => esc_html__("Color scheme", 'shaha'),
				"description" => wp_kses_data( __("Select color scheme to decorate this block", 'shaha') ),
				"group" => esc_html__('Colors', 'shaha'),
				"admin_label" => true,
				"value" => array_flip(shaha_get_list_schemes(true)),
				"type" => "dropdown"
			);
			$sc_list = apply_filters('shaha_filter_add_scheme_in_vc', array('vc_section', 'vc_row', 'vc_row_inner', 'vc_column', 'vc_column_inner', 'vc_column_text'));
			foreach ($sc_list as $sc)
				vc_add_param($sc, $scheme);

			// Alter height and hide on mobile for Empty Space
			vc_add_param("vc_empty_space", array(
				"param_name" => "alter_height",
				"heading" => esc_html__("Alter height", 'shaha'),
				"description" => wp_kses_data( __("Select alternative height instead value from the field above", 'shaha') ),
				"admin_label" => true,
				"value" => array(
					esc_html__('Tiny', 'shaha') => 'tiny',
					esc_html__('Small', 'shaha') => 'small',
					esc_html__('Medium', 'shaha') => 'medium',
					esc_html__('Large', 'shaha') => 'large',
					esc_html__('Huge', 'shaha') => 'huge',
					esc_html__('From the value above', 'shaha') => 'none'
				),
				"type" => "dropdown"
			));
			
			// Add Narrow style to the Progress bars
			vc_add_param("vc_progress_bar", array(
				"param_name" => "narrow",
				"heading" => esc_html__("Narrow", 'shaha'),
				"description" => wp_kses_data( __("Use narrow style for the progress bar", 'shaha') ),
				"std" => 0,
				"value" => array(esc_html__("Narrow style", 'shaha') => "1" ),
				"type" => "checkbox"
			));
			
			// Add param 'Closeable' to the Message Box
			vc_add_param("vc_message", array(
				"param_name" => "closeable",
				"heading" => esc_html__("Closeable", 'shaha'),
				"description" => wp_kses_data( __("Add 'Close' button to the message box", 'shaha') ),
				"std" => 0,
				"value" => array(esc_html__("Closeable", 'shaha') => "1" ),
				"type" => "checkbox"
			));
		}
		if (is_admin()) {
			add_filter( 'shaha_filter_tgmpa_required_plugins', 'shaha_vc_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'shaha_vc_tgmpa_required_plugins' ) ) {
	
	function shaha_vc_tgmpa_required_plugins($list=array()) {
		if (shaha_storage_isset('required_plugins', 'js_composer')) {
			$path = shaha_get_file_dir('plugins/js_composer/js_composer.zip');
			if (!empty($path) || shaha_get_theme_setting('tgmpa_upload')) {
				$list[] = array(
					'name' 		=> shaha_storage_get_array('required_plugins', 'js_composer'),
					'slug' 		=> 'js_composer',
               'version'	=> '6.8.0',
					'source'	=> !empty($path) ? $path : 'upload://js_composer.zip',
					'required' 	=> false
				);
			}
		}
		return $list;
	}
}

// Check if WPBakery Page Builder installed and activated
if ( !function_exists( 'shaha_exists_visual_composer' ) ) {
	function shaha_exists_visual_composer() {
		return class_exists('Vc_Manager');
	}
}

// Check if WPBakery Page Builder in frontend editor mode
if ( !function_exists( 'shaha_vc_is_frontend' ) ) {
	function shaha_vc_is_frontend() {
		return (isset($_GET['vc_editable']) && $_GET['vc_editable']=='true')
			|| (isset($_GET['vc_action']) && $_GET['vc_action']=='vc_inline');

	}
}
	
// Enqueue VC custom styles
if ( !function_exists( 'shaha_vc_frontend_scripts' ) ) {
	
	function shaha_vc_frontend_scripts() {
		if (shaha_exists_visual_composer()) {
			if (shaha_is_on(shaha_get_theme_option('debug_mode')) && shaha_get_file_dir('plugins/js_composer/js_composer.css')!='')
				wp_enqueue_style( 'shaha-js-composer',  shaha_get_file_url('plugins/js_composer/js_composer.css'), array(), null );
		}
	}
}
	
// Merge custom styles
if ( !function_exists( 'shaha_vc_merge_styles' ) ) {
	
	function shaha_vc_merge_styles($list) {
		$list[] = 'plugins/js_composer/js_composer.css';
		return $list;
	}
}
	
// Add theme icons to the VC iconpicker list
if ( !function_exists( 'shaha_vc_iconpicker_type_fontawesome' ) ) {
	
	function shaha_vc_iconpicker_type_fontawesome($icons) {
		$list = shaha_get_list_icons();
		if (!is_array($list) || count($list) == 0) return $icons;
		$rez = array();
		foreach ($list as $icon)
			$rez[] = array($icon => str_replace('icon-', '', $icon));
		return array_merge( $icons, array(esc_html__('Theme Icons', 'shaha') => $rez) );
	}
}



// Shortcodes support
//------------------------------------------------------------------------

// Add params to the standard VC shortcodes
if ( !function_exists( 'shaha_vc_add_params_classes' ) ) {
	
	function shaha_vc_add_params_classes($classes, $sc, $atts) {
		// Add color scheme
		if (in_array($sc, apply_filters('shaha_filter_add_scheme_in_vc', array('vc_section', 'vc_row', 'vc_row_inner', 'vc_column', 'vc_column_inner', 'vc_column_text')))) {
			if (!empty($atts['scheme']) && !shaha_is_inherit($atts['scheme']))
				$classes .= ($classes ? ' ' : '') . 'scheme_' . $atts['scheme'];
		}
		// Add other specific classes
		if (in_array($sc, array('vc_empty_space'))) {
			if (!empty($atts['alter_height']) && !shaha_is_off($atts['alter_height']))
				$classes .= ($classes ? ' ' : '') . 'height_' . $atts['alter_height'];
		} else if (in_array($sc, array('vc_progress_bar'))) {
			if (!empty($atts['narrow']) && (int) $atts['narrow']==1)
				$classes .= ($classes ? ' ' : '') . 'vc_progress_bar_narrow';
		} else if (in_array($sc, array('vc_message'))) {
			if (!empty($atts['closeable']) && (int) $atts['closeable']==1)
				$classes .= ($classes ? ' ' : '') . 'vc_message_box_closeable';
		}
		return $classes;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if (shaha_exists_visual_composer()) { require_once SHAHA_THEME_DIR . 'plugins/js_composer/js_composer.styles.php'; }
?>