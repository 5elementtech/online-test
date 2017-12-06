<?php
Class authenticateController extends _Controller {
	public function verifyAction(){
		if ( !isset($_SESSION['user_id']) ){
			$user_name = sanitize($this->set->post('user_name'));
			$user_password = md5(sanitize($this->set->post('user_password')));
			$model = $this->load->model('authenticateModel');
			if( !EMPTY($user_name) && !EMPTY($user_password) ){
				$result = $model->login( $user_name, $user_password );
			}
			if ( is_array($result) ){
				//print_r($result);
				if ( $result[0]['user_enabled'] == 1 ) {
					$_SESSION['user_id'] = $result[0]['user_id'];
					$_SESSION['role_id'] = $result[0]['role_id'];
					header("Location:" . BASE_URL);
				}else{
					header("Location:" . BASE_URL . 'authenticate/failed&err=0');
				}
			}else{
				header("Location:" . BASE_URL . 'authenticate/failed&err=1');
			}
		}else{
			header("Location:" . BASE_URL );
		}
	
	}
	public function failedAction(){
		
		$result['nav'] = $this->load->tmpl_view('scripts/login/login-failed');
		$this->load->view('mainLayouts/layouts', $result);
	}
	public function logoutAction(){
		session_destroy();
		/*
		unset($_SESSION['user_id']);
		unset($_SESSION['role_id']);
		*/
		header("Location:" . BASE_URL);
	}
}
?>