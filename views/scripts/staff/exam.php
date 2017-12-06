<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script language="javascript">

	var total_pages, time_limit, current_time, hrs, mins, begin ;
	var next_page = 0;
	total_pages = <?php echo $data['count'][0]['count(exams.exam_id)'] - 1 ;?>;
	time_limit = <?php echo $data['count'][0]['exam_time_limit']; ?>;
	seconds = 59;
	var x=0;
	begin = 0;
	var time_consumed = 0;
	//alert(time_limit);
	$(document).ready(function(){
		//check result
		
		var myVar=setInterval(function(){
			if (time_limit > 0 || seconds > 0) {
				if (begin == 0){
					begin = 1;
					hrs = (time_limit - (time_limit % 3600)) / 3600;
					mins = (time_limit % 3600) / 60;	
				}
				time_limit --;
				seconds--;
				if (seconds == 0){
					hrs = (time_limit - (time_limit % 3600)) / 3600;
					mins = (time_limit % 3600) / 60;	
				}
				if (seconds == 0 && time_limit > 0){
					seconds = 59;
				}
				time_consumed++;
				$('#time').html('Time remaining : ' + (parseInt(hrs) > 0 ? parseInt(hrs) : '00') + ' : ' + (parseInt(mins) > 0 ? parseInt(mins) : '00') + ' : ' + (seconds > 0 ? seconds : '00'));
			}else{
				//submit data
				alert("Your time is up, all answers will be submitted!");
				x = 0;
				$("input[type='radio']:checked").each(function() {
					x = $("input[type=radio]:checked").attr('id');
				});

				var  type = $('#question_type').val();
				window.clearInterval(myVar);
				if (x == 1){
					next_page++;
					//$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer_id' : $("input[type=radio]:checked").attr('id') },function(data){
					$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer_id' : $("input[type=radio]:checked").attr('id'),'answer' : '', 'time_consumed' : time_consumed },function(data){
						//$('#exam').action="index.php?staff/thankyou";
						//$('#exam').submit();
						$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
					});
					x = 0;
				}else{
					if (type == 1){
						if ( $('#essay_id').val() != '' ) {
							next_page++;
							$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer' : $('#essay_id').val(), 'time_consumed': time_consumed },function(data){
								$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
								//$('#exam').action="index.php?staff/thankyou";
								//$('#exam').submit();
							});
							x = 0;
						}else{
							//alert('Essay answer should not be empty');
						}
					}else{
						if (total_pages != 0){
							$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer_id' : x ,'answer' : $('#essay_id').val(), 'time_consumed': time_consumed },function(data){
								$('#exam').action="index.php?";
								$('#exam').submit();
							});	
						}else{
							$.get('index.php?staff/submitresult2',{ 'exam_id' : $('#exam_id').val(),'question_id':$('#question_id2').val(), 'time_consumed' : time_consumed },function(data){
								$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
								//$('#exam').action="index.php?staff/thankyou";
								//$('#exam').submit();
							});
						}
						
					}
				}
			}
		},1000);

		$('#submit_result').click(function(){
			$(this).attr('disabled',true);
			$("input[type='radio']:checked").each(function() {
				x = 1;
			});
			var  type = $('#question_type').val();
			//type = 1 'essay'
			if (x == 1){
				next_page++;
				$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer_id' : $("input[type=radio]:checked").attr('id'),'answer' : '', 'time_consumed' : time_consumed },function(data){
					$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
				});
				x = 0;
			}else{
				if (type == 1){
					if ( $('#essay_id').val().length >= 1 ) {
						next_page++;
						$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer' : $('#essay_id').val(), 'time_consumed' : time_consumed },function(data){
							$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
						});
						x = 0;
					}else{
						alert('Essay answer should not be empty');
					}
				}else{
					if (total_pages != 0){
						alert('Please select an answer');
						//return false;		
					}else{
						$.get('index.php?staff/submitresult2',{ 'exam_id' : $('#exam_id').val(),'question_id':$('#question_id2').val(), 'answer': '', 'time_consumed' : time_consumed },function(data){
							$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
							//$('#exam').action="index.php?staff/thankyou";
							//$('#exam').submit();
						});
					}
					
				}
				
			}
			$(this).attr('disabled',false);
		});
		$('#next').click(function(){
			$(this).attr('disabled',true);
			$("input[type='radio']:checked").each(function() {
				//$("input[type=radio]:checked").attr('id');
				x = 1;
			});
			//alert($('#question_type').val());
			var  type = $('#question_type').val();
			if (x == 1){
				next_page++;
				$.get('index.php?staff/getexamnext',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer_id' : $("input[type=radio]:checked").attr('id'), 'answer' : '' },function(data){
					$('#xx').html(data);
					if (next_page >= total_pages){
						$('#next').hide();
						$('#submit_result').show();
					}
				});
				x = 0;
			}else{
				if (type == 1){
					if ( $('#essay_id').val().length >= 1 ) {
						next_page++;
						$.get('index.php?staff/getexamnext',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer' : $('#essay_id').val() },function(data){
							$('#xx').html(data);
							if (next_page >= total_pages){
								$('#next').hide();
								$('#submit_result').show();
							}
						});
						x = 0;
					}else{
						alert('Essay answer should not be empty');
						//return false;
					}
				}else{
					alert('Please select an answer');

					//return false;	
				}
			}	
			$(this).attr('disabled',false);
		});
		//myTxtArea.value.replace(/^\s*|\s*$/g,'');

		//$(this).val().replace(/ /g, "<br/>");
		//$('#essay_id').val().replace(/^\s*|\s*$/g,'');
		$('#essay_id').val($.trim($('#essay_id').val()));
	});

	</script>
    <style>

