<?php
/**
 * Block styles.
 *
 * @package nadryv-production
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function nadryv_production_register_block_styles() {

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'nadryv-production-flat-button',
			'label' => __( 'Flat button', 'nadryv-production' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'nadryv-production-shadow-button',
			'label' => __( 'Button with shadow', 'nadryv-production' ),
		)
	);
}
add_action( 'init', 'nadryv_production_register_block_styles' );
