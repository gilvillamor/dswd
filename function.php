<?php

//redirect page
function redirect($url, $permanent = false) 
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url.'.php', true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

//site url
function base_url()
{   

	$base_url = (isset($_SERVER['HTTPS']) &&

	$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';


	$tmpURL = str_replace(chr(92),'/', dirname(__FILE__));

	$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'], '', $tmpURL);

	$tmpURL = ltrim($tmpURL, '/');

	$tmpURL = rtrim($tmpURL, '/');

	if (strpos($tmpURL,'/')){

	    $tmpURL = explode('/',$tmpURL);

	   $tmpURL = $tmpURL[0];

	  }

	   if ($tmpURL !== $_SERVER['HTTP_HOST'])

	      $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';

	    else

	      $base_url .= $tmpURL.'/';

		echo  $base_url; 

	}

	 function check_file_exist($file){
	 	if(file_exists($file)) {
	 		return $file;
	 	} else {
	 		return false;
	 	}
	 }


?>