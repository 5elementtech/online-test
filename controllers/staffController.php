<?php
Class staffController extends _Controller {
	public function indexAction(){
		$staff = $this->load->model('staffModel');
		$result = $staff->exam_list($_SESSION['user_id']);
		$this->load->view('scripts/staff/index',$result);
	}
	public function examAction(){
		unset($_SESSION['answer_id']);
		unset($_SESSION['question_id']);
		unset($_SESSION['answer']);
		$staff = $this->load->model('staffModel');
		$exam_id = $this->set->get('exam_id');
		$isTaken = $staff->alreadytaken($_SESSION['user_id'],$exam_id);
		if (!is_array($isTaken)){
			$result = $staff->getexamfirst($exam_id);
			$result['exam_id'] = $exam_id;
			$this->load->view('scripts/staff/exam',$result);	
		}else{
			header("Location:" . BASE_URL.'index/main');
		}
		
	}
	public function getexamnextAction(){
		$staff = $this->load->model('staffModel');
		$exam_id = $this->set->get('exam_id');
		$start = $this->set->get('start');
		$result = $staff->getexamnext($exam_id, $start);
		$result['question_id'] = $this->set->get('question_id');
		if (isset($_SESSION['question_id'])){
			if (isset($_GET['answer_id'])){
				$_SESSION['answer_id'][$start] = $this->set->get('answer_id');
				$_SESSION['question_id'][$_SESSION['answer_id'][$start]] = $this->set->get('question_id');
				$_SESSION['answer'][$_SESSION['answer_id'][$start]] = mysql_real_escape_string(sanitize($this->set->get('answer')));
			}else{
				$_SESSION['answer_id'][$start] = $this->set->get('question_id');
				$_SESSION['question_id'][$_SESSION['answer_id'][$start]] = $this->set->get('question_id');
				$_SESSION['answer'][$_SESSION['answer_id'][$start]] = mysql_real_escape_string(sanitize($this->set->get('answer')));
			}
		}else{
			if (isset($_GET['answer_id'])){
				$_SESSION['answer_id'][$start] = $this->set->get('answer_id');
				$_SESSION['question_id'][$_SESSION['answer_id'][$start]] = $this->set->get('question_id');
				$_SESSION['answer'][$_SESSION['answer_id'][$start]] = mysql_real_escape_string(sanitize($this->set->get('answer')));
			}else{
				$_SESSION['answer_id'][$start] = $this->set->get('question_id');
				$_SESSION['question_id'][$_SESSION['answer_id'][$start]] = $this->set->get('question_id');
				$_SESSION['answer'][$_SESSION['answer_id'][$start]] = mysql_real_escape_string(sanitize($this->set->get('answer')));
			}
		
		}
		$this->load->view('scripts/staff/exam-next',$result);
	}
	public function submitresult2Action(){
		$staff = $this->load->model('staffModel');
		$exam_id = $this->set->get('exam_id');
		$time_consumed = $this->set->get('time_consumed');
		$result = $staff->submitresult( $_SESSION['user_id'], $exam_id, $time_consumed );
		
		unset($_SESSION['answer_id']);
		unset($_SESSION['question_id']);
		unset($_SESSION['answer']);
	}
	public function submitresultAction(){
		$staff = $this->load->model('staffModel');
		$exam_id = $this->set->get('exam_id');
		//$answer = $this->set->get('answer');
		$time_consumed = $this->set->get('time_consumed');
		$start = $this->set->get('start');
		$result = $staff->getexamnext($exam_id, $start);
		if (isset($_SESSION['question_id'])){
			if (isset($_GET['answer_id'])){
				$_SESSION['answer_id'][$start] = $this->set->get('answer_id');
				$_SESSION['question_id'][$_SESSION['answer_id'][$start]] = $this->set->get('question_id');
				$_SESSION['answer'][$_SESSION['answer_id'][$start]] = mysql_real_escape_string(sanitize($this->set->get('answer')));
			}else{
				$_SESSION['answer_id'][$start] = $this->set->get('question_id');
				$_SESSION['question_id'][$_SESSION['answer_id'][$start]] = $this->set->get('question_id');
				$_SESSION['answer'][$_SESSION['answer_id'][$start]] = mysql_real_escape_string(sanitize($this->set->get('answer')));
			}
		}else{
			if (isset($_GET['answer_id'])){
				$_SESSION['answer_id'][$start] = $this->set->get('answer_id');
				$_SESSION['question_id'][$_SESSION['answer_id'][$start]] = $this->set->get('question_id');
				$_SESSION['answer'][$_SESSION['answer_id'][$start]] = mysql_real_escape_string(sanitize($this->set->get('answer')));
			}else{
				$_SESSION['answer_id'][$start] = $this->set->get('question_id');
				$_SESSION['question_id'][$_SESSION['answer_id'][$start]] = $this->set->get('question_id');
				$_SESSION['answer'][$_SESSION['answer_id'][$start]] = mysql_real_escape_string(sanitize($this->set->get('answer')));
			}
		
		}
		$result = $staff->submitresult( $_SESSION['user_id'], $exam_id, $time_consumed );
		unset($_SESSION['answer_id']);
		unset($_SESSION['question_id']);
		unset($_SESSION['answer']);
		//header("Location:" . BASE_URL.'staff/thankyou');
		//$this->load->view('index.php?staff/thankyou')
	}
	public function viewresultsAction(){
		$staff = $this->load->model('staffModel');
		$exam_id = $this->set->get('exam_id');
		$user_id = $_SESSION['user_id'];
		$result = $staff->viewresults($exam_id, $user_id);
		$this->load->view('scripts/staff/view-results',$result);
	}
	public function viewresults2Action(){
		$staff = $this->load->model('staffModel');
		$exam_id = $this->set->get('exam_id');
		$user_id = $_SESSION['user_id'];
		$result = $staff->viewresults($exam_id, $user_id);
		$this->load->view('scripts/staff/view-results2',$result);
	}
	public function thankyouAction(){
		$this->load->view('scripts/staff/thankyou');
	}
	public function examsresultAction(){	
		$staff = $this->load->model('staffModel');
		$exam_id = $this->set->get('exam_id');
		$result = $staff->examsresult($exam_id);
		$this->load->view('scripts/staff/examsresult',$result);	

	}
	public function examslistAction(){
		$admin = $this->load->model('staffModel');
		$from = $this->set->post('from');
		$to = $this->set->post('to');
		$result = $admin->loadExams( $from, $to );
		if ( $from == '' && $to == '' ){
			//$this->load->view('scripts/admin/examsresult',$result);	
		}else{
			//$this->load->view('scripts/admin/examsresult_data',$result);	
		}
		$this->load->view('scripts/staff/exams_list',$result);
	}

}
?>