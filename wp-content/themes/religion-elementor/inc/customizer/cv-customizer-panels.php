<?php
/**
 * Religion Elementor manage the Customizer panels.
 *
 * @subpackage religion-elementor
 * @since 1.0 
 */

/**
 * General Settings Panel
 */
Kirki::add_panel( 'religion_elementor_general_panel', array(
	'priority' => 10,
	'title'    => __( 'General Settings', 'religion-elementor' ),
) );

/**
 * Religion Elementor Options
 */
Kirki::add_panel( 'religion_elementor_options_panel', array(
	'priority' => 20,
	'title'    => __( 'Religion Elementor Theme Options', 'religion-elementor' ),
) );