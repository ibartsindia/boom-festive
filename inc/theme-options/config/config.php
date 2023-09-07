<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'boom_festive';

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../config/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../config/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {
	$sample_patterns_dir = opendir( $sample_patterns_path );

	if ( $sample_patterns_dir ) {

		// phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
		while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
			if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
				$name              = explode( '.', $sample_patterns_file );
				$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'Theme Options', 'boom-festive' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Theme Options', 'boom-festive' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => false,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => false,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => 'Boom Festive Theme by iB Softs',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => false,
);

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START SECTIONS
 */

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'General Settings', 'boom-festive' ),
		'id'               => 'ibs-general',
		'customizer_width' => '400px',
		'icon'             => 'el el-cogs',
	)
);
//Logo section.
Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Logo Settings', 'boom-festive' ),
		'id'         => 'ibs-general-logo',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'opt-logo-title',
				'type'        => 'media',
				'title'       => esc_html__( 'Logo Upload', 'boom-festive' ),
				'subtitle'    => esc_html__( 'Upload a logo.', 'boom-festive' )
			
			),
			
		),
	)
);

// -> START Header Selection.
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Header Settings', 'boom-festive' ),
		'id'               => 'ibs-header',
		'customizer_width' => '400px',
		'icon'             => 'el el-cogs',
	)
);
//Top Header 
Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Top Header Settings', 'boom-festive' ),
		'id'         => 'ibs-header-top-header',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'opt-top-header-on-off',
				'type'     => 'switch',
				'title'       => esc_html__( 'Top Header', 'boom-festive' ),
				'subtitle'    => esc_html__( 'Here you can enable or disable the top header', 'boom-festive' ),
				'default'  => true,
			),
			array(
				'id'          => 'opt-top-header-phone',
				'type'     => 'text',
				'title'       => esc_html__( 'Phone No', 'boom-festive' ),
				'subtitle'    => esc_html__( 'Here you can add phone no in the top header', 'boom-festive' ),
			),
			array(
				'id'          => 'opt-top-header-email',
				'type'     => 'text',
				'title'       => esc_html__( 'Email', 'boom-festive' ),
				'subtitle'    => esc_html__( 'Here you can add email in the top header', 'boom-festive' ),
			),
			array(
				'id'       => 'opt-top-header-social-icons',
				'type'     => 'section',
				'title'    => esc_html__( 'Social Icons', 'boom-festive' ),
				'subtitle' => esc_html__( 'Here you can add you social icons', 'boom-festive' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'          => 'opt-top-header-fb',
				'type'     => 'text',
				'title'       => esc_html__( 'Facebook', 'boom-festive' ),
			),
			array(
				'id'          => 'opt-top-header-tw',
				'type'     => 'text',
				'title'       => esc_html__( 'Twitter', 'boom-festive' ),
			),
			array(
				'id'          => 'opt-top-header-ins',
				'type'     => 'text',
				'title'       => esc_html__( 'Instagram', 'boom-festive' ),
			),
			array(
				'id'          => 'opt-top-header-ln',
				'type'     => 'text',
				'title'       => esc_html__( 'Linkedin', 'boom-festive' ),
			),

		),
	)
);

// -> START Color Selection.
// Redux::set_section(
// 	$opt_name,
// 	array(
// 		'title' => esc_html__( 'Color Selection', 'boom-festive' ),
// 		'id'    => 'color',
// 		'icon'  => 'el el-brush',
// 	)
// );
// require_once Redux_Core::$dir . '../config/sections/color-selection/color.php';
// require_once Redux_Core::$dir . '../config/sections/color-selection/color-gradient.php';
// require_once Redux_Core::$dir . '../config/sections/color-selection/color-rgba.php';
// require_once Redux_Core::$dir . '../config/sections/color-selection/link-color.php';
// require_once Redux_Core::$dir . '../config/sections/color-selection/palette.php';
// require_once Redux_Core::$dir . '../config/sections/color-selection/color-palette.php';

// -> START Design Fields.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Design Fields', 'boom-festive' ),
		'id'    => 'design',
		'icon'  => 'el el-wrench',
	)
);

require_once Redux_Core::$dir . '../config/sections/design-fields/background.php';
require_once Redux_Core::$dir . '../config/sections/design-fields/box-shadow.php';
require_once Redux_Core::$dir . '../config/sections/design-fields/border.php';
require_once Redux_Core::$dir . '../config/sections/design-fields/dimensions.php';
require_once Redux_Core::$dir . '../config/sections/design-fields/spacing.php';

// -> START Media Uploads.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Media Uploads', 'boom-festive' ),
		'id'    => 'media',
		'icon'  => 'el el-picture',
	)
);

require_once Redux_Core::$dir . '../config/sections/media-uploads/gallery.php';
require_once Redux_Core::$dir . '../config/sections/media-uploads/media.php';
require_once Redux_Core::$dir . '../config/sections/media-uploads/multi-media.php';
require_once Redux_Core::$dir . '../config/sections/media-uploads/slides.php';

// -> START Presentation Fields.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Presentation Fields', 'boom-festive' ),
		'id'    => 'presentation',
		'icon'  => 'el el-screen',
	)
);

