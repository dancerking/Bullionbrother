<?php
/**
 * Header HTML2 Options
 *
 * @package Kadence_Pro
 */

namespace Kadence_Pro;

use Kadence\Theme_Customizer;
use function Kadence\kadence;

$settings = array(
	'header_divider3_border' => array(
		'control_type' => 'kadence_border_control',
		'section'      => 'header_divider3',
		'label'        => esc_html__( 'Divider', 'kadence-pro' ),
		'default'      => kadence()->default( 'header_divider3_border' ),
		'live_method'     => array(
			array(
				'type'     => 'css_border',
				'selector' => '#main-header .header-divider3',
				'pattern'  => '$',
				'property' => 'border-right',
				'pattern'  => '$',
				'key'      => 'border',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'header_divider3_height' => array(
		'control_type' => 'kadence_range_control',
		'section'      => 'header_divider3',
		'label'        => esc_html__( 'Divider Height', 'kadence-pro' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#main-header .header-divider3',
				'pattern'  => '$',
				'property' => 'height',
				'key'      => 'size',
			),
		),
		'default'      => kadence()->default( 'header_divider3_height' ),
		'input_attrs'  => array(
			'min'     => array(
				'%'  => 0,
				'px'  => 0,
				'rem' => 0,
			),
			'max'     => array(
				'%'  => 100,
				'px'  => 100,
			),
			'step'    => array(
				'%'  => 1,
				'px'  => 1,
			),
			'units'   => array( '%', 'px' ),
			'responsive' => false,
		),
	),
	'header_divider3_margin' => array(
		'control_type' => 'kadence_measure_control',
		'section'      => 'header_divider3',
		'priority'     => 10,
		'default'      => kadence()->default( 'header_divider3_margin' ),
		'label'        => esc_html__( 'Margin', 'kadence-pro' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#main-header .header-divider3',
				'property' => 'margin',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'transparent_header_divider3_color' => array(
		'control_type' => 'kadence_color_control',
		'section'      => 'transparent_header_design',
		'label'        => esc_html__( 'Divider 3 Color', 'kadence-pro' ),
		'default'      => kadence()->default( 'transparent_header_divider3_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.transparent-header #main-header .header-divider3',
				'property' => 'border-color',
				'pattern'  => '$',
				'key'      => 'color',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Color', 'kadence-pro' ),
					'palette' => true,
				),
			),
		),
	),
);

Theme_Customizer::add_settings( $settings );

