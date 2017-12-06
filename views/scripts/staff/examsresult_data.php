<style>
	.table-new {border:1px solid #00688B;text-align: center; margin-left:50px; margin-bottom:15px;}
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
<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
	<tr class="tr-head">
		<td widt="100" align="center" class="line2">  Examinees Name </td>
		<td width="300" align="center" class="line2">Exam Name </td>
		<td width="100" align="center" class="line2">Remarks </td>
		<td align="center" class="line2">  View </td>
	</tr>

	<?php
		if(is_array($data['exam'])){
			foreach($data['exam'] as $row){
	?>
	<tr>
		<td align="center" class="line"> <?php echo $row['user_lname'] . ', ' . $row['user_fname'];?></td>
		<td align="center" class="line"> <?php echo $row['exam_name']; ?></td>
	<?php
	?>
		<td align="center" class="line"> 
			<?php 
				if ( (($data[$row['user_id']][0]['score'] / $row['passing_score']) * 100 ) >= $row['passing_grade'] ) {
					echo "<span style='color: green;'><b>Passed</b></span>";
				}else{
					echo "<span style='color: red;'><b>Failed</b></span>";
				}
			?> 
		</td>
		<td align="center" class="line1"> <a href="javascript:loadPage('index.php?admin/checkresult&exam_id=<?php echo $row['exam_id'];?>' + '&user_id=<?php echo $row['user_id'];?>');"> Check Results</a></td>

	</tr>
	<?php
			}
		}
	?>

</table>