<?php

/**
 * Displays the content of an IFrame in a bootstrap block.
 * The width is taken from the column width
 */
class BootStrapIFrame extends BootStrapBlock {
	private static $singular_name = 'IFrame';
	private static $plural_name = 'IFrames';

	private static $db = array(
		'Height' => 'Int',
		'Src' => 'Text',
	);
}