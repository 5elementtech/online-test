<script language="javascript">
$(document).ready(function(){
	$('#save').click(function(){
		$.post('index.php?admin/rateupdate',{'score':$('#score').val(),'transaction_dtl_id':$('#dtl_id').val()},function(){
			loadPage('index.php?admin/checkresult&exam_id='+$('#exam_id').val()+'&user_id='+$('#user_id').val());
		});
	});

});
</script>
<style>

.mcstyle{
		font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.9em; color: #535353!important;
}
</style>

<div style="margin: 0 auto;">
<table>
<tr>
	<td class="mcstyle"> Rate : </td>
	<td class="mcstyle"> <input type="text" id="score" value="<?php echo $data[0]['score'];?>"></td>
</tr>
<tr>
	<td> </td>
	<td> <input type="button" id="save" value="save"> </td>
</tr>
</table>
<div>

<input type="hidden" id="dtl_id" value="<?php echo $data[0]['transaction_dtl_id'];?>">
<input type="hidden" id="exam_id" value="<?php echo $data[0]['exam_id'];?>">
<input type="hidden" id="user_id" value="<?php echo $data[0]['user_id'];?>">
