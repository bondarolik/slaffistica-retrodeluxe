<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'SFMTBX_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box
	'id' => 'archivetypes',

	// Meta box title - Will appear at the drag and drop handle bar
	'title' => 'Дополнительные настройки',

	// Post types, accept custom post types as well - DEFAULT is array('post'); (optional)
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side; optional
	'context' => 'normal',

	// Order of meta box: high (default), low; optional
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		# Setter for announce publication
		# if "yes" then title will be "Announcin: title_headline"
		array(
			'name'		=> 'Эта запись анонс?',
			'id'		=> "{$prefix}announce",
			'type'		=> 'radio',
			// Array of 'key' => 'value' pairs for radio options.
			// Note: the 'key' is stored in meta field, not the 'value'
			'options'	=> array(
				'yes'			=> 'Да',
				'no'			=> 'Нет'
			),
			'std'		=> 'no',
			'desc'		=> 'Название title записи изменится на "Анонс: Название пост"'
		),
		# Setter for post from old blog
		array(
			'name'		=> 'Архивная запись',
			'id'		=> "{$prefix}archives",
			'type'		=> 'radio',
			// Array of 'key' => 'value' pairs for radio options.
			// Note: the 'key' is stored in meta field, not the 'value'
			'options'	=> array(
				'yes'			=> 'Да',
				'no'			=> 'Нет'
			),
			'std'		=> 'no',
			'desc'		=> 'Отметь "ДА" только в случае, если это архивная запись'
		)			
	)
);



/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'register_meta_boxes' );