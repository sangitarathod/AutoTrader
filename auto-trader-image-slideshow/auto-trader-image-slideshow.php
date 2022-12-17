<?php
/**
 * Plugin Name: Auto Trader Image Slideshow
 * Description: This plugin creates one setting menu at admin side. Admin will add multiple images. shortcode could be used to display slideshow in post or page.
 * Version: 1.0
 * Author: AutoTrader
 * Text Domain: autotraderimageslideshow      
 * Domain Path: /languages
 */


//to avoid direct file access
if (!defined('ABSPATH')) {
    exit;
}

define('AUTO_TRADER_IMAGE_SLIDESHOW_VERSION', '1.0.0');
$auto_trader_image_slideshow_plugin_path = plugin_dir_path(__FILE__);
define('AUTO_TRADER_IMAGE_SLIDESHOW_PLUGIN_PATH', $auto_trader_image_slideshow_plugin_path);
$auto_trader_image_slideshow_plugin_url = plugin_dir_url(__FILE__);
define('AUTO_TRADER_IMAGE_SLIDESHOW_PLUGIN_URL', $auto_trader_image_slideshow_plugin_url);


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-auto-trader-image-slideshow-activator.php
 */
function activate_auto_trader_image_slideshow()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-auto-trader-image-slideshow-activator.php';
    Auto_Trader_Image_Slideshow_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-auto-trader-image-slideshow-deactivator.php
 */
function deactivate_auto_trader_image_slideshow()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-auto-trader-image-slideshow-deactivator.php';
    Auto_Trader_Image_Slideshow_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_auto_trader_image_slideshow');
register_deactivation_hook(__FILE__, 'deactivate_auto_trader_image_slideshow');

require plugin_dir_path(__FILE__) . 'includes/class-auto-trader-image-slideshow.php';



/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_auto_trader_image_slideshow()
{

    $plugin = new AutoTraderImageSlideshow();
    $plugin->run();

}
run_auto_trader_image_slideshow();