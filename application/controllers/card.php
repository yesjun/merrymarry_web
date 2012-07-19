<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Card extends CI_Controller {

	function __construct() {
		parent::__construct();
		//$this->auth->is_logged_in();
	}

	function index() {
		//$this->load->model('fizzlebizzle');
		//$result = $this->fizzlebizzle->get_access_token();
		
		/*		if ($result['is_true']) {
			$this->session->set_userdata(array('access_token' => $result['access_token']));
		} else {
			$this->session->set_userdata(array('access_token' => FALSE));
		}		*/				$tmp_fname = tempnam("/tmp", "CURLCOOKIE");		$curl_options = array(				//CURLOPT_COOKIESESSION => true, 				//CURLOPT_COOKIEJAR => $tmp_fname,				CURLOPT_COOKIEFILE => $tmp_fname,				//CURLOPT_FRESH_CONNECT => false,				//CURLOPT_TIMEOUT_MS => 1, // timeout milliseconds on response				//CURLOPT_TIMEOUT => 300, // timeout on response				CURLOPT_RETURNTRANSFER => true, // return web page				CURLOPT_HEADER => false, // return headers				//CURLOPT_FOLLOWLOCATION => true, // follow redirects				//CURLOPT_SSL_VERIFYPEER => false,				//CURLOPT_ENCODING => "gzip,deflate,sdch", // handle all encodings				CURLOPT_USERAGENT => "merrymarry_web", // who am i				CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Connection: keep-alive'),				//CURLOPT_AUTOREFERER => true, // set referer on redirect				//CURLOPT_CONNECTTIMEOUT => 0, // timeout on connect				//CURLOPT_MAXREDIRS => 10, // stop after 10 redirects				CURLOPT_POST => true				);				$curl_handle = curl_init("http://api.merrymarry.me/TransactionProvider.aspx");		curl_setopt_array($curl_handle, $curl_options);		curl_setopt($curl_handle, CURLOPT_COOKIEJAR, $tmp_fname);				$this->load->library('awslib');		$sqs = new AmazonSQS();		$response = $sqs->list_queues();		//var_dump($response->isOK());		$data['awsobj'] = $response;				$array_req_data = array(				'datas'=>array(						'reqName'=>'RefreshSession', 						'reqData'=>json_encode(array('data'=>'none'))						)				);		$json_req_data = json_encode($array_req_data);		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $json_req_data);		//$curl_handle->post($json_req_data);		//$json_res_data =  $curl_handle->execute();		$json_res_data = curl_exec($curl_handle);		$array_res_data = json_decode($json_res_data);				$data['mmares'] = $json_res_data;		$data['mmaresinfo'] = curl_getinfo($curl_handle);				if ($array_res_data->d->msgCode != '999') {			//show_error($array_res_data->d->msgContext);		}				curl_close($curl_handle);				$fh = fopen($tmp_fname, 'r');		$theData = fread($fh, filesize($tmp_fname));		fclose($fh);		$data['mmasess'] = $theData;				$curl_handle = curl_init("http://api.merrymarry.me/TransactionProvider.aspx");		curl_setopt_array($curl_handle, $curl_options);		$array_req_data = array(				'datas'=>array(						'reqName'=>'GetWeddingEvent',						'reqData'=>json_encode(array('eventId'=>'100001374129716&100002993798580', 'regDate'=>'2012-06-18T10:10:36.389Z'))						)				);		$json_req_data = json_encode($array_req_data);		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $json_req_data);		$json_res_data =  curl_exec($curl_handle);		if (!$json_res_data) {			$array_res_data = $curl_handle->debug();		} else {			$array_res_data = json_decode($json_res_data);		}				$array_res_data = curl_getinfo($curl_handle);				$data['invite_data'] = $json_res_data;		$data['invite_datainfo'] = $json_req_data;
			curl_close($curl_handle);
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