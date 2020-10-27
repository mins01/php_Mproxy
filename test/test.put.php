<?
// header("Content-type: text/plain");

$url = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['REQUEST_URI']).'/target.php';
require('../src/Mproxy.php');

$mproxy = new Mproxy();

$url = 'http://'.$_SERVER['HTTP_HOST'].str_replace('test.put.php','test.target.php',$_SERVER['REQUEST_URI']);
$postRaw=null;
$postRaw='하하';
$cookieRaw=null;
$headers=array();
$opts = array();

// $opts[CURLOPT_PUT]=true;

echo $url;
echo "<hr>";
echo '<h2>$mproxy->getContent()</h2>',"\n";
$res = $mproxy->getContent($url,$postRaw,$cookieRaw,$headers, $opts);
echo '<xmp>';
print_r($res);
echo '</xmp>';
echo "<hr>";
echo '<h2>$mproxy->get()</h2>',"\n";
$res = $mproxy->get($url,$cookieRaw,$headers, $opts);
echo '<xmp>';
print_r($res);
echo '</xmp>';
echo "<hr>";
echo '<h2>$mproxy->post()</h2>',"\n";
$res = $mproxy->post($url,$postRaw,$cookieRaw,$headers, $opts);
echo '<xmp>';
print_r($res);
echo '</xmp>';
echo "<hr>";
echo '<h2>$mproxy->put()</h2>',"\n";
$res = $mproxy->put($url,$postRaw,$cookieRaw,$headers, $opts);
echo '<xmp>';
print_r($res);
echo '</xmp>';
echo "<hr>";


?>