require_once Redux_Core::$dir . '../config/sections/presentation-fields/divide.php';
require_once Redux_Core::$dir . '../config/sections/presentation-fields/info.php';
require_once Redux_Core::$dir . '../config/sections/presentation-fields/section.php';

Redux::set_section(
	$opt_name,
	array(
		'id'   => 'presentation-divide-sample',
		'type' => 'divide',
	)
);

// -> START Switch & Button Set.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Switch / Button Set', 'boom-festive' ),
		'id'    => 'switch_buttonset',
		'icon'  => 'el el-cogs',
	)
);

require_once Redux_Core::$dir . '../config/sections/switch-button/button-set.php';
require_once Redux_Core::$dir . '../config/sections/switch-button/switch.php';

// -> START Select Fields.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Select Fields', 'boom-festive' ),
		'id'    => 'select',
		'icon'  => 'el el-list-alt',
	)
);

require_once Redux_Core::$dir . '../config/sections/select-fields/select.php';
require_once Redux_Core::$dir . '../config/sections/select-fields/image-select.php';
require_once Redux_Core::$dir . '../config/sections/select-fields/select-image.php';

// -> START Slider / Spinner.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Slider / Spinner', 'boom-festive' ),
		'id'    => 'slider_spinner',
		'icon'  => 'el el-adjust-alt',
	)
);

require_once Redux_Core::$dir . '../config/sections/slider-spinner/slider.php';
require_once Redux_Core::$dir . '../config/sections/slider-spinner/spinner.php';

// -> START Typography.
require_once Redux_Core::$dir . '../config/sections/typography/typography.php';

// -> START Additional Types.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Additional Types', 'boom-festive' ),
		'id'    => 'additional',
		'icon'  => 'el el-magic',
	)
);

require_once Redux_Core::$dir . '../config/sections/additional-types/date.php';
require_once Redux_Core::$dir . '../config/sections/additional-types/date-time-picker.php';
require_once Redux_Core::$dir . '../config/sections/additional-types/sorter.php';
require_once Redux_Core::$dir . '../config/sections/additional-types/raw.php';

Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Advanced Features', 'boom-festive' ),
		'icon'  => 'el el-thumbs-up',
	)
);

require_once Redux_Core::$dir . '../config/sections/advanced-features/callback.php';

// -> START Validation.
require_once Redux_Core::$dir . '../config/sections/advanced-features/field-validation.php';

// -> START Sanitizing.
require_once Redux_Core::$dir . '../config/sections/advanced-features/field-sanitizing.php';

// -> START Required.
require_once Redux_Core::$dir . '../config/sections/advanced-features/field-required-linking.php';

require_once Redux_Core::$dir . '../config/sections/advanced-features/wpml-integration.php';

// -> START Disabling.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Disabling', 'boom-festive' ),
		'icon'  => 'el el-lock',
	)
);

require_once Redux_Core::$dir . '../config/sections/disabling/disable-field.php';
require_once Redux_Core::$dir . '../config/sections/disabling/disable-section.php';

// -> START Pro Fields.

Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Redux Extensions', 'boom-festive' ),
		'id'    => 'redux-extensions',
		'icon'  => 'el el-redux',
		'class' => 'pro_highlight',
		'desc'  => esc_html__( 'For full documentation on this field, visit: ', 'boom-festive' ) . '<a href="https://devs.redux.io/core-extensions/" target="_blank">https://devs.redux.io/core-extensions/</a>',
	)
);

// require_once Redux_Core::$dir . '../config/sections/extensions/accordion.php';
// require_once Redux_Core::$dir . '../config/sections/extensions/custom-fonts.php';
// require_once Redux_Core::$dir . '../config/sections/extensions/google-maps.php';
// require_once Redux_Core::$dir . '../config/sections/extensions/icon-select.php';
// require_once Redux_Core::$dir . '../config/sections/extensions/js-button.php';
// require_once Redux_Core::$dir . '../config/sections/extensions/repeater.php';
// require_once Redux_Core::$dir . '../config/sections/extensions/search.php';
// require_once Redux_Core::$dir . '../config/sections/extensions/shortcodes.php';
// require_once Redux_Core::$dir . '../config/sections/extensions/social-profiles.php';
// require_once Redux_Core::$dir . '../config/sections/extensions/widget-areas.php';
// require_once Redux_Core::$dir . '../config/sections/extensions/users.php';

if ( class_exists( 'Redux_Pro' ) ) {
	require_once Redux_Core::$dir . '../config/sections/extensions/color-scheme.php';
	require_once Redux_Core::$dir . '../config/sections/extensions/taxonomy.php';
	require_once Redux_Core::$dir . '../config/sections/extensions/users.php';
}

/**
 * Metaboxes
 */
require_once Redux_Core::$dir . '../config/metaboxes.php';

/**
 * Raw README
 */
if ( file_exists( $dir . '/../README.md' ) ) {
	$section = array(
		'icon'   => 'el el-list-alt',
		'title'  => esc_html__( 'Documentation', 'boom-festive' ),
		'fields' => array(
			array(
				'id'           => 'opt-raw-documentation',
				'type'         => 'raw',
				'markdown'     => true,
				'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative, please.
			),
		),
	);

	Redux::set_section( $opt_name, $section );
}

