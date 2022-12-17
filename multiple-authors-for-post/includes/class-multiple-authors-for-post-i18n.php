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
 * @package    MultipleAuthorsForPost
 * @subpackage MultipleAuthorsForPost/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    MultipleAuthorsForPost
 * @subpackage MultipleAuthorsForPost/includes
 * @author     AutoTrader 
 */
class Multiple_Authors_For_Post_i18n
{


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function mafp_load_plugin_textdomain()
	{

		load_plugin_textdomain(
			'multiple-authors-for-post',
		false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);

	}



}