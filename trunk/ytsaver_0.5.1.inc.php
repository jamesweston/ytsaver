<?php
/************************************************************************************

	Script Name			: YTsaver 0.5.1
	Function			: To download FLV files located at Youtube.com
	Coded By    		: James Weston (support@meamod.com, http://meamod.com)
	Original Creator	: Yeni Setiawan (yeni.setiawan@yahoo.com, http://sandalian.com)
	Created date		: April 5, 2007 (0.1)	- read HTML and parse the string
			  			  March 3, 2008 (0.3)	- shot the SWF and read the header
			  			  April 15, 2008 (0.4)	- shot the SWF and read the header and let the T string remain
			  			  April 16, 2008 (0.5) 	- provided download for YouTube videos via HTTP GET or Form Submit
			  			  April 16, 2008 (0.5.1)- fixed spelling error
			  			  			  
	Requirement	: PHP with CURL

	Note:
	This is a basic functions used to download FLV files at youtube.com so we can play it offline. 

	Disclaimer:
	You use it at your own risk. You can ask me question about this script but you shouldn't  
	ask me about any damaged computer caused by this script.
	
	Demo:
	http://anomisurf.com/ytsaver/
	
	Sample Usage:
	<form method="get" action="ytsaver.inc.php">
	<input type="text" name="youtube" style="width: 323px" />
	<input type="submit" value="Download Video" />
	</form>


************************************************************************************/

// ------------------------------------ START SCRIPT --------------------------//
ini_set('user_agent','Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; AnomiSurf)');

if($_GET['youtube']) {
$download = download_youtube($_GET['youtube']);
header("Location: $download");
} else {
echo ('Error');
}

function get_http_header($url){
	$uh = curl_init();
	curl_setopt($uh, CURLOPT_URL, $url);
	curl_setopt($uh, CURLOPT_HEADER, 1);
	curl_setopt($uh, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec($uh);
	curl_close($uh);
	return $res;
}

function show_url($http_header){
	$arai = explode("\n",$http_header);
	foreach($arai as $ini){
		if(eregi("location",$ini)) $url = $ini;
	}
	list($sampah,$hasil) = explode("Location:",$url);
	return str_replace("\n","",trim($hasil));
}

function download_youtube($url){
	if(ereg('&',$url)){
		if (eregi("watch\?v=(.*)&", $url, $out)) {  
			$video_id = $out[1];
		}  
	}
	else{
		list($none,$video_id) = explode('watch?v=',$url);
	}
	$header = get_http_header('http://youtube.com/v/'.trim($video_id));
	$secret_link = show_url($header);
	list($none,$dl_url) = explode("/swf/l.swf?",$secret_link);
	$video_url = 'http://youtube.com/get_video?'.$dl_url;
	return $video_url;
}
// ------------------------------------ END SCRIPT --------------------------//
?> 