Redux::set_section(
	$opt_name,
	array(
		'icon'            => 'el el-list-alt',
		'title'           => esc_html__( 'Customizer Only', 'boom-festive' ),
		'desc'            => '<p class="description">' . esc_html__( 'This Section should be visible only in Customizer', 'boom-festive' ) . '</p>',
		'customizer_only' => true,
		'fields'          => array(
			array(
				'id'              => 'opt-customizer-only',
				'type'            => 'select',
				'title'           => esc_html__( 'Customizer Only Option', 'boom-festive' ),
				'subtitle'        => esc_html__( 'The subtitle is NOT visible in customizer', 'boom-festive' ),
				'desc'            => esc_html__( 'The field desc is NOT visible in customizer.', 'boom-festive' ),
				'customizer_only' => true,
				'options'         => array(
					'1' => esc_html__( 'Opt 1', 'boom-festive' ),
					'2' => esc_html__( 'Opt 2', 'boom-festive' ),
					'3' => esc_html__( 'Opt 3', 'boom-festive' ),
				),
				'default'         => '2',
			),
		),
	)
);

/*
 * <--- END SECTIONS
 */

/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */

/*
 * --> Action hook examples.
 */

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 is necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section.
// It can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if ( ! function_exists( 'compiler_action' ) ) {
	/**
	 * This is a test function that will let you see when the compiler hook occurs.
	 * It only runs if a field's value has changed and compiler=>true is set.
	 *
	 * @param array  $options        Options values.
	 * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
	 * @param array  $changed_values Any values changed since last save.
	 */
	function compiler_action( array $options, string $css, array $changed_values ) {
		echo '<h1>The compiler hook has run!</h1>';
		echo '<pre>';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions
		print_r( $changed_values ); // Values that have changed since the last save.
		// echo '<br/>';
		// print_r($options); //Option values.
		// echo '<br/>';
		// print_r($css); // Compiler selector CSS values compiler => array( CSS SELECTORS ).
		echo '</pre>';
	}
}

if ( ! function_exists( 'redux_validate_callback_function' ) ) {
	/**
	 * Custom function for the callback validation referenced above
	 *
	 * @param array $field          Field array.
	 * @param mixed $value          New value.
	 * @param mixed $existing_value Existing value.
	 *
	 * @return array
	 */
	function redux_validate_callback_function( array $field, $value, $existing_value ): array {
		$error   = false;
		$warning = false;

		// Do your validation.
		if ( 1 === (int) $value ) {
			$error = true;
			$value = $existing_value;
		} elseif ( 2 === (int) $value ) {
			$warning = true;
			$value   = $existing_value;
		}

		$return['value'] = $value;

		if ( true === $error ) {
			$field['msg']    = 'your custom error message';
			$return['error'] = $field;
		}

		if ( true === $warning ) {
			$field['msg']      = 'your custom warning message';
			$return['warning'] = $field;
		}

		return $return;
	}
}


if ( ! function_exists( 'dynamic_section' ) ) {
	/**
	 * Custom function for filtering the section array.
	 * Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
	 *
	 * @param array $sections Section array.
	 *
	 * @return array
	 */
	function dynamic_section( array $sections ): array {
		$sections[] = array(
			'title'  => esc_html__( 'Section via hook', 'boom-festive' ),
			'desc'   => '<p class="description">' . esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'boom-festive' ) . '</p>',
			'icon'   => 'el el-paper-clip',

			// Leave this as a blank section, no options just some intro text set above.
			'fields' => array(),
		);

		return $sections;
	}
}

if ( ! function_exists( 'change_arguments' ) ) {
	/**
	 * Filter hook for filtering the args.
	 * Good for child themes to override or add to the args array.
	 * It can also be used in other functions.
	 *
	 * @param array $args Global arguments array.
	 *
	 * @return array
	 */
	function change_arguments( array $args ): array {
		$args['dev_mode'] = true;

		return $args;
	}
}

if ( ! function_exists( 'change_defaults' ) ) {
	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 *
	 * @param array $defaults Default value array.
	 *
	 * @return array
	 */
	function change_defaults( array $defaults ): array {
		$defaults['str_replace'] = esc_html__( 'Testing filter hook!', 'boom-festive' );

		return $defaults;
	}
}

if ( ! function_exists( 'redux_custom_sanitize' ) ) {
	/**
	 * Function to be used if the field sanitizes argument.
	 * Return value MUST be formatted or cleaned text to display.
	 *
	 * @param string $value Value to evaluate or clean.  Required.
	 *
	 * @return string
	 */
	function redux_custom_sanitize( string $value ): string {
		$return = '';

		foreach ( explode( ' ', $value ) as $w ) {
			foreach ( str_split( $w ) as $k => $v ) {
				if ( ( $k + 1 ) % 2 !== 0 && ctype_alpha( $v ) ) {
					$return .= mb_strtoupper( $v );
				} else {
					$return .= $v;
				}
			}

			$return .= ' ';
		}

		return $return;
	}
}
