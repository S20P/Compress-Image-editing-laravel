<?php

/*
* @Author: Satish parmar
* @ purpose: Image size compress in php
* @params:
* source_url,
* destination_url,
* quality,
*/


if (! function_exists('compress_image')) {

      function compress_image($source_url, $destination_url, $quality) {
		$info = getimagesize($source_url);
    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);
    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);
   	    	elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);
    		imagejpeg($image, $destination_url, $quality);
		return $destination_url;
	}

}

//@Author: Satish parmar end Code

?>