.mcstyle{
		font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.9em; color: #535353!important;
}
</style>
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
	<form name="exam" id="exam" action="index.php?staff/thankyou">
	<div style="margin-top: 20px; width: 990px; margin: 0 auto; " id="thankyou" class="mcstyle">
		<div id="time" style="font-size: 18px;font-weight: bold;" class="mcstyle">

		</div>
		<div id="xx" style="width: 100%; margin-top: 5px;" class="mcstyle">
			<?php
			if (is_array($data['exam'])){
			?>
				<div>
					<?php
						echo $data['exam'][0]['question_name'] ;
					?>
				</div>
				<div>
					<?php 
			//	if(is_array($data['exam'][0]['question_type'])){
					if ($data['exam'][0]['question_type'] == 0){
					?>

						   <ol type="A">
							<?php
								foreach($data[$data['exam'][0]['question_id']] as $row){
								?>
									<li>
										<input name="grpname" id="<?php echo $row['answer_id'];?>" value="<?php echo $row['answer_name'];?>" type='radio'/><?php echo $row['answer_name'];?>
									</li>
								<?php
								}
								?>
							</ol>
				<?php
					}else{
				?>
						<div>
							<textarea id="essay_id"  cols="60" rows="6"></textarea>
						</div>
				<?php

					}
				//}
				?>
				</div>
				
			<?php
			}else{
				header("Location:" . BASE_URL);
			}
			?>
			<input type="hidden" id="question_id" value="<?php echo $data['exam'][0]['question_id'];?>">
		</div>
		<div>
			<input type="button" id="next" value="Next Question"/>
			<input type="button" id="submit_result" value="Submit Result" style="display:none;"/>
		<div>
			<input type="hidden" id="exam_id" value="<?php echo $data['exam_id'];?>">
			<input type="hidden" id="question_type" value="<?php echo $data['exam'][0]['question_type'] ;?>">
	</div>
	</form>
	<div style="margin-top: 30px; text-align: center;">
    	<div id="fbpage" style="color: #EE4824;">
        <div>
            <span style="font-size: 20px; font-weight: bold;"> This Project Is Open Source!</br>You can use this for any particular purpose for FREE!</br>Because human knowledge belongs to the world!</br></br>Please show your support by LIKING this Facebook Page.</span></br>
        </div>
        <div class="fb-like-box" data-href="https://www.facebook.com/reviewhype" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false" data-height="300"></div>
	    </div>
	</div>
</body>

</html>