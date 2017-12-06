<script language="javascript">
$(document).ready(function(){
	$('#signup').click(function(){
		//alert(2);
		//$('#newuser').action="index.php?admin/signupnew";
		//$('#newuser').submit();
			/*
			$('#newuser').action="index.php?";
			$('#newuser').submit();
			*/
	});
});
</script>

<form name="newuser" id="newuser">
	<div style="width: 100%; padding-top: 10px;text-align: center;">
		<span style='color: red;'><b> Admin Account </b></span></br>
		<b>Admin Username: </b> admin</br>
		<b>Admin Password: </b> admin123
		</br></br>
		<span style='color: red;'><b> Examiner Account </b></span></br>
		<b> Examiner Username: </b> test1 </br>
		<b> Examiner Password: </b> test1 </br></br>
		<table align="center">
		<tr>
			<td style="font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;"> Username :</td>
			<td> <input type="text" id="user_name" name="user_name" class="user_input"/></td>
		</tr>
		<tr>
			<td style="font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;"> Password : </td>
			<td> <input type="password" id="user_password" name="user_password" class="user_input"></td>
		</tr>
		<tr>
			<td> <input type="submit" value="Login"></td>
			<td style="font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;"> <a href="index.php?admin/signupnew">Sign-Up</a></td>
		</tr>
		</table>
	</div></br>
</form>