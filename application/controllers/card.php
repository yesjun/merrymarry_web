<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Card extends CI_Controller {

	function __construct() {
		parent::__construct();				//Allow querystrings for this constructor		parse_str($_SERVER['QUERY_STRING'],$_GET);		
		//$this->auth->is_logged_in();
	}

	function index() {
		//$this->load->model('fizzlebizzle');
		//$result = $this->fizzlebizzle->get_access_token();
		
		/*		if ($result['is_true']) {
			$this->session->set_userdata(array('access_token' => $result['access_token']));
		} else {
			$this->session->set_userdata(array('access_token' => FALSE));
		}		*/				$eventid = NULL;		$regdate = NULL;				if(isset($_GET['request_ids'])) {			$signed_request = $this->input->get('request_ids');			$APPLICATION_ID = $this->facebook->appId;			$APPLICATION_SECRET = $this->facebook->secret;					/*			 * Get the current user, you may use the PHP-SDK			* or your own server-side flow implementation			*/			$user = getUserFromSignedRequest();					$app_token = get_app_access($APPLICATION_ID,$APPLICATION_SECRET);					// We may have more than one request, so it's better to loop			$requests = explode(',', $signed_request);			foreach($requests as $request_id) {				// If we have an authenticated user, this would return a recipient specific request: <request_id>_<recipient_id>				if($user) {					$request_id = $request_id . "_{$user}";				}						// Get the request details using Graph API				$request_content = json_decode(file_get_contents("https://graph.facebook.com/$request_id?$app_token"), TRUE);							// An example of how to get info from the previous call				$request_message = $request_content['message'];				$from_id = $request_content['from']['id'];							// An easier way to extract info from the data field				extract(json_decode($request_content['data'], TRUE));				// Now that we got the $item_id and the $item_type, process them				// Or if the recevier is not yet a member, encourage him to claims his item (install your application)!				//echo $item_id;							if($user) {					/*					 * When all is done, delete the requests because Facebook will not do it for you!					* But first make sure we have a user (OR access_token - not used here)					* because you can't delete a "general" request, you can only delete a recipient specific request					* <request_id>_<recipient_id>					*/					$deleted = file_get_contents("https://graph.facebook.com/$request_id?$app_token&method=delete"); // Should return true on success				}			}		} else {			$eventid = '100001374129716&100002993798580';			$regdate = '2012-06-18T10:10:36.389Z';		}				function get_app_access($appId, $appSecret) {			$token_url =    "https://graph.facebook.com/oauth/access_token?" .					"client_id=" . $appId .					"&client_secret=" . $appSecret .					"&grant_type=client_credentials";			$token = file_get_contents($token_url);			return $token;		}				function getUserFromSignedRequest() {			if(isset($_GET['signed_request'])) {				$signed_request = $this->input->get('signed_request');				list($encoded_sig, $payload) = explode('.', $signed_request, 2);				$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);						if( !empty($data['user_id']) )					return $data['user_id'];			}			return null;		}				$tmp_fname = tempnam("/tmp", "CURLCOOKIE");		$curl_options = array(				//CURLOPT_COOKIESESSION => true, 				//CURLOPT_COOKIEJAR => $tmp_fname,				CURLOPT_COOKIEFILE => $tmp_fname,				//CURLOPT_FRESH_CONNECT => false,				//CURLOPT_TIMEOUT_MS => 1, // timeout milliseconds on response				//CURLOPT_TIMEOUT => 300, // timeout on response				CURLOPT_RETURNTRANSFER => true, // return web page				CURLOPT_HEADER => false, // return headers				//CURLOPT_FOLLOWLOCATION => true, // follow redirects				//CURLOPT_SSL_VERIFYPEER => false,				//CURLOPT_ENCODING => "gzip,deflate,sdch", // handle all encodings				CURLOPT_USERAGENT => "merrymarry_web", // who am i				CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Connection: keep-alive'),				//CURLOPT_AUTOREFERER => true, // set referer on redirect				//CURLOPT_CONNECTTIMEOUT => 0, // timeout on connect				//CURLOPT_MAXREDIRS => 10, // stop after 10 redirects				CURLOPT_POST => true				);				$curl_handle = curl_init("http://api.merrymarry.me/TransactionProvider.aspx");		curl_setopt_array($curl_handle, $curl_options);		curl_setopt($curl_handle, CURLOPT_COOKIEJAR, $tmp_fname);		date_default_timezone_set('UTC');				$this->load->library('awslib');		$sqs = new AmazonSQS();		$response = $sqs->list_queues();		//var_dump($response->isOK());		$data['awsobj'] = $response;				$array_req_data = array(				'datas'=>array(						'reqName'=>'RefreshSession', 						'reqData'=>json_encode(array('data'=>'none'))						)				);		$json_req_data = json_encode($array_req_data);		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $json_req_data);		//$curl_handle->post($json_req_data);		//$json_res_data =  $curl_handle->execute();		$json_res_data = curl_exec($curl_handle);		$array_res_data = json_decode($json_res_data);				$data['mmares'] = $json_res_data;		$data['mmaresinfo'] = curl_getinfo($curl_handle);				if ($array_res_data->d->msgCode != '999') {			show_error($array_res_data->d->msgContext);		}				curl_close($curl_handle);				$fh = fopen($tmp_fname, 'r');		$theData = fread($fh, filesize($tmp_fname));		fclose($fh);		$data['mmasess'] = $theData;				$curl_handle = curl_init("http://api.merrymarry.me/TransactionProvider.aspx");		curl_setopt_array($curl_handle, $curl_options);		$array_req_data = array(				'datas'=>array(						'reqName'=>'GetWeddingEvent',						'reqData'=>json_encode(array('eventId'=>urldecode($eventid), 'regDate'=>urldecode($regdate)))						)				);		$json_req_data = json_encode($array_req_data);		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $json_req_data);		$json_res_data =  curl_exec($curl_handle);		if (!$json_res_data) {			$array_res_data = $curl_handle->debug();		} else {			$array_res_data = json_decode($json_res_data);		}				if ($array_res_data->d->msgCode != '12') {			show_error($array_res_data->d->msgContext);		}				$data['invite_data'] = $array_res_data->d->resData;		$data['invite_datainfo'] = $json_req_data;				$locationArray = explode('/', $array_res_data->d->resData->weddingEvent->where);		$locationInfo = Array();		if (count($locationArray) == 3) {			$locationInfo['lat'] = $locationArray[0];			$locationInfo['lon'] = $locationArray[1];			$locationInfo['add'] = $locationArray[2];		}		$data['invite_loc_data'] = $locationInfo;				$data['gift_data'] = $array_res_data->d->resData->weddingEvent->gifts;
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