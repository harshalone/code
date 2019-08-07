<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller {
	
	public function __construct()
    {
            parent::__construct();
         	$this->load->library('simpleauth');
         	// load form helper and validation library
		    $this->load->helper('form');
		    $this->load->library('form_validation');
		    
			//if(!isset($userid)){ redirect('auth/logout'); }
		    // load user model
            $this->load->model('admin/Article_model','Article_model');
            
            $this->load->model('admin/Newsletter_model','Newsletter_model');
            
    }

	public function index()
	{
		$data            = new stdClass(); 
		$data->campaigns =  $this->Newsletter_model->get_newsletter_campaign(10, 0);		
		$this->load->view('admin/newsletter/index', $data);
	}
	
	public function add_list()
	{
		$data         = new stdClass();    
		//print_r($_SESSION); die();
		$userid        = $this->session->userdata('userid');
		// form validation rules 
		$this->form_validation->set_rules('title', 'Title', 'required');  
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[5]',
        array('required' => 'Description must be 50 words long.'));  
			
		if ($this->form_validation->run() === false) {
		     
		     $this->load->view('admin/newsletter/add_list', $data);
		     
		  } else {
		  	$title             = $this->input->post('title');   
		  	$description       = $this->input->post('description');  
		  	 
	        
	        $adddata = array(
		        	'list_title' => $title, 
		            'description' => $description,
		            'created_at' => date("Y-m-d H:i:s")
		            );         
		        //$updated = $this->User_model->update_user($updata, $userid); 
		       	$article_id  = $this->Newsletter_model->add_list($adddata);
		       	 
			    
	            if($article_id){  
	            	 
	               $data->success        = "Your List added successfully.";  
			       
				   $this->load->view('admin/newsletter/add_list', $data);
			       
	            }else{
	               $data->error     = "Error: please try again."; 
			       $this->load->view('admin/newsletter/add_list', $data);
	            }
	         
            // else finished for params id check
		  	}
		 
		
	}
	
	public function add_campaign()
	{
		$data         = new stdClass();    
		//print_r($_SESSION); die();
		$userid        = $this->session->userdata('userid');
		// form validation rules 
		$this->form_validation->set_rules('campaign_title', 'Title', 'required');  
			
		if ($this->form_validation->run() === false) {
		     
		     $this->load->view('admin/newsletter/add_campaign', $data);
		     
		  } else {
			  
		  	$title              = $this->input->post('campaign_title');    
		  	$campaign_unique_id = random_bytes(5); 
	        
	        $adddata = array(
					'campaignuid' => $campaign_unique_id,
		        	'campaign_title' => $title,  
		            'created_at' => date("Y-m-d H:i:s")
		            );         
		        //$updated = $this->User_model->update_user($updata, $userid); 
		       	$campaign_id  = $this->Newsletter_model->add_newsletter_campaign($adddata);
		       	 
			    
	            if($campaign_id){  
	            	 
	               $data->success        = "Your campaign added successfully.";  
			       
				   
				   $this->load->view('admin/newsletter/add_campaign', $data);
			       
	            }else{
	               $data->error     = "Error: please try again."; 
				   $this->load->view('admin/newsletter/add_campaign', $data);
	            }
	         
            // else finished for params id check
		  	}
		 
		
		
	}
	
	public function update_campaign_message($campaignuid)
	{ 
		$data         = new stdClass();    
		//print_r($_SESSION); die();
		$userid        = $this->session->userdata('userid');
		// form validation rules 
		$this->form_validation->set_rules('email_subject', 'Subject', 'required');  
		$this->form_validation->set_rules('email_message', 'Email', 'required');  
			
		if ($this->form_validation->run() === false) {
		     
		     $this->load->view('admin/newsletter/add_campaign_message', $data);
		
		     
		  } else {
			  
		  	$email_subject = $this->input->post('email_subject');    
			$email_message = $this->input->post('email_message'); 
		  	 
	        
	        $adddata = array(
		        	'email_subject' => $email_subject,  
					'email_message' => $email_message
		            );         
		        //$updated = $this->User_model->update_user($updata, $userid); 
		       	$campaign_id  = $this->Newsletter_model->update_newsletter_campaign($adddata, $campaignuid);
		       	 
			    
	            if($campaign_id){  
	            	 
	               $data->success        = "Your campaign is updated successfully.";  
			       
				   
				   $this->load->view('admin/newsletter/add_campaign_message', $data);
		
			       
	            }else{
	               $data->error     = "Error: please try again."; 
				   $this->load->view('admin/newsletter/add_campaign_message', $data);
		
	            }
	         
            // else finished for params id check
		  	}
		 
		
	}
	
	public function update_campaign_list_date_time($campaignuid)
	{ 
		$data         = new stdClass();    
		//print_r($_SESSION); die();
		$userid        = $this->session->userdata('userid');
		// form validation rules 
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');  
		$this->form_validation->set_rules('start_time', 'Start Time', 'required');  
			
		if ($this->form_validation->run() === false) {
		     
		    
		    $this->load->view('admin/newsletter/add_campaign_list_date_time', $data);
		     
		  } else {
			  
		  	$start_date = $this->input->post('start_date');    
			$start_time = $this->input->post('start_time'); 
		  	 
	        
	        $adddata = array(
		        	'start_date' => $start_date,  
					'start_time' => $start_time
		            );         
		        //$updated = $this->User_model->update_user($updata, $userid); 
		       	$campaign_id  = $this->Newsletter_model->update_newsletter_campaign($adddata, $campaignuid);
		       	 
			    
	            if($campaign_id){  
	            	 
	               $data->success        = "Your campaign is updated successfully.";  
			       $this->load->view('admin/newsletter/add_campaign_list_date_time', $data);
			       
	            }else{
	               $data->error     = "Error: please try again."; 
				   $this->load->view('admin/newsletter/add_campaign_message', $data);
		
	            }
	         
            // else finished for params id check
		  	}
		  
	}
}
		
