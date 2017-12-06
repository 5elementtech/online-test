<script language="javascript">
$(document).ready(function(){
	$.get('index.php?admin/userslist',function(data){
		$('#user_list').html(data);
	})
	/*
	$('#add').click(function(){
		$('#users').load('index.php?admin/usersadd');
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

<div id="users" class="users" style="width: 100%; height: auto; overflow: hidden; margin-bottom:10px;">
	<div style="margin-left:50px;">
		<!--
		<input type="button" style="width: 150px; height: 25px;" value="Add New" id="add">
	-->
	<a href="javascript:loadPage('index.php?admin/usersadd');">Add new</a>
      </div><br />
	<div id="user_list" class="user_list" style="height: auto; overflow: hidden;">

	</div>
</div>