<?php
/**
 * Recommended plugins
 *
 * @package religion-elementor
 */

if ( ! function_exists( 'religion_elementor_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function religion_elementor_recommended_plugins() {

        $plugins = array(  

            array(
                'name'     => esc_html__( 'Testerwp Ecommerce Companion', 'religion-elementor' ),
                'slug'     => 'testerwp-ecommerce-companion',
                'required' => false,
            ),              
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'religion-elementor' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Elementor Website Builder', 'religion-elementor' ),
                'slug'     => 'elementor',
                'required' => false,
            ),
             array(
                'name'     => esc_html__( 'ElementsKit Lite', 'religion-elementor' ),
                'slug'     => 'elementskit-lite',
                'required' => false,
            ),
             array(
                'name'     => esc_html__( 'WooCommerce', 'religion-elementor' ),
                'slug'     => 'woocommerce',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'religion_elementor_recommended_plugins' );