<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class religion_elementor_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . '/inc/custom-addition/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'religion_elementor_Customize_Section_Pro' );

		$manager->add_section(
			new religion_elementor_Customize_Section_Pro(
				$manager,
				'religion-elementor-demo',
				array(
					'title'    => esc_html__( 'Theme Demo', 'religion-elementor' ),
					'pro_text' => esc_html__( 'Theme Demo', 'religion-elementor' ),
					'pro_url'  => 'https://testerwp.com/elementor-wp/religion-elementor/',
					'priority'  => 0
				)
			)
		);

		// upgrade sections.
		$manager->add_section(
			new religion_elementor_Customize_Section_Pro(
				$manager,
				'upgrade-pros',
				array(
					'title'    => esc_html__( 'Check Pro', 'religion-elementor'),
					'pro_text' => esc_html__( 'Click Here', 'religion-elementor' ),
					'pro_url'  => 'https://testerwp.com/lp/religion-twp/',
					'priority'  => 0
				)
			)
		);

		// doc sections.
		$manager->add_section(
			new religion_elementor_Customize_Section_Pro(
				$manager,
				'religion-elementor',
				array(
					'title'    => esc_html__( 'Theme Doc', 'religion-elementor' ),
					'pro_text' => esc_html__( 'Click Here', 'religion-elementor' ),
					'pro_url'  => 'https://testerwp.com/docs/religion-elementor/how-to-install-religion-elementor-theme/',
					'priority'  => 0
				)
			)
		);

	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'religion-elementor-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/custom-addition/customize-controls.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'religion-elementor-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/custom-addition/customize-controls.css' );
	}
}
religion_elementor_Customize::get_instance();