<?php

/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme creativity-hub for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'creativity_hub_register_required_plugins', 0);
function creativity_hub_register_required_plugins()
{
	$plugins = array(
		array(
			'name'      => 'Superb Addons',
			'slug'      => 'superb-blocks',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'creativity-hub',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);

	tgmpa($plugins, $config);
}


function creativity_hub_pattern_styles()
{
	wp_enqueue_style('creativity-hub-patterns', get_template_directory_uri() . '/assets/css/patterns.css', array(), filemtime(get_template_directory() . '/assets/css/patterns.css'));
	if (is_admin()) {
		global $pagenow;
		if ('site-editor.php' === $pagenow) {
			// Do not enqueue editor style in site editor
			return;
		}
		wp_enqueue_style('creativity-hub-editor', get_template_directory_uri() . '/assets/css/editor.css', array(), filemtime(get_template_directory() . '/assets/css/editor.css'));
	}
}
add_action('enqueue_block_assets', 'creativity_hub_pattern_styles');


add_theme_support('wp-block-styles');

// Removes the default wordpress patterns
add_action('init', function () {
	remove_theme_support('core-block-patterns');
});

// Register customer Creativity Hub pattern categories
function creativity_hub_register_block_pattern_categories()
{
	register_block_pattern_category(
		'heros',
		array(
			'label'       => __('Heros', 'creativity-hub'),
			'description' => __('Creativity Hub hero patterns', 'creativity-hub'),
		)
	);
	register_block_pattern_category(
		'navigation_headers',
		array(
			'label'       => __('Headers', 'creativity-hub'),
			'description' => __('Creativity Hub navigation header patterns', 'creativity-hub'),
		)
	);
	register_block_pattern_category(
		'content',
		array(
			'label'       => __('Content', 'creativity-hub'),
			'description' => __('Creativity Hub content patterns', 'creativity-hub'),
		)
	);
	register_block_pattern_category(
		'teams',
		array(
			'label'       => __('Teams', 'creativity-hub'),
			'description' => __('Creativity Hub team patterns', 'creativity-hub'),
		)
	);
	register_block_pattern_category(
		'testimonials',
		array(
			'label'       => __('Testimonials', 'creativity-hub'),
			'description' => __('Creativity Hub testimonial patterns', 'creativity-hub'),
		)
	);
	register_block_pattern_category(
		'contact',
		array(
			'label'       => __('Contact', 'creativity-hub'),
			'description' => __('Creativity Hub contact patterns', 'creativity-hub'),
		)
	);
}

add_action('init', 'creativity_hub_register_block_pattern_categories');







// Initialize information content
require_once trailingslashit(get_template_directory()) . 'inc/vendor/autoload.php';

use SuperbThemesThemeInformationContent\ThemeEntryPoint;

ThemeEntryPoint::init([
    'type' => 'block', // block / classic
    'theme_url' => 'https://superbthemes.com/creativity-hub/',
    'demo_url' => 'https://superbthemes.com/demo/creativity-hub/',
    'features' => array(
    	array(
    		'title' => __("Theme Designer", "creativity-hub"),
    		'icon' => "lego-duotone.webp",
    		'description' => __("Choose from over 300 designs for footers, headers, landing pages & all other theme parts.", "creativity-hub")
    	),
    	   	array(
    		'title' => __("Editor Enhancements", "creativity-hub"),
    		'icon' => "1-1.png",
    		'description' => __("Enhanced editor experience, grid systems, improved block control and much more.", "creativity-hub")
    	),
    	array(
    		'title' => __("Custom CSS", "creativity-hub"),
    		'icon' => "2-1.png",
    		'description' => __("Add custom CSS with syntax highlight, custom display settings, and minified output.", "creativity-hub")
    	),
    	array(
    		'title' => __("Animations", "creativity-hub"),
    		'icon' => "wave-triangle-duotone.webp",
    		'description' => __("Animate any element on your website with one click. Choose from over 50+ animations.", "creativity-hub")
    	),
    	array(
    		'title' => __("WooCommerce Integration", "creativity-hub"),
    		'icon' => "shopping-cart-duotone.webp",
    		'description' => __("Choose from over 100 unique WooCommerce designs for your e-commerce store.", "creativity-hub")
    	),
    	array(
    		'title' => __("Responsive Controls", "creativity-hub"),
    		'icon' => "arrows-out-line-horizontal-duotone.webp",
    		'description' => __("Make any theme mobile-friendly with SuperbThemes responsive controls.", "creativity-hub")
    	)
    )
]);
