<?php

/**
 * A BootStrap Row is a container block that holds other blocks inside it.
 * It translates into a BootStrap row div holding many columns
 */
class BootStrapRow extends Block{

	private static $db = array(
		'ShowDivider' => 'Boolean',
	);

	private static $has_many = array(
		'BootStrapBlocks' => 'BootStrapBlock',
	);

	/**
	 * CSS Class will be based off the row title
	 * @return string
	 */
	public function getCSSClass() {
		$filter = URLSegmentFilter::create();
		return $filter->filter($this->Title);
	}

	/**
	 * Returns all the subclasses of BootStrapBlock which can be added inside the row
	 * @return array
	 */
	public function getBootStrapBlockClasses(){
		$classes = ArrayLib::valuekey(ClassInfo::subclassesFor('BootStrapBlock'));

		foreach ($classes as $k => $v) {
			$classes[$k] = singleton($k)->singular_name();
		}

		return $classes;
	}

	/**
	 * Contains the gridfield for managing the blocks inside the row
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$blocksField = $fields->dataFieldByName('BootStrapBlocks');

		if ($blocksField) {
			$config = $blocksField->getConfig();

			$config->removeComponentsByType('GridFieldAddNewbutton');
			$multiClass = new GridFieldAddNewMultiClass();
			$classes = $this->getBootStrapBlockClasses();
			$multiClass->setClasses($classes);
			$config->addComponent($multiClass);
			$config->addComponent(new GridFieldSortableRows('SortID'));
		}

		return $fields;

	}
}
