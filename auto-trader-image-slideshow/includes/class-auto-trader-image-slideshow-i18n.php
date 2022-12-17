<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 *
 * @since      1.0.0
 *
 * @package    AutoTraderImageSlideshow
 * @subpackage AutoTraderImageSlideshow/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    AutoTraderImageSlideshow
 * @subpackage AutoTraderImageSlideshow/includes
 * @author     AutoTrader 
 */
class Auto_Trader_Image_Slideshow_i18n
{


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function atis_load_plugin_textdomain()
	{

		load_plugin_textdomain(
			'auto-trader-image-slideshow',
		false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);

	}



}