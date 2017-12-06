

<script language="javascript">

$(document).ready(function(){
	$("#exam_from").datepicker({dateFormat: 'yy-mm-dd'});
	$("#exam_to").datepicker({dateFormat: 'yy-mm-dd'});
	$('#cancel').click(function(){
		$('#exams').load('index.php?admin/exams');
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
			$.post('index.php?admin/saveexamsnew',$("#exams_add").serialize(),function(data){
				$('#exams').load('index.php?admin/exams');
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
		<td><input type="text" id="exam_name" name="exam_name" class="user_input"></td>
	</tr>
	<tr>
		<td class="mcstyle">From : </td>
		<td><input maxlength="10" id="exam_from" name="exam_from" class="user_input" type="text"></td>
	</tr>
	<tr>
		<td class="mcstyle"> To:</td>
		<td> <input maxlength="10" id="exam_to" name="exam_to" class="user_input" type="text"></td>
	</tr>
	<tr>
		<td class="mcstyle">Department Name : </td>
		<td>
			<select id="dept_id" name="dept_id">
				<option value=""> </option>
				<?php
				if (is_array($data['department'])){
					foreach($data['department'] as $row){
				?>
				<option value="<?php echo $row['department_id']; ?>"> <?php echo $row['department_name'];?> </option>
				<?php
						}
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td class="mcstyle"> Total Points :</td>
		<td class="mcstyle"><input type="text" id="total_points" name="total_points" class="user_input" onkeypress="return isNumberKey(event)" value=""></td>
	</tr>
	<tr>
		<td class="mcstyle"> Passing Grade :</td>
		<td class="mcstyle"><input type="text" id="passing_grade" name="passing_grade" class="user_input" onkeypress="return isNumberKey(event)" value=""></td>
	</tr>
	<tr>
		<td class="mcstyle"> Time Limit :</td>
		<td class="mcstyle">
			Hrs : <input type='text' id='hrs' name='hrs' value="" style="width:20px;" onkeypress="return isNumberKey(event)">
			Mins : <input type='text' id='mins' name='mins' value="" style="width:20px;"  onkeypress="return isNumberKey(event)">

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
	</form>
	</div>
</div>
