<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class API_Controller extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	/*
	 * Commodity to check that the ID is not wrong and return a coherent error
	 * 
	 * @author Woxxy
	 */
	function check_board()
	{
		if (!$this->get('board'))
		{
			$this->response(array('error' => _('You didn\'t select a board')), 404);
		}
			
		if(!$this->radix->set_selected_by_shortname($this->get('board')))
		{
			$this->response(array('error' => _('The board you selected doesn\'t exist')), 404);
		}

		$this->load->model('post');
	}
	
}