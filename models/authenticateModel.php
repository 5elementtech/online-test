<?php
Class authenticateModel extends _Db{
	public function login($user_name, $user_password){
		//return $this->fetch_all_rows("SELECT * FROM users WHERE user_name ='$user_name' AND user_password = '$user_password' AND user_enabled = 1");
		return $this->fetch_all_rows("SELECT * FROM users WHERE user_name ='$user_name' AND user_password = '$user_password'");
	}
}

?>