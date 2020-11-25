<?
$url1 = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['REQUEST_URI']).'/test/target.php';
$url2 = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['REQUEST_URI']).'/test/targetXml.php';
?>

<!doctype html>
<html lang="ko" >
<head>
	<title>프록시 테스트</title>
	<meta charset="utf-8">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="http://www.mins01.com/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<script src="/js/ForGoogle.js"></script>
	<!-- google analytics -->
	<script>ForGoogle.analytics()</script>


	<!-- jquery 관련 -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>


	<!-- 부트스트랩 4 : IE8지원안됨! -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<!-- vue.js -->
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>

	<!-- meta og -->

	<meta property="og:title" content="프록시.php 테스트">
	<meta property="og:description" content="프록시.php 테스트">
	<meta name="og:image" content="http://www.mins01.com/img/logo.gif">
	<meta property="og:image:width" content="190">
	<meta property="og:image:height" content="70" />
	<meta property="og:site_name" content="프록시.php 테스트" />
	<meta property="og:type" content="website">

	<!-- //meta og -->

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
	<div class="container">
		<h1>프록시 테스트</h1>
		<form action="../src/proxy.php" method="get" target="ifm0" onsubmit="onsubmitEvent(this)">
			<h2>GET 전송</h2>
			<!-- <input class="form-control m-1" type="text" name="URL" value="<?=htmlspecialchars($url)?>"> -->

			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">URL</span>
				</div>
				<select class="form-control" name="URL">
					<option value="<?=htmlspecialchars($url1)?>"><?=htmlspecialchars($url1)?></option>
					<option value="<?=htmlspecialchars($url2)?>"><?=htmlspecialchars($url2)?></option>
					<option value="https://www.naver.com/"><?=htmlspecialchars('https://www.naver.com/')?></option>
					<option value="https://www.google.co.kr/"><?=htmlspecialchars('https://www.google.co.kr/')?></option>
				</select>
			</div>
			<div class="form-inline">
				<input class="form-control m-1" type="text" name="val01" value="값01">
				<input class="form-control m-1" type="text" name="val02" value="값02">
				<input class="form-control m-1" type="text" name="val03" value="값03">
			</div>
			<div class="form-inline">
				CONN_TIMEOUT(기본 5초,0이면 무제한)<input class="form-control m-1" type="text" size="4" name="CONN_TIMEOUT" value="">
				EXEC_TIMEOUT(기본 5초,0이면 무제한)<input class="form-control m-1" type="text" size="4" name="EXEC_TIMEOUT" value="">
				<button class="btn btn-info">전송</button>
			</div>
		</form>
		<hr>
		<form action="../src/proxy.php" method="post" target="ifm0" onsubmit="onsubmitEvent(this)">
			<h2>POST 전송</h2>
			<!-- <input class="form-control m-1" type="text" name="URL" value="<?=htmlspecialchars($url)?>"> -->

			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">URL</span>
				</div>
				<select class="form-control" name="URL">
					<option value="<?=htmlspecialchars($url1)?>"><?=htmlspecialchars($url1)?></option>
					<option value="<?=htmlspecialchars($url2)?>"><?=htmlspecialchars($url2)?></option>
					<option value="https://www.naver.com/"><?=htmlspecialchars('https://www.naver.com/')?></option>
					<option value="https://www.google.co.kr/"><?=htmlspecialchars('https://www.google.co.kr/')?></option>
				</select>
			</div>
			<div class="form-inline">
				<input class="form-control m-1" type="text" name="val01" value="값01">
				<input class="form-control m-1" type="text" name="val02" value="값02">
				<input class="form-control m-1" type="text" name="val03" value="값03">
			</div>
			<div class="form-inline">
				CONN_TIMEOUT(기본 5초,0이면 무제한)<input class="form-control m-1" type="text" size="4" name="CONN_TIMEOUT" value="">
				EXEC_TIMEOUT(기본 5초,0이면 무제한)<input class="form-control m-1" type="text" size="4" name="EXEC_TIMEOUT" value="">
				<button class="btn btn-info">전송</button>
			</div>
		</form>
		<hr>
		<script>
		function callAjax(f){
			let method = f.method
			let url = f.action;
			let X_Url = f.URL.value;
			let X_Conn_Timeout = f.CONN_TIMEOUT.value;
			let X_Exec_Timeout = f.EXEC_TIMEOUT.value;
			let val01 = f.val01.value;
			let val02 = f.val02.value;
			let val03 = f.val03.value;
			let post_data = {}
			post_data['val01']=val01;
			post_data['val02']=val02;
			post_data['val03']=val03;

			if(method=='post'){

			}else{
				X_Url +='?'+$.param(post_data)
				post_data = null;
			}
			let headers = {
				"X-Url":X_Url, //대상 URL
				"X-Conn-Timeout":X_Conn_Timeout, //커넥션 타임아웃
				"X-Exec-Timeout":X_Exec_Timeout, //실행 타임아웃
			};
			$.ajax({
				url: url,
				type: method,
				dataType: 'html', //xml, json, script, jsonp, or html
				data: post_data,
				headers: headers,
			})
			.done(function(rData) { //통신 성공 시 호출
				console.log("success");
				// console.log(rData)
				let x = document.ifm0
				x.document.write(rData)

			})
			.fail(function() { //통신 실패 시 호출
				console.log("error");
			})
			.always(function() { //성공/실패 후 호출.
				console.log("complete");
			});
		}
		</script>
		<form action="../src/proxy.php" method="get" target="ifm0" onsubmit="callAjax(this); return false;">
			<h2>AJAX GET 전송 (ajax request header 에 필요값 추가)</h2>

			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">URL</span>
				</div>
				<select class="form-control" name="URL">
					<option value="<?=htmlspecialchars($url1)?>"><?=htmlspecialchars($url1)?></option>
					<option value="<?=htmlspecialchars($url2)?>"><?=htmlspecialchars($url2)?></option>
					<option value="https://www.naver.com/"><?=htmlspecialchars('https://www.naver.com/')?></option>
					<option value="https://www.google.co.kr/"><?=htmlspecialchars('https://www.google.co.kr/')?></option>
				</select>
			</div>
			<div class="form-inline">

				<input class="form-control m-1" type="text" name="val01" value="값01">
				<input class="form-control m-1" type="text" name="val02" value="값02">
				<input class="form-control m-1" type="text" name="val03" value="값03">
			</div>
			<div class="form-inline">
				CONN_TIMEOUT(기본 5초,0이면 무제한)<input class="form-control m-1" type="text" size="4" name="CONN_TIMEOUT" value="">
				EXEC_TIMEOUT(기본 5초,0이면 무제한)<input class="form-control m-1" type="text" size="4" name="EXEC_TIMEOUT" value="">
				<button class="btn btn-info">전송</button>
			</div>
		</form>
		<hr>
		<form action="../src/proxy.php" method="post" target="ifm0" onsubmit="callAjax(this); return false;">
			<h2>AJAX POST 전송 (ajax request header 에 필요값 추가)</h2>

			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">URL</span>
				</div>
				<select class="form-control" name="URL">
					<option value="<?=htmlspecialchars($url1)?>"><?=htmlspecialchars($url1)?></option>
					<option value="<?=htmlspecialchars($url2)?>"><?=htmlspecialchars($url2)?></option>
					<option value="https://www.naver.com/"><?=htmlspecialchars('https://www.naver.com/')?></option>
					<option value="https://www.google.co.kr/"><?=htmlspecialchars('https://www.google.co.kr/')?></option>
				</select>
			</div>
			<div class="form-inline">
				<input class="form-control m-1" type="text" name="val01" value="값01">
				<input class="form-control m-1" type="text" name="val02" value="값02">
				<input class="form-control m-1" type="text" name="val03" value="값03">
			</div>
			<div class="form-inline">
				CONN_TIMEOUT(기본 5초,0이면 무제한)<input class="form-control m-1" type="text" size="4" name="CONN_TIMEOUT" value="">
				EXEC_TIMEOUT(기본 5초,0이면 무제한)<input class="form-control m-1" type="text" size="4" name="EXEC_TIMEOUT" value="">
				<button class="btn btn-info">전송</button>
			</div>
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
	</div>
</body>
</html>
