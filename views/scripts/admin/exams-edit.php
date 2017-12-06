

<script language="javascript">

$(document).ready(function(){
	$("#exam_from").datepicker({dateFormat: 'yy-mm-dd'});
	$("#exam_to").datepicker({dateFormat: 'yy-mm-dd'});
	$('#cancel').click(function(){
		loadPage('index.php?admin/questionlist&exam_id='+ $('#exam_id').val());
	})
	$('#save').click(function(){
		var error ="Please fill up the requirement below \r\n----------------------------------------\r\n";
		var msg = error;
		if( $('#exam_name').val() == '' ){
			msg += '* Exam Name \r\n';
		}
		if( $('#exam_from').val() == '' ){
			msg += '* Date From \r\n';
		}
		if( $('#exam_to').val() == '' ){
			msg += '* Date To \r\n';
		}
		if( $('#dept_id').val() == '' ){
			msg += '* Department Name \r\n';
		}
		if( $('#passing_score').val() == '' ){
			msg += '* Passing score  \r\n';
		}
		if( $('#hrs').val() == '' ){
			msg += '* Hours  \r\n';
		}
		if( $('#mins').val() == '' ){
			msg += '* Mins  \r\n';
		}
		if (msg == error){
			$.post('index.php?admin/saveexamsupdate',$("#exams_add, :hidden").serialize(),function(data){
				//$('#exams').load('index.php?admin/questionlist&exam_id='+ $('#exam_id').val());
				loadPage('index.php?admin/questionlist&exam_id='+ $('#exam_id').val());
			});	
			
		}else{
			alert(msg);	
		}
	});

});
function isNumberKey(evt){
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

<div id="exams" class="exams" style="width: 100%; height: auto;">
	<div class="exams_add_data">
	<form name="exams_add" id="exams_add">
	<table width="30%%">
	<tr>
		<td class="mcstyle"> Exam Name :</td>
		<td class="mcstyle"><input type="text" id="exam_name" name="exam_name" class="user_input" value="<?php echo $data[0]['exam_name'];?>"></td>
	</tr>
	<tr>
		<td class="mcstyle">From : </td>
		<td class="mcstyle"><input maxlength="10" id="exam_from" name="exam_from" class="user_input" type="text" value="<?php echo $data[0]['exam_from'];?>"></td>
	</tr>
	<tr>
		<td class="mcstyle"> To:</td>
		<td class="mcstyle"> <input maxlength="10" id="exam_to" name="exam_to" class="user_input" type="text" value="<?php echo $data[0]['exam_to'];?>"></td>
	</tr>
	<tr>
		<td class="mcstyle">Department : </td>
		<td>
			<select id="dept_id" name="dept_id">
				<option value=""> </option>
				<?php
				if (is_array($data['department'])){
					foreach($data['department'] as $row){
				?>
				<option <?php echo ($data[0]['department_id'] == $row['department_id'] ? 'selected' : ''); ?> value="<?php echo $row['department_id']; ?>"> <?php echo $row['department_name'];?> </option>
				<?php
						}
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td class="mcstyle"> Total Points :</td>
		<td class="mcstyle"><input type="text" id="total_points" name="total_points" class="user_input" onkeypress="return isNumberKey(event)" value="<?php echo $data[0]['passing_score'];?>"></td>
	</tr>
	<tr>
		<td class="mcstyle"> Passing Grade :</td>
		<td class="mcstyle"><input type="text" id="passing_grade" name="passing_grade" class="user_input" onkeypress="return isNumberKey(event)" value="<?php echo $data[0]['passing_grade'];?>"></td>
	</tr>
	<tr>
		<td class="mcstyle"> Time Limit :</td>
		<td class="mcstyle">
			Hrs : <input type='text' id='hrs' name='hrs' style="width:20px;" onkeypress="return isNumberKey(event)" value="<?php echo ($data[0]['exam_time_limit'] > 3600 ? (($data[0]['exam_time_limit'] - $data[0]['exam_time_limit'] % 3600) / 3600) : '00' );?>">
			Mins : <input type='text' id='mins' name='mins'  style="width:20px;"  onkeypress="return isNumberKey(event)" value="<?php echo intval(($data[0]['exam_time_limit'] % 3600) / 60);?>">

		</td>
	</tr>
	<tr>
		<td> 
			<input type="button" id="save" class="e_button" value="Save">
		</td>
		<td>
			<input type="button" id="cancel" class="e_button" value="Cancel">
		</td>
	</tr>

	</table>
	<input type="hidden" name="exam_id" id="exam_id" value="<?php echo $data[0]['exam_id'];?>"/>
	</form>
	</div>
</div>
