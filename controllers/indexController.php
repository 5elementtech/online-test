<?php
Class indexController extends _Controller {
	public function mainAction(){

		if ( isset($_SESSION['user_id']) ){
			if ( $_SESSION['role_id'] == 1  ){
				$result['nav'] = $this->load->tmpl_view('scripts/admin/navigation');
				$this->load->view('mainLayouts/layouts', $result);
			}else{ //exam
				$admin = $this->load->model('adminModel');
				$result = $admin->allowedtocheck( $_SESSION['user_id'] );

				$result['nav'] = $this->load->tmpl_view('scripts/staff/navigation', $result);
				$this->load->view('mainLayouts/layouts2', $result);
			}
		}else{
			$result['nav'] = $this->load->tmpl_view('scripts/login/index');
			$this->load->view('mainLayouts/layouts', $result);
			
		}
		
	}
}
?>