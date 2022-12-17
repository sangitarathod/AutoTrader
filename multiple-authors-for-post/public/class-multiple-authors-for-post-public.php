<?php

/**
 * The public-facing functionality of the plugin.
 *
 * 
 * @since      1.0.0
 *
 * @package    MultipleAuthorsForPost
 * @subpackage MultipleAuthorsForPost/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    MultipleAuthorsForPost
 * @subpackage MultipleAuthorsForPost/public
 * @author    AutoTrader
 */
class Multiple_Authors_For_Post_Public
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

	// Enqueue scripts


	// Enqueue Style

	// Display Developers list on frontend
	public function mafp_display_multiple_authors($content)
	{
		global $post;

		// retrieve the global notice for the current post
		$all_authors = maybe_unserialize(get_post_meta($post->ID, 'multiple_authors_data', true));
		$author_display_name = '';
		if (!empty($all_authors)) {
			$author_display_name .= '<div class="at-developers"><h4>Developers </h4>';
			foreach ($all_authors as $author) {
				intval($author);
				$author_url = get_author_posts_url(intval($author));
				$author_obj = get_user_by('ID', intval($author));
				$author_display_name .= '<div class="wp-block-post-author">
											<div class="wp-block-post-author__avatar">' .
					get_avatar(intval($author), 48, '', $author_obj->display_name, ) . '<a href="' . $author_url . '"><p class="wp-block-post-author__name" style="display:inline-block; margin-left:15px;">' . $author_obj->display_name . '</p></a>
					</div>
				</div>';

			}
			$author_display_name .= '</div>';
		}

		return $content . $author_display_name;

	}
}