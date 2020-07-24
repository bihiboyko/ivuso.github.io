<?php 
define('BASE_URL','http://localhost/etenis'); //tu si ja nadefinujem cestu po adresar
function segmenty(){
	
	$current_url= 'http://'.(isset($_SERVER['HTTPS']) AND $_SERVER['HTTPS'] == 'on' ? 's://' : '://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];//eviduje sucasnu url adresu co mam v prehliadaci

	$path=(str_replace(BASE_URL, '', $current_url)); //porovnaj tieto dve premenne a daj iba v com sa odlisuju..tak dostanem segmenty

    $path=trim(str_replace(BASE_URL, '', $current_url), '/'); //vsetky lomitka v tej premenej odstran

	//return $current_url;
	//$path=trim(parse_url($path, PHP_URL_PATH), '/');
	
	$segments=explode('/', $path); // od lomitka z tych segmentov spravi pole
    
    return $segments;


}

function segment($index){
	$segments=segmenty();
	return isset($segments[$index-1]) ? $segments[$index-1] : false;
}




 ?>