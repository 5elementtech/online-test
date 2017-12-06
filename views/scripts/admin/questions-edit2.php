
<script language="javascript">
var answer = 1;
$(document).ready(function(){
	$('#save').click(function(){
		var essay_points = 0;
		if ( $('#essay_points').val() != '' ) {
			essay_points = $('#essay_points').val();
		}

		$.post('index.php?admin/questionupdate',{
			'question_name' : $('#question_name').val(), 
				'question_type' :  $('#question_type :selected').val(), 'question_id':$('#question_id').val(), 'essay_points' : essay_points
			},function(){
				loadPage('index.php?admin/questionlist&exam_id='+$('#exam_id').val());
			});

	});
	$('#question_type').change(function(){
		//alert($(this).val());
		if ( $(this).val() == 0 ){
			$('#points').css('display','none');
		}else{
			$('#points').css('display','block');
		}
	});
	$('#cancel').click(function(){
		loadPage('index.php?admin/questionlist&exam_id='+$('#exam_id').val());
	});
});
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
} 
</script>
<style>
.mcstyle{
	font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;
}
</style>
<div id="questions" class="questions" style="width: 730px; height: 675px;">
	<div id="question_dtl" class="question_dtl" style="">
	<table>
	<tr>
		<td class="mcstyle">
			Question : 
			
			<!--
			<input type="text" id="question_name" name="question_name" value="<?php //echo $data['question'][0]['question_name'];?>" class="user_input"/>
		-->
		</td>
		<td>
			<textarea id="question_name" name="question_name" rows="6" cols="38"> <?php echo $data['question'][0]['question_name'];?></textarea>
		</td>
	</tr>
	<tr>
		<td class="mcstyle"> 
			Question type : 
		</td>
		<td>
		<select id="question_type" name="question_type"> 
			<option <?php echo ($data['question'][0]['question_type'] == 0)? 'selected' : ''?> value="0"> Multiple Choice</option>
			<option <?php echo ($data['question'][0]['question_type'] == 1)? 'selected' : ''?> value="1"> Essay </option>
		</select>
		</td>
	</tr>
	<tr>
		<table id="points" style="<?php echo ( $data['question'][0]['question_type'] == 1 ? 'display:block' : 'display:none' ); ?>">
		</tr>
			<td class="mcstyle"> 
				Essay Points : 
			</td>
			<td class="mcstyle"> 
				<input type="text" id="essay_points" value="<?php echo $data['question'][0]['essay_points']; ?>" style="width: 50px; height: 25px;" onKeyPress="return isNumberKey(event);"/> 
			</td>
		</tr>
		</table>
	</tr>
	<tr>
		<td>	
			
		</td>
		<td>
			<input type="button" id="save" name="save" value="Save"/>
			<input type="button" id="cancel" name="cancel" value="Cancel"/>
		</td>
	</tr>
	</table>
	</div>
<?php

?>
<input type="hidden" id="question_id" name="question_id" value="<?php echo $data['question_id']; ?>"/>
<input type="hidden" id="exam_id" name="question_id" value="<?php echo $data['exam_id']; ?>"/>
</div>