<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Client class
 *
 * base class for client 
 */
 
require_once('Application.php');

class Client extends Application 
{
	
	/**
	 * Global array to be passed to all child controller methods
	 * @var array
	 */
	public $global = array();
	
	/**
	 * Default Language
	 * @var string
	 */
	protected $default_language = 'english';
	
	public function __construct() 
	{
	  parent::__construct();
		$this->global['language_list'] = $this->config->item('language_list');
		$this->check_language();	//	check language and set to default if not set
		
		//	load language file
		$this->lang->load('client', $this->session->userdata('language'));
	}
	
	/**
	 * [language description]
	 * @return [type] [description]
	 */
	public function language() {
		$language = $this->uri->segment(3);
		$this->set_language($language);
		
		$redirect = urldecode($this->input->get('redirect'));
		if (!empty($redirect)) {
			redirect($redirect);
		} else {
			redirect('welcome');
		}
	}
		
	/**
	 * [set_language description]
	 * @param string $language [description]
	 */
	protected function set_language($language) {
		if (array_key_exists($language, $this->config->item('language_list'))) {
			$this->session->set_userdata('language', $language);
		} else {
			$this->session->set_userdata('language', 'english');
		}
	}
	
	/**
	 * [check_language description]
	 * @return [type] [description]
	 */
	protected function check_language() {
		if (empty($this->session->userdata('language'))) {
			$this->session->set_userdata('language', $this->default_language);
		} 
		//	set current language
		$this->global['current_language'] = $this->session->userdata('language');
	}
}
