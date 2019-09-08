<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Corn extends CI_Controller 
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
       parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('cron_model');
    }
    
    /**
     * This function is used to update the age of users automatically
     * This function is called by cron job once in a day at midnight 00:00
     */
    public function freeSongsFromJudges()
    {            
        $res =  $this->cron_model->selectRows();
        echo "<pre>";print_r($res);
		for($i=0; $i<count($res); $i++){
			//$affectedRows =  $this->cron_model->deleteRows($res[$i]->id);
		}
        
    }
}
?>