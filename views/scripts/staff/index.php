<style>
	.table-new {border:1px solid #00688B;text-align: center; margin-left:50px;}
	.table-new tbody{border: 1px solid #00688B;}
	.line {border-right: 1px solid #00688B;padding-right: 2px;margin-right: 5px;border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;}
	.line1{border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.9em; color: #535353!important;}
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
<div style="width: 100%; height: auto;">
<table width="90%" class="table-new" border="0" cellspacing="0" cellpadding="5">
<tr class="tr-head">
	<td width="500" align="center" class="line2"><b> Exam Name </b></td>
	<td width="100" class="line2"><b> Period </b></td>
	<td width="100" class="line2"><b> Passing Grade </b></td>
	<td class="line2">Action</td>
</tr>
<?php 
if (is_array($data['exam'])){
	foreach($data['exam'] as $row){
?>
<tr>
	<td align="center" class="line">
		<?php echo $row['exam_name'];?>
	</td>
	<td class="line">
		<?php echo date('m-d-Y', strtotime($row['exam_from'])) . ' - ' . date('m-d-Y',strtotime($row['exam_to'])); ?>
	</td>
	<td class="line">
		<?php echo $row['passing_grade'] . '%';?>
	</td>
	<td width="100" align="center" class="line1">
		<?php 
		if (is_array($data[$row['exam_id']])){
		?>
			<!-- <a target="_blank" href="javascript:loadPage('index.php?staff/viewresults&exam_id=<?php // echo $row['exam_id'];?>');"> View Results </a> -->
			<a target="_blank" href="index.php?staff/viewresults&exam_id=<?php echo $row['exam_id'];?>"> View Results </a>
		<?php
		}else{
		?>
			<a target="_blank" href="index.php?staff/exam&exam_id=<?php echo $row['exam_id'];?>"> Take Exam </a>
		<?php	
		}
		?>
	</td>
</tr>
<?php
	}
}
?>
</table>
</div>