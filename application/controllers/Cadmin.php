<?php 
/**
 * 
 */
 class Cadmin extends CI_Controller
 {
 	
 	function cchanel_admin()
 	{
 		$this->load->view("vchanel_admin");
 	}

 	function cvideos_admin()
 	{
 		$this->load->view("vvideos_admin");
 	}

 	function cplaylists_admin()
 	{
 		$this->load->view("vplaylists_admin");
 	}
 } ?>