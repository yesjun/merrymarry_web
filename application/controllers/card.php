<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Card extends CI_Controller {

	function __construct() {
		parent::__construct();
		//$this->auth->is_logged_in();
	}

	function index() {
		//$this->load->model('fizzlebizzle');
		//$result = $this->fizzlebizzle->get_access_token();
		
		/*
			$this->session->set_userdata(array('access_token' => $result['access_token']));
		} else {
			$this->session->set_userdata(array('access_token' => FALSE));
		}
	
		$data['page'] = 'card_invite_view';
		$this->load->view('template', $data);
	}

	//some example functions
	//function me is DRY and dynamic to show as example
	//object: likes, home, feed, movies, music, books, notes, permissions, photos, albums, videos, uploaded, events, groups, checkins, locations, etc.
	//https://developers.facebook.com/docs/reference/api/
	function me($object = NULL) {
		if ($object == NULL) {
			$this->index();
		} else {
			$this->load->model('fizzlebizzle');
			$result = $this->fizzlebizzle->get_facebook_object($object, $this->session->userdata('facebook_uid'), $this->session->userdata('access_token'));
			
			if ($result['is_true']) {
				$data['objects'] = $result['data'];
			} else {
				$data['error_message'] = $result['message'];
				$data['objects'] = array();
			}
			
			$data['page'] = 'objects_view';
			$this->load->view('template', $data);
		}
	}
}