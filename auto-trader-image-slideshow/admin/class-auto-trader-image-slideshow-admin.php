<?php

/**
 * The admin-specific functionality of the plugin.
 *
 *
 * @since      1.0.0
 *
 * @package    AutoTraderImageSlideshow
 * @subpackage AutoTraderImageSlideshow/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    AutoTraderImageSlideshow
 * @subpackage AutoTraderImageSlideshow/admin
 * @author     AutoTrader
 */
class Auto_Trader_Image_Slideshow_Admin
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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}


	/* Enqueue admin js */

	function atis_include_js()
	{
		if (!did_action('wp_enqueue_media')) {
			wp_enqueue_media();
		}
		// our custom JS
		wp_enqueue_script(
			'custom-admin',
			plugin_dir_url(__FILE__) . 'js/atis-custom-admin.js',
			array('jquery')
		);

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/atis-custom-admin.css', array(), $this->version, 'all');
	}


	/* */
	public function atis_setting_page()
	{
		add_submenu_page('options-general.php', 'AutoTrader Images', 'AutoTrader Images', 'manage_options', 'auto-trader-images', array($this, 'atis_settings_function'));
	}

	public function atis_settings_init()
	{
		register_setting('atis-setting', 'atis_settings');
		add_settings_section('atis-plugin-section', __('Auto Trader Images Section', 'autotraderimageslideshow'), array($this, 'atis_settings_section_callback'), 'atis-setting');
		add_settings_field('atis_image', __('Image :', 'autotraderimageslideshow'), array($this, 'atis_image_callback'), 'atis-setting', 'atis-plugin-section');

	}
	function atis_settings_section_callback()
	{
		echo __('This is the Section Description', 'autotraderimageslideshow');
	}

	function atis_image_callback()
	{
		$options = (get_option('atis_settings')) ? get_option('atis_settings') : array();
		$image_ids = $options['atis_image'] ?? null;

?>
<div class="wrapper">
	<?php
		if (!empty($image_ids)) {
			$i = 0;
			foreach ($image_ids as $image_id) {

    ?>
	<?php if ($image_id !== '') {
					$image = wp_get_attachment_image_url($image_id, 'medium');
    ?>
	<div class="slider-images">
		<a href="#" class="rudr-upload">
			<img src="<?php echo esc_url($image) ?>" />
		</a>
		<a href="#" class="button rudr-remove">Remove image</a>
		<input type="hidden" name="atis_settings[atis_image][]" value="<?php echo absint($image_id) ?>">
	</div>


	<?php } elseif (count($image_ids) == 1) { ?>

	<div class="slider-images">
		<a href="#" class="button rudr-upload">Upload image</a>
		<a href="#" class="button rudr-remove" style="display:none">Remove image</a>
		<input type="hidden" name="atis_settings[atis_image][]" value="">
	</div>

	<?php } else {

				}

				$i++;
			}
		} else { ?>

	<div class="slider-images">
		<a href="#" class="button rudr-upload">Upload image</a>
		<a href="#" class="button rudr-remove" style="display:none">Remove image</a>
		<input type="hidden" name="atis_settings[atis_image][]" value="">
	</div>



	<?php } ?>
</div>
<p><button class="add_fields">Add More Fields</button></p>
<?php
	}

	function atis_settings_function()
	{ ?>
<form action='options.php' method='post'>
	<?php
		settings_fields('atis-setting');
		do_settings_sections('atis-setting');
		submit_button(); ?>
</form>
<?php
	}

}