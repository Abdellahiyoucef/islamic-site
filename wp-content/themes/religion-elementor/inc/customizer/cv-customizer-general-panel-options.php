<?php
/**
 * Religion Elementor manage the Customizer options of general panel.
 *
 * @subpackage religion-elementor
 * @since 1.0 
 */
Kirki::add_field(
	'religion_elementor_config', array(
		'type'        => 'checkbox',
		'settings'    => 'religion_elementor_home_posts',
		'label'       => esc_attr__( 'Checked to hide latest posts in homepage.', 'religion-elementor' ),
		'section'     => 'static_front_page',
		'default'     => true,
	)
);
