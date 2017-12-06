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

		$.post('index.php?admin/answerupdate',{'answer_id' : $('#answer_id').val(), 'answer_name': $('#answer_name').val(), 'flag':flag, 'question_id' : $('#question_id').val()}, function(){
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
		<input type="text" id="answer_name" class="user_input" value="<?php echo $data[0]['answer_name'];?>"/> 
		<input type="checkbox" <?php echo ($data[0]['answer_flag']) == 1 ? 'checked' :''; ?> id="right_answer"/> Correct Answer
	</td>
</tr>
<tr>
	<td> <input type='button' id="save" name="save" value="Save"/></td>
	<td> <input type='button' id="cancel" name="cancel" value="Cancel"/></td>
</tr>
<input type="hidden" id="exam_id" value="<?php print_r($data['exam']);//echo $data['exam'][0];?>"> 
<input type="hidden" id="answer_id" value="<?php echo $data['answer_id'] ;?>"> 
<input type="hidden" id="question_id" value="<?php echo $data['question_id'];?>">
</table>
</div>