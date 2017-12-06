
<script language="javascript">
$(document).ready(function(){
	$('#back').click(function(){
		loadPage('index.php?staff/index');

	});
});
</script>
<style>
	.table-new {border:1px solid #00688B;text-align: center; margin-left:50px}
	.table-new tbody{border: 1px solid #00688B;}
	.line {text-align: left; border-right: 1px solid #00688B;padding-right: 2px;margin-right: 5px;border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;}
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
</br>
<span class="mcstyle" style="margin-left:50px;">Exam name: <?php echo $data['exam_name'][0]['exam_name'];?></span>
<div style="margin-top: 8px;">
<table width="90%" class="table-new" border="0" cellspacing="0" cellpadding="5">
<tr class="tr-head">
	<td width="150" align="center" class="line2"><b> Questions  </b></td>
	<td width="100" class="line2"><b> My Answers </b></td>
</tr>
<?php 
$cnt = 0;
$correct = 0;
if (is_array($data['transaction_dtl'])){
	foreach($data['transaction_dtl'] as $row){
	$cnt++;
		if ($row['israted'] <> 0){
			$correct += $row['score'];
		}
		
	
?>
<tr>
	<td class="line"> <?php  echo $cnt . '. ' . $row['question_name']; ?> <?php  echo ($row['israted'] == 0 ?  "<span style='color:gray;'> (Not yet graded) </span>" : '');?> </td>
	<?php
	if ($row['israted'] == 0){

	?>
		<td class="line"> <span style="color: black"><?php echo $row['essay']; ?> </span></td>
	<?php
	}else{
	?>
	<td class="line"> <span style="<?php echo ($row['score']==0 ? 'color: red' : 'color:green');?>"><?php echo ($row['answer_name'] != '' ? $row['answer_name'] : $row['essay']); ?> </span></td>
	<?php 
	}	
	?>
</tr>
<?php
	}
}
?>
</table>
<div style="float:right; padding-right: 10px; margin-right:35px;" class="mcstyle">
    <table class="mcstyle" style="font-size: 13px;">
    <tr>
        <td align="right"> <b> Score: </b></td>
        <td> <b> <?php echo $correct . ' out of ' . $data['exam_name'][0]['passing_score']; ?></b> </td>
    </tr>
    <tr>
        <td align="right"> <b>Grade: </b> </td>
         <td> 
         	<b>
     		<?php  $grade = ($correct/$data['exam_name'][0]['passing_score']) * 100 ;
     			echo $grade.'%';
        	 ?>  
        	</b> 
     	</td>
    </tr>
    <tr>
        <td align="right"> <b> Remark: </b></td>
        <td> 
        <?php
            if ( $grade >= $data['exam_name'][0]['passing_grade'] ) {
                echo "<span style='color: green;'><b>Passed</b></span>";
            }else{
                echo "<span style='color: red;'><b>Failed</b></span>";
            }
        ?>
        </td>
    </tr>
    </table>
	</br>
	<div style="float:right;">
		<input type="button" id="back" value="Back">
	</div>
</div>

	
</div>