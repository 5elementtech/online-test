<style>
a{
  text-decoration: none;
  font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: blue!important;
}
  a:hover {
  text-decoration: underline;
}
</style>
<table>
<tr>
	<?php 
		if ( $data[0]['exam_checker'] == 1 ){
	?>
	<td> &nbsp;<a href="javascript:loadPage('index.php?staff/examslist');"> Examinations Results </a> </td>
	<?php
		}
	?>
	<td > &nbsp; <a href="javascript:loadPage('index.php?staff/index');"> Examinations List </a> </td>
	<td > &nbsp;<a href="index.php?authenticate/logout"> Logout </a> </td>
</tr>
</table>