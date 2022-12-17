<?php

/**
 * The public-facing functionality of the plugin.
 *
 * 
 * @since      1.0.0
 *
 * @package    AutoTraderImageSlideshow
 * @subpackage AutoTraderImageSlideshow/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    AutoTraderImageSlideshow
 * @subpackage AutoTraderImageSlideshow/public
 * @author    AutoTrader
 */
class Auto_Trader_Image_Slideshow_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	// Enque script

	// Enqueue Style
	public function atis_public_include_js()
	{

		wp_enqueue_script(
			'responsive slider',
			plugin_dir_url(__FILE__) . 'js/responsiveslides.min.js',
			array('jquery'),
		NULL,
		true
		);

		wp_enqueue_script(
			'custom-public',
			plugin_dir_url(__FILE__) . 'js/custom-public.js',
			array('jquery'),
		NULL,
		true
		);

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/custom-public.css', array(), $this->version, 'all');
	}


	public function atis_display_image_slideshow($attrs)
	{
		//wp_enqueue_style($this->plugin_name);
		$slideshow_images = (get_option('atis_settings')) ? get_option('atis_settings') : array();

		$slideshow_images_ids = $slideshow_images['atis_image'] ?? array();
		$slideshow_output = '';



		$slideshow_output .= '<div class="rslides" id="slider">';
		foreach ($slideshow_images_ids as $slide_id) {
			if ($slide_id != '') {
				$image_url = wp_get_attachment_image_url($slide_id);
			}

			$slideshow_output .= '<img src="' . $image_url . '" alt="">';

		}
		$slideshow_output .= '</div>';

		return $slideshow_output;
	}
}