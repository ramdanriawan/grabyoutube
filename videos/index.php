<?php 
require_once("../phpQuery/phpQuery/phpQuery.php");
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

	//untuk melihat data
	print "<pre>";
	print_r($data);


//jadikan data sebagai query
$data      = http_build_query($data);

 //gabungkan url save db dengan data field
 $base_url = "http://localhost/ramdan/grabyoutube";
 $data_get = "$base_url/index.php/Csavedb/csavedbf?" . $data;

$opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);

 //tampilkan data hasil dari request ajax
 echo "status: " . file_get_contents($data_get, false, $context);

echo $data_get;
 //
}
?>