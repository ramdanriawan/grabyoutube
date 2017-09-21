<?php

 class Csavedb extends CI_Controller
 {

 	//fungsi untuk save ke database
 	function csavedbf()
 	{
    //===============================================//
    if($this->input->get("media") == "v"){
      $table = "videos";

      //list data yang akan disimpan ke database
      $file = array(
        "chanel"      => $this->input->get("chanel"),
        "gambar"      => $this->input->get("gambar"),
        "judul"       => $this->input->get("judul"),
        "link"        => $this->input->get("link"),
        "time"        => $this->input->get("time")
      );
    } else if($this->input->get("media") == "p"){
      $table = "playlists";

      //list data yang akan disimpan ke database
      $file = array(
        "chanel"       => $this->input->get("chanel"),
        "gambar"       => $this->input->get("gambar"),
        "judul"        => $this->input->get("judul"),
        "link"         => $this->input->get("link"),
        "total_videos" => $this->input->get("total_videos")
      );
    } else if($this->input->get("media") == "c"){
      $table = "chanel";

      //list data yang akan disimpan ke database
      $file = array(
        "link" => $this->input->get("link"),
        "logo" => $this->input->get("logo"),
        "name"=>$this->input->get("name"),
        "subscriber"=>$this->input->get("subscriber"),
        "videos"=>$this->input->get("videos"),
        "playlists"=>$this->input->get("playlists")
      );
    }
    //===============================================//

    // load model untuk save ke database
    $this->load->model("Msavedb");

    //simpan boolean ke variable $nilai
    $nilai = $this->Msavedb->msavedbf($file, $table);

    //=================================================//
    if ($nilai) {
      $data["status"] = "Success";
      $this->load->view("vsavedb", $data);
    }else{
      $data["status"] = "Duplicate Entry!";
      $this->load->view("vsavedb", $data);
    }
    //=================================================//
  }

  //fungsi untuk
 }
