<?
$url1 = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['REQUEST_URI']).'/test/target.php';
$url2 = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['REQUEST_URI']).'/test/targetXml.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>프록시.php 테스트</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script>
	var TM = 0;
	function startTM(){
		TM = (new Date()).getTime();
	}
	function endTM(){
		if(TM == 0){return false;}
		var TM2 = (new Date()).getTime() - TM;
		TM = 0;
		document.getElementById('times').value = TM2+' msec \n'+document.getElementById('times').value;;
	}
	function onsubmitEvent(f){
		startTM();
	}
	</script>
</head>
<body>
	<form action="../src/proxy.php" method="get" target="ifm0" onsubmit="onsubmitEvent(this)">
		<!-- <input type="text" name="URL" value="<?=htmlspecialchars($url)?>"> -->
		<select  name="URL">
			<option value="<?=htmlspecialchars($url1)?>"><?=htmlspecialchars($url1)?></option>
			<option value="<?=htmlspecialchars($url2)?>"><?=htmlspecialchars($url2)?></option>
		</select>
		<input type="text" name="val01" value="값01">
		<input type="text" name="val02" value="값02">
		<input type="text" name="val03" value="값03">
		<hr>
		CONN_TIMEOUT(기본 5초,0이면 무제한)<input type="text" size="4" name="CONN_TIMEOUT" value="">
		EXEC_TIMEOUT(기본 5초,0이면 무제한)<input type="text" size="4" name="EXEC_TIMEOUT" value="">

		<input type="submit" value="get전송">
	</form>
	<hr>
	<form action="../src/proxy.php" method="post" target="ifm0" onsubmit="onsubmitEvent(this)">
		<!-- <input type="text" name="URL" value="<?=htmlspecialchars($url)?>"> -->
		<select  name="URL">
			<option value="<?=htmlspecialchars($url1)?>"><?=htmlspecialchars($url1)?></option>
			<option value="<?=htmlspecialchars($url2)?>"><?=htmlspecialchars($url2)?></option>
		</select>
		<input type="text" name="val01" value="값01">
		<input type="text" name="val02" value="값02">
		<input type="text" name="val03" value="값03">
		<hr>
		CONN_TIMEOUT(기본 5초,0이면 무제한)<input type="text" size="4" name="CONN_TIMEOUT" value="">
		EXEC_TIMEOUT(기본 5초,0이면 무제한)<input type="text" size="4" name="EXEC_TIMEOUT" value="">
		<input type="submit" value="post전송">
	</form>
	<hr>
	<div>
		<div style="float:left;width:600px;">
			<div style="padding:5px">
				<iframe onload="endTM()" name="ifm0" src="about:blank" height="400;" style="width:100%;display:block;margin:0; border-width:1px"></iframe>
			</div>
		</div>
		<div style="float:left;width:100px;">
			<div style="padding:5px">
				<textarea id="times" style="width:100%;display:block;margin:0; border-size;0; height:400px;"></textarea>
			</div>
		</div>
		<div style="clear:both"></div>
	</div>
	<hr>
	<ul>
		<li><a href="test.put.php">test.put.php</a>(get, post, put 동작 테스트용)</li>
		<li><a href="test.custom_headers.php">test.custom_headers.php</a> (req headers 테스트용)</li>
		<li><a href="testLoad.php">testLoad.php</a></li>
		<li><a href="targetXml.php">targetXml.php</a></li>
	</ul>
</body>
</html>
