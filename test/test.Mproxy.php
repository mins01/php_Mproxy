<?
error_reporting(E_ALL);
// require('../src/lib_Mproxy.php');
require('../src/Mproxy.php');
$mp = new Mproxy();

$opts = array();
$opts[CURLOPT_SSL_VERIFYPEER]=false;
$opts[CURLOPT_SSL_VERIFYHOST]=false;

$url = 'https://naver.com/';
$url = 'https://www.google.co.kr/';
$url = 'https://www.google.co.kr/';
// $res = $mp->get($url,null,array(),$opts);
// print_r($res);


$mp->proxy($url);
