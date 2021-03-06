<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Help.php
 *
 * Explain how to use the slideshow
 * 
 * Learn CodeIgniter website, template driven
 *
 */
class Help extends Application
{

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Default entry point
	 */
	function index()
	{
		$course = $this->course->metadata();
		$this->data = array_merge($this->data, (array) $course);

		$this->data['materials'] = $this->format_materials($this->materials->all());

		$this->data['pagetitle'] = $course->title.' ~ Help';
		$this->data['pagebody'] = 'help';
		$this->render();
	}

	/**
	 * Extract & format the materials & resources
	 */
	private function format_materials($materials)
	{
		$num = 1;
		$result = '';
		foreach ($materials as $name => $group)
		{
			$partial = '';
			foreach ($group as $type => $item)
			{
				$parms = array ('type' => $type, 'item' => $item);
				$partial .= $this->parser->parse('theme/_item', $parms, true);
			}
			$parms = array ('name' => $name, 'items' => $partial, 'num' => $num ++);
			$result .= $this->parser->parse('theme/_heading', $parms, true);
			$result .= $partial;
		}
		return $result;
	}

	/**
	 * Present the resource list
	 */
	public function resources() {
		$course = $this->course->metadata();
		$this->data = array_merge($this->data, (array) $course);

		$this->data['materials'] = $this->format_materials($this->materials->all());

		$this->data['pagetitle'] = $course->title.' ~ Help';
		$this->data['pagebody'] = 'help';
		$this->render();
		
	}
	/**
	 * Present the syllabus
	 */
	public function syllabus() {
		$course = $this->course->metadata();
		$this->data = array_merge($this->data, (array) $course);

		$this->data['materials'] = $this->format_materials($this->materials->all());

		$this->data['pagetitle'] = $course->title.' ~ Help';
		$this->data['pagebody'] = 'help';
		$this->render();
		
	}
}


