<html>
<head>
	<meta http-equiv="content-language" content="en"/>
	<meta http-equiv="content-style-type" content="text/css"/>
	<meta http-equiv="content-script-type" content="text/javascript"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" type="text/css" href="public/css/layout-z.css">
	<link rel="stylesheet" type="text/css" href="public/css/jquery.ui.datepicker.css">
	<!--
	<script type="text/javascript" src="public/js/jquery-1.6.2.js"></script>

-->
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/jquery-ui.min.js"></script>
    <link href="public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<title> Online Exam </title>
	<script language="javascript">
	function loadPage( url ){
		//alert(url);
		$('.body_data').load( url );
	}
	function deleteData( url, loadBack ){
		if (confirm("Do you want to delete this??")){
			$.post(url,function(){
				$('.body_data').load( loadBack );
			})	;
		}
	}
	$(document).ready(function(){
		//$("#exam_from2").datepicker();
		loadPage('index.php?staff/index');
	});		
	</script>
	
</head>
<body>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&appId=735682916475167&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<form action="index.php?authenticate/verify" method="post">
<div class="wrapper" style="">
	<?php 
	//echo date('g:i A ',$data['data'][0]['lecture_time_from']);
	//echo 5400
	?>
	<div class="bodycontainer" style="">
		<div class="left_menu" style="width: 990px; height: auto;">
			<?php 
				echo $data['nav'];
			?>
		</div>
		<div class="contentcontainer" style="">

			<div class="right_menu" style="width: 990px; height: auto;overflow:hidden; float: left;">
				<div class="body_data" style="width: auto; height: auto; overflow: hidden; margin-top: 5px;">
						
				</div>
			</div>
		</div>
	</div>
</div>	
</form>
<div style="margin-top: 30px; text-align: center;">
    <div id="fbpage" style="color: #EE4824;">
        <div>
            <span style="font-size: 20px; font-weight: bold;"> This Project Is Open Source!</br>You can use this for any particular purpose for FREE!</br>Because human knowledge belongs to the world!</br></br>Please show your support by LIKING this <a target="_blank" href="https://www.facebook.com/reviewhype">Facebook Page.</a></span></br>
        </div>
        <div class="fb-like-box" data-href="https://www.facebook.com/reviewhype" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false" data-height="300"></div>
    </div>
</div>
</body>
</html>