<script language="javascript">
$(document).ready(function(){
	$('.edit').click(function(){
		loadPage('index.php?admin/questionedit&question_id='+$(this).attr('id') + '&exam_id=' + $('#exam_id').val());
	});
	$('#back').click(function(){
		loadPage('index.php?admin/examslist');
	});
});
</script>

<div style="width: 100%; height: auto;">
<div>
<style>
	.table-new {border:1px solid #00688B;text-align: center;}
	.table-new tbody{border: 1px solid #00688B;}
	.line {border-right: 1px solid #00688B;padding-right: 2px;margin-right: 5px;border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;}
	.line1{border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;}
	.line2{border-right: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important; font-weight:bold;}


	.error-msg{
		overflow:hidden;
		width:900px; 
	}
	.error-msg h5{
		overflow:hidden;
		color:#F00;
		text-transform:uppercase;
		background: white;
	}
.mcstyle{
	font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;
}
 </style>

<table>
<tr>
	<?php
	?>
	<td class="mcstyle"> Exam Name : </td>
	<td class="mcstyle"> <a href="javascript:loadPage('index.php?admin/examedit&exam_id=<?php echo $data['exam_id1'];?>');"><?php echo $data['exam'][0]['exam_name'];?></a></td>
</tr>
<tr>
	<td class="mcstyle"> Created by : </td>
	<td class="mcstyle"> <?php echo $data['exam'][0]['user_lname'] . ', ' . $data['exam'][0]['user_fname'];?></td>
</tr>
<tr>
	<td class="mcstyle"> Created on : </td>
	<td class="mcstyle"> <?php echo date('m-d-Y', strtotime($data['exam'][0]['exam_date_created']));?></td>
</tr>
<tr>
	<td class="mcstyle"> Exam Period : </td>
	<td class="mcstyle"> <?php echo date('m-d-Y', strtotime($data['exam'][0]['exam_from'])) . ' to ' . date('m-d-Y', strtotime($data['exam'][0]['exam_to']))  ?> </td>
</tr>
<tr>
	<td>&nbsp; </td>
	<td>&nbsp; </td>
</tr>
<tr>
	<td class="mcstyle"> <a href="javascript:loadPage('index.php?admin/questionadd&exam_id='+<?php  echo $data['exam_id1'];?>);"> Add new question </a></td>
</tr>
</table>
	<div style="float: right; margin-bottom:5px;">
		<input type="button" value="Back" id="back">
	</div>
</div>
<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
<tr class="tr-head">
	<td width="300" align="center" class="line2" > <b> Questions </b></td>
	<td width="410" align="center" class="line2"> <b> Answers </b></td>
</tr>
<?php 

if (is_array($data['exam'])){
	foreach($data['exam'] as $row){
		//if(is_array($data[$row['question_id']])){	
?>
<tr>

	<td class="line"> 
		<div style="">
			<?php echo $row['question_name'] . ($row['question_type'] == 0 ? ' ( 1 Point )' : ( $row['essay_points'] == 1 ?  '( '. $row['essay_points'] . ' Point )' : '( '. $row['essay_points'] . ' Points )' )   ); ?> <a href="javascript:loadPage('index.php?admin/questionedit&question_id='+<?php echo $row['question_id'];?> +'&exam_id='+ <?php echo $row['exam_id']?>);"> Edit</a>
		</div>
	</td>

	<td>
		<div style="">
	<?php 
	//print_r($data);
		if($row['question_type']== 0){
	?>
			 <table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
			<?php 
			if(is_array($data[$row['question_id']])){
				foreach ($data[$row['question_id']] as $row2){

				if($row['question_type']==0){
			?> 
				<tr>
					<td width="350" class="line"> <span style="<?php echo ($row2['answer_flag'] == 1 ? 'color: green' : 'color: black' );?>"> <?php echo $row2['answer_name'] ?> </span></td>
					<td class="line"> <a href="javascript:loadPage('index.php?admin/answeredit&answer_id='+<?php echo $row2['answer_id'];?> + '&exam_id='+ <?php echo $row['exam_id']; ?> + '&question_id=' + <?php echo $row['question_id'];?>);"> Edit </a></td>
					<td class="line"><a href="javascript:deleteData('index.php?admin/answerdelete&answer_id=<?php echo $row2['answer_id']?>','index.php?admin/questionlist&exam_id=<?php echo $row['exam_id'];?>');"> Delete</a></td>

				</tr>
			<?php
					}
				}
			}

			if($row['question_type']==0){
			?>

				<tr>
					<td colspan="3" align="center" class="line"> <a href="javascript:loadPage('index.php?admin/answeradd&question_id='+<?php echo $row['question_id'];?> +'&exam_id='+<?php echo $row['exam_id'];?>);"> Add Answer </a></td>
				</tr>
			<?php
			}
			?>
			</table>
	<?php
		}
	?>
		</div>
	</td>
</tr>
<?php
	}
}
?>
</table>
</div>
<input type="hidden" id="exam_id" value="<?php echo $data['exam_id1'];?>">