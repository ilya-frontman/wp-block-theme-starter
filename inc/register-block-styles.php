<?php

/**
 * Block styles.
 *
 * @package wp-block-theme
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function nadryv_production_register_block_styles()
{

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'wp-block-theme-flat-button',
			'label' => __('Flat button', 'wp-block-theme'),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'wp-block-theme-shadow-button',
			'label' => __('Button with shadow', 'wp-block-theme'),
		)
	);
}
add_action('init', 'nadryv_production_register_block_styles');
