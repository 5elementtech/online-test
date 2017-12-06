<script language="javascript">

$(document).ready(function(){
	$('#cancel').click(function(){
		$('#department').load('index.php?admin/departments');
	})
	$('#save').click(function(){
		var error ="Please fill up the requirement below \r\n----------------------------------------\r\n";
		var msg = error;
		if( $('#department_name').val() == '' ){
			msg += '*Department Name \r\n';
		}
		if (msg == error){
			$.post('index.php?admin/savedepartmentnew',$("#dept_add").serialize(),function(data){
				$('#department').load('index.php?admin/departments');
			});	
			
		}else{
			alert(msg);	
		}
	});
});
</script>
<style>
.mcstyle{
	font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;
}
</style>
<div id="department" class="department" style="width: 100%; height: 675px;">
	<div class="dept_add_data">
	<form name="dept_add" id="dept_add">
	<table width="30%%">
	<tr>
		<td class="mcstyle"> Department Code : </td>
		<td> <input type="text" id="department_code" name="department_code" class="user_input"/> </td>
	</tr>
	<tr>
		<td class="mcstyle"> Department Name :</td>
		<td> <input type="text" id="department_name" name="department_name" class="user_input"/> </td>
	</tr>
	<tr>
		<td> <input type="button" id="save" class="e_button" value="Save"></td>
		<td> <input type="button" id="cancel" class="e_button" value="Cancel"></td>
	</tr>
	</table>
	</form>
	</div>
</div>