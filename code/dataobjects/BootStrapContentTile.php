<?php
class BootStrapContentTile extends BootStrapBlock {
	private static $singular_name = 'Content Tile';
	private static $plural_name = 'Content Tiles';

	private static $db = array(
		'Link' => 'Varchar(255)',
		'OpenInNewWindow' => 'Boolean',
	);

	private static $has_one = array(
		'Image' => 'Image'
	);
}