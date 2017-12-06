<script language="javascript">
$(document).ready(function(){
	
	$.get('index.php?admin/departmentlist',function(data){
		$('#dept_list').html(data);
	})
	/*
	$('#add').click(function(){
		$('#departments').load('index.php?admin/departmentsadd');
	});
	*/
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
<div id="departments" class="users" style="width: 100%; height: auto; margin-bottom:10px;">
	<div style="margin-left:50px;">
		<a href="javascript:loadPage('index.php?admin/departmentsadd');">Add new </a>
		<!--
		<input type="button" style="width: 150px; height: 25px;" value="Add New" id="add">
	-->
	</div><br />
	<div id="dept_list" class="dept_list">

	</div>
</div>