<?php
/**
 * Manages the settings fields definitions
 *
 * @package    Code_Snippets
 * @subpackage Settings
 */

namespace Code_Snippets\Settings;

/**
 * Retrieve the default setting values
 *
 * @return array
 */
function get_default_settings() {
	static $defaults;

	if ( isset( $defaults ) ) {
		return $defaults;
	}

	$defaults = array();

	foreach ( get_settings_fields() as $section_id => $fields ) {
		$defaults[ $section_id ] = array();

		foreach ( $fields as $field_id => $field_atts ) {
			$defaults[ $section_id ][ $field_id ] = $field_atts['default'];
		}
	}

	return $defaults;
}

/**
 * Retrieve the settings fields
 *
 * @return array
 */
function get_settings_fields() {
	static $fields;

	if ( isset( $fields ) ) {
		return $fields;
	}

	$fields = [];

	$fields['general'] = [
		'activate_by_default' => [
			'name'    => __( 'Activate by Default', 'code-snippets' ),
			'type'    => 'checkbox',
			'label'   => __( "Make the 'Save and Activate' button the default action when saving a snippet.", 'code-snippets' ),
			'default' => true,
		],

		'enable_tags' => [
			'name'    => __( 'Enable Snippet Tags', 'code-snippets' ),
			'type'    => 'checkbox',
			'label'   => __( 'Show snippet tags on admin pages.', 'code-snippets' ),
			'default' => true,
		],

		'enable_description' => [
			'name'    => __( 'Enable Snippet Descriptions', 'code-snippets' ),
			'type'    => 'checkbox',
			'label'   => __( 'Show snippet descriptions on admin pages.', 'code-snippets' ),
			'default' => true,
		],

		'list_order' => [
			'name'    => __( 'Snippets List Order', 'code-snippets' ),
			'type'    => 'select',
			'desc'    => __( 'Default way to order snippets on the All Snippets admin menu.', 'code-snippets' ),
			'options' => [
				'priority-asc'  => __( 'Priority', 'code-snippets' ),
				'name-asc'      => __( 'Name (A-Z)', 'code-snippets' ),
				'name-desc'     => __( 'Name (Z-A)', 'code-snippets' ),
				'modified-desc' => __( 'Modified (latest first)', 'code-snippets' ),
				'modified-asc'  => __( 'Modified (oldest first)', 'code-snippets' ),
			],
			'default' => 'priority-asc',
		],

		'disable_prism' => [
			'name'    => __( 'Disable Shortcode Syntax Highlighter', 'code-snippets' ),
			'type'    => 'checkbox',
			'label'   => __( 'Disable syntax highlighting when displaying snippet code on the front-end.', 'code-snippets' ),
			'default' => false,
		],

		'complete_uninstall' => [
			'name'    => __( 'Complete Uninstall', 'code-snippets' ),
			'type'    => 'checkbox',
			'label'   => __( 'When the plugin is deleted from the Plugins menu, also delete all snippets and plugin settings.', 'code-snippets' ),
			'default' => false,
		],
	];

	if ( is_multisite() && ! is_main_site() ) {
		unset( $fields['general']['complete_uninstall'] );
	}

	/* Description Editor settings section */
	$fields['description_editor'] = [

		'rows' => [
			'name'    => __( 'Row Height', 'code-snippets' ),
			'type'    => 'number',
			'label'   => __( 'rows', 'code-snippets' ),
			'default' => 5,
			'min'     => 0,
		],

		'use_full_mce' => [
			'name'    => __( 'Use Full Editor', 'code-snippets' ),
			'type'    => 'checkbox',
			'label'   => __( 'Enable all features of the visual editor.', 'code-snippets' ),
			'default' => false,
		],

		'media_buttons' => [
			'name'    => __( 'Media Buttons', 'code-snippets' ),
			'type'    => 'checkbox',
			'label'   => __( 'Enable the add media buttons.', 'code-snippets' ),
			'default' => false,
		],
	];

	/* Code Editor settings section */

	$fields['editor'] = [
		'theme' => [
			'name'       => __( 'Theme', 'code-snippets' ),
			'type'       => 'select',
			'default'    => 'default',
			'options'    => get_editor_theme_list(),
			'codemirror' => 'theme',
		],

		'indent_with_tabs' => [
			'name'       => __( 'Indent With Tabs', 'code-snippets' ),
			'type'       => 'checkbox',
			'label'      => __( 'Use hard tabs (not spaces) for indentation.', 'code-snippets' ),
			'default'    => true,
			'codemirror' => 'indentWithTabs',
		],

		'tab_size' => [
			'name'       => __( 'Tab Size', 'code-snippets' ),
			'type'       => 'number',
			'desc'       => __( 'The width of a tab character.', 'code-snippets' ),
			'default'    => 4,
			'codemirror' => 'tabSize',
			'min'        => 0,
		],

		'indent_unit' => [
			'name'       => __( 'Indent Unit', 'code-snippets' ),
			'type'       => 'number',
			'desc'       => __( 'How many spaces a block should be indented.', 'code-snippets' ),
			'default'    => 4,
			'codemirror' => 'indentUnit',
			'min'        => 0,
		],

		'wrap_lines' => [
			'name'       => __( 'Wrap Lines', 'code-snippets' ),
			'type'       => 'checkbox',
			'label'      => __( 'Whether the editor should scroll or wrap for long lines.', 'code-snippets' ),
			'default'    => true,
			'codemirror' => 'lineWrapping',
		],

		'code_folding' => [
			'name'       => __( 'Code Folding', 'code-snippets' ),
			'type'       => 'checkbox',
			'label'      => __( 'Allow folding functions or other blocks into a single line.', 'code-snippets' ),
			'default'    => true,
			'codemirror' => 'foldGutter',
		],

		'line_numbers' => [
			'name'       => __( 'Line Numbers', 'code-snippets' ),
			'type'       => 'checkbox',
			'label'      => __( 'Show line numbers to the left of the editor.', 'code-snippets' ),
			'default'    => true,
			'codemirror' => 'lineNumbers',
		],

		'auto_close_brackets' => [
			'name'       => __( 'Auto Close Brackets', 'code-snippets' ),
			'type'       => 'checkbox',
			'label'      => __( 'Auto-close brackets and quotes when typed.', 'code-snippets' ),
			'default'    => true,
			'codemirror' => 'autoCloseBrackets',
		],

		'highlight_selection_matches' => [
			'name'       => __( 'Highlight Selection Matches', 'code-snippets' ),
			'label'      => __( 'Highlight all instances of a currently selected word.', 'code-snippets' ),
			'type'       => 'checkbox',
			'default'    => true,
			'codemirror' => 'highlightSelectionMatches',
		],

		'highlight_active_line' => [
			'name'       => __( 'Highlight Active Line', 'code-snippets' ),
			'label'      => __( 'Highlight the line that is currently being edited.', 'code-snippets' ),
			'type'       => 'checkbox',
			'default'    => true,
			'codemirror' => 'styleActiveLine',
		],
		'keymap'                => [
			'name'       => __( 'Keymap', 'code-snippets' ),
			'type'       => 'select',
			'desc'       => __( 'The keymap to use in the editor.', 'code-snippets' ),
			'default'    => 'default',
			'options'    => [
				'default' => __( 'Default', 'code-snippets' ),
				'vim'     => __( 'Vim', 'code-snippets' ),
				'emacs'   => __( 'Emacs', 'code-snippets' ),
				'sublime' => __( 'Sublime Text', 'code-snippets' ),
			],
			'codemirror' => 'keyMap',
		],

	];

	$fields = apply_filters( 'code_snippets_settings_fields', $fields );

	return $fields;
}
