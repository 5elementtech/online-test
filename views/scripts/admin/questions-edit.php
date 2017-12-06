<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script language="javascript">
var answer = 1;
$(document).ready(function(){

	$('#exam_questions').load('index.php?admin/questionlist&exam_id=' + $('#exam_id').val());
	answer = $('#count').val();
	$('#remove').click(function(){
		$(".pos_check:checked").live().each(function() {
			id = $(this).attr('id');
			$('#pos'+id).remove();
		});
	});
	$('#add').click(function(){
		if ($('#txt_answer').val() != '') {																					
			$('.answer').append("<div class='pos_answer' id=pos"+ answer +">" + $('#txt_answer').val() + "<input class='pos_check' id="+ answer+ " type='checkbox'>" + "<input type='hidden' class='hid_txt' id=hid" + answer+ " value=" + $('#txt_answer').val() + "></div>");
			answer++;
			$('#txt_answer').val('');
		}else{
			alert("input answer");
			return false;
		}
	});
	$('#save').click(function(){
		var cnt = 0;
		var data_='';
		var id;

		$(".pos_check:checked").live().each(function() {

			cnt+=1;
		});

		if (cnt >1 ){
			alert('check only one');
			return false;
		}
		if (cnt == 0){
			alert('check one');
			return false;
		}
		$(".pos_check").live().each(function() {
			id = $(this).attr('id');
			var ck='';
			//if ($('#isAgeSelected').is(':checked')) {
			if ($(this).is(':checked')){
				ck='@';
			}
			if (data_.length == 0){
				//if ($('#isAgeSelected').is(':checked')) {

				data_ = "hid" + id  +  ':' + $('#hid'+id).live().val()+ck;
			}else{
				data_ += ",hid" + id + ':' + $('#hid'+id).live().val()+ck ;
			}
		});
		//loadPage('index.php?admin/questions&exam_id='+ $(this).attr('id'));
		$.post('index.php?admin/questionexamsnew&data_=' + data_  +'&exam_id='+ $('#exam_id').val(), {'exam_id':$('#exam_id').val(), 'question': $('#question').val(), 'question_type' : $('input[name=question_type]:checked').val() },function(){
			$('#exam_questions').load('index.php?admin/questionlist&exam_id=' + $('#exam_id').val());
		});
	});
	$('#exam_from').live().datepicker({dateFormat: 'yy-mm-dd'});
    $('#exam_to').live().datepicker({dateFormat: 'yy-mm-dd'});
});
</script>

<div id="questions" class="questions" style="width: 730px; height: 675px;">
	<div id="question_dtl" class="question_dtl" style="">
	<table>
	<tr>
		<td width="120" class="mcstyle"> Question Type : </td>
		<td width="130" class="mcstyle"> <input type="radio" id="0" id="question_type" name="question_type" <?php  ?> value="0">Multiple Choice</td>
		<td width="80" class="mcstyle"> <input type="radio" id="1" id="question_type" name="question_type" <?php ?> value="1">Essay</td>
	</tr>
	</table>
		<div style="width: 340px; height:170px; border: 1px solid;float:left;">
		<table>
		<tr>
			<td class="mcstyle"> Question : </td>
		</tr>
		<tr>
			<td><textarea id="question" name="question" rows="6" cols="38"><?php echo $data[0]['question_name'];?> </textarea> </td>
		</tr>
		<tr>
			<td> 
				<input type="button" id="cancel" value="Cancel">
				<input type="button" id="save" value="Save">
			</td>
		</tr>
		</table>
		</div>
		<div style="width: 360px; height:170px; border: 1px solid;float:left;">
		<table>
		<tr>
			<td class="mcstyle"> 
				Answers : <input type="text" id="txt_answer" style="width: 240px; height: 25px;"/>
				<input type="button" id="add" value="Add" style="width: 40px; height: 25px;">
			</td>
		</tr>
		<tr>
			<td> 
				<div class="answer" style="width: 340px; height: 100px; border: 1px solid;">
				<?php
				if (is_array($data)){
					$answer = 1;
					foreach($data as $row){
				?>
					<div class="pos_answer" id="pos <?php echo $answer;?>">
						<?php echo $row['answer_name'];?>
						<input type="checkbox" class="pos_check" <?php ($row['answer_flag'] == 1 ? 'checked' : '')?>id="<?php echo $answer;?>">
						<input type='hidden' class='hid_txt' id='hid<?php echo $answer;?>' value="<?php echo $row['answer_name']; ?>">
					</div>
				<?php
					$answer++;
					}
				}
				?>
				<input type='hidden' id='count' value='<?php echo $answer - 1;?>'>
				</div>
			</td>
		</tr>
		<tr>
			<td> <input type="button" id="remove" value="Remove"/></td>
		</tr>
		</table>
		</div>
	</div>
	<div id="exam_questions">

	</div>
<input type="hidden" id="exam_id" name="exam_id" value="<?php echo $data; ?>"/>
</div>