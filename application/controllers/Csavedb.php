<?php

/**
 *
 */
 class Csavedb extends CI_Controller
 {

 	//fungsi untuk save ke database
 	function csavedbf()
 	{
 		require_once("phpQuery/phpQuery/phpQuery.php");
$url = "https://www.youtube.com/channel/UCpSPS5yLCxYRuZSrCx-eBjA/videos";
$get = file_get_contents($url);

//data grab youtube 
$dom = phpQuery::newDocument($get);
$list = pq("#channels-browse-content-grid li.channels-content-item.yt-shelf-grid-item");
$gambar = $list->find("img");
$judul = $list->find(".yt-lockup-title a");
$time = $list->find(".video-time span");

//lakukan perulangan foreach untuk menentukan data
foreach ($list as $a => $value) {
	//mengumpulkan data menjadi array
	$data = array(
		"judul" => $judul->eq($a)->text(),
		"link" => "http://youtube.com" . $judul->eq($a)->attr("href"),
		"time" => $time->eq($a)->text(),
		"gambar" => $gambar->eq($a)->attr("src")
		);

//echo var_dump($data);
	$this->db->insert('videos',$data);
}
   //load model untuk save ke database
 		//$this->load->model("Msavedb");

 		/*$file = array(
  		"gambar"      => $this->input->get("gambar"),
		"judul"       => $this->input->get("judul"),
		"link"        => $this->input->get("link"),
		"time"        => $this->input->get("time"),
		);
*/
		/*$nilai = $this->Msavedb->msavedbf($data);

		if ($nilai) {
			$data["status"] = "Success";
			$this->load->view("vsavedb", $data);
		}else{
			$data["status"] = "Duplicate Entry!";
			$this->load->view("vsavedb", $data);
 		 }
 	}*/

 	//controller untuk
 	

  //fungsi untuk
 }

 }