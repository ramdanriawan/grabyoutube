<?php 
//require library phpQuery
require_once("../phpQuery/phpQuery/phpQuery.php");
$url = "https://www.youtube.com/channel/UCpSPS5yLCxYRuZSrCx-eBjA/playlists";
$get = file_get_contents($url);

//data playlist
$dom = phpQuery::newDocument($get);
$list = pq("ul#channels-browse-content-grid li.channels-content-item.yt-shelf-grid-item");
$gambar = $list->find("img");
$link = $list->find("a.yt-uix-sessionlink.yt-uix-tile-link.spf-link.yt-ui-ellipsis.yt-ui-ellipsis-2");
$total_videos = $list->find("span.formatted-video-count-label b");

//lakukan perulangan foreach untuk mengumpulkan semua data
foreach ($list as $a => $value) {
	//data utama berita disini
	$data = array(
		"gambar" => $gambar->eq($a)->attr("src"),
		"link" => "http://youtube.com" . $link->eq($a)->attr("href"),
		"judul" => $link->eq($a)->text(),
		"total_videos" => $total_videos->eq($a)->text(),
		);

	//untuk melihat hasil
	print "<pre>";
	print_r($data);
}
 ?>