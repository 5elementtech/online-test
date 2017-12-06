<script language="javascript">
$(document).ready(function(){

	$.get('index.php?admin/questionlist&exam_id='+$('#exam_id').val(),function(data){
		$('#questions_list').html(data);
	})

	$('#add').click(function(){
		$('#questions').load('index.php?admin/questionadd&exam_id='+$('#exam_id').val());
	});
});
</script>

<div id="questions" class="questions" style="width: 730px; height: 675px;margin-top: 15px;">
	<div>
		<input type="button" style="width: 150px; height: 25px;" value="Add New" id="add">
	</div>
	<div id="questions_list" class="questions_list">

	</div>
	<input type="hidden"  name="exam_id" id="exam_id" value="<?php echo $data;?>"/>
</div>