<script language="javascript">
$(document).ready(function(){
	$("#range_from").datepicker({dateFormat: 'yy-mm-dd'});
	$("#range_to").datepicker({dateFormat: 'yy-mm-dd'});
	$('#range_from').change(function(){
		//alert($(this).val());
		if ( $('#range_to').val().length > 1 ) {
			$.post('index.php?admin/examslist',{ 'from' : $('#range_from').val(), 'to' : $('#range_to').val() },
			function( data ){
				$('#exam_list').html( data );
			})
		}
	});
	$('#range_to').change(function(){
		if ( $('#range_from').val().length > 1 ) {
			$.post('index.php?admin/examslist',{ 'from' : $('#range_from').val(), 'to' : $('#range_to').val() },
			function( data ){
				$('#exam_list').html( data );
			})
		}
	});
	$.get('index.php?admin/examslist',function(data){
		$('#exam_list').html(data);
	})

	$('#add').click(function(){
		$('#exam').load('index.php?admin/examsadd');
	});
});
</script>
<style>
a{
  text-decoration: none;
  font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.9em; color: blue!important;
}
  a:hover {
  text-decoration: underline;
}
</style>

<div id="exam" class="users" style="width: 100%; height: auto; margin-bottom:10px;">
	<div style="height: 30px;">
	<table style="margin: 0 auto; width: 90%;">
	<tr>
		<td><a href="javascript:loadPage('index.php?admin/examsadd');">Add new</a></td>
		<td width="330"> &nbsp;</td>

		<td class="mcstyle" align="right"> 
			Exam From 
			<input maxlength="10" id="range_from" name="range_from" class="user_input" type="text" value="2013-04-03">
			&nbsp;&nbsp;&nbsp;
			 Exam To 
			<input maxlength="10" id="range_to" name="range_to" class="user_input" type="text">
		</td>
	</tr>
	</table>
	</div>
	<div id="exam_list" class="exam_list" style="margin: 0 auto; width: 100%;">

	</div>
</div>
