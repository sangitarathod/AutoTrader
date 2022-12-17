<?php
/**
 * Plugin Name: Multiple Authors For Post
 * Description: This plugin adds one metabox to select multiple authors for the post and at frontend it will display list of authors of post.
 * Version: 1.0
 * Author: AutoTrader
 * Text Domain: multipleauthorsonpost      
 * Domain Path: /languages
 */


//to avoid direct file access
if (!defined('ABSPATH')) {
    exit;
}

define('MULTIPLE_AUTHORS_FOR_POST_VERSION', '1.0.0');
$multiple_authors_for_post_plugin_path = plugin_dir_path(__FILE__);
define('MULTIPLE_AUTHORS_FOR_POST_PLUGIN_PATH', $multiple_authors_for_post_plugin_path);
$multiple_authors_for_post_plugin_url = plugin_dir_url(__FILE__);
define('MULTIPLE_AUTHORS_FOR_POST_PLUGIN_URL', $multiple_authors_for_post_plugin_url);


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-multiple-authors-for-post-activator.php
 */
function activate_multiple_authors_for_post()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-multiple-authors-for-post-activator.php';
    Multiple_Authors_For_Post_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-multiple-authors-for-post-deactivator.php
 */
function deactivate_multiple_authors_for_post()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-multiple-authors-for-post-deactivator.php';
    Multiple_Authors_For_Post_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_multiple_authors_for_post');
register_deactivation_hook(__FILE__, 'deactivate_multiple_authors_for_post');

require plugin_dir_path(__FILE__) . 'includes/class-multiple-authors-for-post.php';



/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_multiple_authors_for_posts()
{

    $plugin = new MultipleAuthorsForPost();
    $plugin->run();

}
run_multiple_authors_for_posts();