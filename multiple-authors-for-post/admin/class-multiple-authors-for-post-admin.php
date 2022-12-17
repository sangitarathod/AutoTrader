<?php

/**
 * The admin-specific functionality of the plugin.
 *
 *
 * @since      1.0.0
 *
 * @package    MultipleAuthorsForPost
 * @subpackage MultipleAuthorsForPost/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MultipleAuthorsForPost
 * @subpackage MultipleAuthorsForPost/admin
 * @author     AutoTrader
 */
class Multiple_Authors_For_Post_Admin
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


	/* Enqueue admin Css */

	/* */
	public function mafp_add_multiple_authors_meta_box($post_type)
	{
		$post_types = array('post', 'page');

		//limit meta box to certain post types
		if (in_array($post_type, $post_types)) {
			add_meta_box(
				'multiple-authors',
				__('Developers', 'multipleauthorsforpost'),
				array($this, 'mafp_multiple_authors_meta_box_callback'),
				$post_type,
				'side',
				'default',
			);
		}
	}

	public function mafp_multiple_authors_meta_box_callback($post)
	{
		wp_nonce_field(basename(__FILE__), "multiple_authors_nonce");
		$authors_meta = maybe_unserialize(get_post_meta($post->ID, 'multiple_authors_data', true));
		$args = array(
			'role' => 'author',
			'orderby' => 'user_nicename',
			'order' => 'ASC'
		);
		$all_authors = get_users($args);
		if (!empty($all_authors)) {
			foreach ($all_authors as $author) {
				if (is_array($authors_meta) && in_array($author->ID, $authors_meta)) {
					$checked = 'checked="checked"';
				} else {
					$checked = null;
				}
?>

<p>
	<input type="checkbox" name="multiauthors[]" value="<?php echo $author->ID; ?>" <?php echo $checked; ?> />
	<?php echo ucfirst($author->display_name); ?>
</p>


<?php
			}
		} else {
			echo '<p>No Authors found.</p>';
		}
	}

	public function mafp_save_multiple_authors_meta($post_id)
	{
		$is_autosave = wp_is_post_autosave($post_id);
		$is_revision = wp_is_post_revision($post_id);
		$is_valid_nonce = (isset($_POST['multiple_authors_nonce']) && wp_verify_nonce($_POST['multiple_authors_nonce'], basename(__FILE__))) ? 'true' : 'false';

		if ($is_autosave || $is_revision || !$is_valid_nonce) {
			return;
		}

		// If the checkbox was not empty, save it as array in post meta
		if (!empty($_POST['multiauthors'])) {
			update_post_meta($post_id, 'multiple_authors_data', $_POST['multiauthors']);

			// Otherwise just delete it if its blank value.
		} else {
			delete_post_meta($post_id, 'multiple_authors_data');
		}


	}
}