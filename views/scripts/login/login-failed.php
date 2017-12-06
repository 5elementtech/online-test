<div  style="width: 255px; height: 675px;">
<table>
	<?php
		if ( isset($_GET['err']) ) {
			if ( $_GET['err'] == 1  ) {
				echo "<b> <span style='color:red'>* Incorrect Username or Password * </span> </b>";
			}elseif ( $_GET['err'] == 0 ) {
				echo "<b> <span style='color:red'>* Your account need to be activated * </span></b>";
			}else{
				header("Location:" . BASE_URL );
			}
		}else{
			echo "<b> <span style='color:red'>* Incorrect Username or Password * </span></b>";
		}
	?>
	
<tr>
	<td style="font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;"> Username :</td>
	<td> <input type="text" id="user_name" name="user_name" class="user_input"/></td>
</tr>
<tr>
	<td style="font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;"> Password : </td>
	<td> <input type="password" id="user_password" name="user_password" class="user_input"></td>
</tr>
<tr>
	<!--
	<td> <input type="submit" value="submit"></td>
	<td> <input type="button" value="sign-up"></td>
	-->
	<td> <input type="submit" value="Login"></td>
	<td style="font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;"> <a href="index.php?admin/signupnew">Sign-Up</a></td>
</tr>
</table>
</div>