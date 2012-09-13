<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index(){
    	// load email and form helpers ** you can autoload them from config/autoload.php
	$this->load->helper('email');
	$this->load->helper('form'); 
	
        $this->load->view('contact_view');
    }

    function emailsender(){
	// load form validation class
    	$this->load->library('form_validation');

	// set form validation rules
    	$this->form_validation->set_rules('sender_name', 'From', 'required');
	$this->form_validation->set_rules('sender_email', 'Email', 'required|valid_email');
	$this->form_validation->set_rules('subject', 'Subject', 'required');
	$this->form_validation->set_rules('message', 'Message', 'required');

    	if ($this->form_validation->run() == FALSE)
	{
		$this->load->view('contact_view');
	}
	else {
		// you can also load email library here
		// $this->load->library('email');

		// set email data
	    	$this->email->from($this->input->post('sender_email'), $this->input->post('sender_name'));
	    	$this->email->to('furiston@furiston.com');
	    	$this->email->reply_to($this->input->post('sender_email'), $this->input->post('sender_name'));
	    	$this->email->subject($this->input->post('subject'));
	    	$this->email->message($this->input->post('message'));
	    	$this->email->send();

		// create a view named "succes_view" and load it at the end
	    	$this->load->view('success_view');
	}    	
    }
}
?>
