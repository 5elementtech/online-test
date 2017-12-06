<script language="javascript">
$(document).ready(function(){
	$('#cancel').click(function(){
		loadPage('index.php?admin/questionlist&exam_id='+ $('#exam_id').val());
	});
	$('#save').click(function(){
		var flag = 0;
		if ($('#right_answer').attr('checked')){
			flag = 1;
		}

		$.post('index.php?admin/answeraddinsert',{'answer_name': $('#answer_name').val(), 'flag':flag, 'question_id' : $('#question_id').val()}, function(){
			loadPage('index.php?admin/questionlist&exam_id='+ $('#exam_id').val());
		});
		
	
	});
});
</script>
<style>
.mcstyle{
	font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;
}
</style>
<div style="width: 730px; height: 675px;">
<table>
<tr>
	<td class="mcstyle"> Answer : </td>
	<td class="mcstyle"> 
		<input type="text" id="answer_name" class="user_input"/> 
		<input type="checkbox" id="right_answer"/> Correct Answer
	</td>
</tr>
<tr>
	<td> <input type='button' id="save" name="save" value="Save"/></td>
	<td> <input type='button' id="cancel" name="cancel" value="Cancel"/></td>
</tr> 
<input type="hidden" id="question_id" value="<?php echo $data['question_id'];?>">
<input type="hidden" id="exam_id" value="<?php echo $data['exam_id'];?>">
</table>
</div>