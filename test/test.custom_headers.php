<?

// header("Content-type: text/plain");

$url = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['REQUEST_URI']).'/target.php';
require('../src/Mproxy.php');

$mproxy = new Mproxy();

// $url = 'http://'.$_SERVER['HTTP_HOST'].str_replace('test.put.php','test.target.php',$_SERVER['REQUEST_URI']);
$postRaw=null;
$postRaw='하하';
$cookieRaw=null;
$opts = array();

// $opts[CURLOPT_PUT]=true;

echo $url;

$headers=array(
	'Aaa: aaaaaa',
	'Bbb: bbbbbb',
);
$res = $mproxy->getContent($url,$postRaw,$cookieRaw,$headers, $opts);
print_r($res);
echo '<hr>';
$headers=array(
	'Aaa'=>'aaaaaa',
	'Bbb'=>'bbbbbb',
);
$res = $mproxy->getContent($url,$postRaw,$cookieRaw,$headers, $opts);
print_r($res);

?>
