<?
/**
* 프록시 동작 파일
*/
require('lib_Mproxy.php');
require('Mproxy.php');
$mp = new Mproxy();

// echo $_SERVER['HTTP_X_URL'];exit;
// print_r($_SERVER);

//-- 타임아웃 설정
if(isset($_SERVER['HTTP_X_CONN_TIMEOUT']) && is_numeric($_SERVER['HTTP_X_CONN_TIMEOUT'])){ // 요청 해더 값 체크
	$mp->conn_timeout = $_SERVER['HTTP_X_CONN_TIMEOUT'];
}else if(isset($_REQUEST['CONN_TIMEOUT']) && is_numeric($_REQUEST['CONN_TIMEOUT'])){
	$mp->conn_timeout = $_REQUEST['CONN_TIMEOUT'];
}
if(isset($_SERVER['HTTP_X_EXEC_TIMEOUT']) && is_numeric($_SERVER['HTTP_X_EXEC_TIMEOUT'])){ // 요청 해더 값 체크
	$mp->conn_timeout = $_SERVER['HTTP_X_EXEC_TIMEOUT'];
}else if(isset($_REQUEST['EXEC_TIMEOUT']) && is_numeric($_REQUEST['EXEC_TIMEOUT'])){
	$mp->exec_timeout = $_REQUEST['EXEC_TIMEOUT'];
}

$url = '';
if(isset($_SERVER['HTTP_X_URL'][0])){ // 요청 해더 값 체크
	$url = $_SERVER['HTTP_X_URL'];
}else if(isset($_GET['URL'][0])){
	$url = $_GET['URL'];
	unset($_GET['URL']);
}else if(isset($_POST['URL'][0])){
	$url = $_POST['URL'];
	unset($_POST['URL']);
}


if(!isset($url[0])){
	header("HTTP/1.0 400 Bad Request");
	print_r('url: '.$url);
	print_r($_GET);
	print_r($_POST);
	exit('ERROR:Bad Request');
}
//--- GET값이 있으면 url뒤에 붙여준다.

$qstr = http_build_query($mp->stripslashesForArray($_GET));
if(strpos($url,'?')===false){
	$url .= '?'.$qstr;
}else{
	$url .= '&'.$qstr;
}




$mp->proxy($url);
exit();
?>
