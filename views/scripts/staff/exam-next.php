<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language="javascript">
$(document).ready(function(){
	$('#essay_id').val($.trim($('#essay_id').val()));
});
	
</script>
<style>

.mcstyle{
		font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.9em; color: #535353!important;
}
</style>
<div class="mcstyle">
	<?php
	if (is_array($data['exam'])){
	?>
		<div>
			<?php
				echo $data['exam'][0]['question_name'];
				//echo $data['exam'][0]['question_id'];
			?>
		</div>
		<div>
			<?php 
			if ($data['exam'][0]['question_type'] == 0){
			?>

			   <ol type="A">
				<?php

				foreach($data[$data['exam'][0]['question_id']] as $row){
				?>
					<li>
						<input name="grpname"  id="<?php echo $row['answer_id'];?>" value="<?php echo $row['answer_name'];?>" type='radio'/><?php echo $row['answer_name'];?>
					</li>
				<?php
				}
				?>
				</ol>
		<?php
			}else{
		?>
			<div>
				<textarea id="essay_id"  cols="60" rows="6"> </textarea>
			</div>
		<?php

			}
		?>
		</div>
	<?php
	}
	?>
</div>
<input type="hidden" id="question_id2" value="<?php print_r($data['question_id']); ?>">
<input type="hidden" id="question_id" value="<?php echo $data['exam'][0]['question_id'];?>">
<input type="hidden" id="question_type" value="<?php echo $data['exam'][0]['question_type'] ;?>">