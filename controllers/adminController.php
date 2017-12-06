<?php
Class adminController extends _Controller {
	/*for users*/
	public function indexAction(){

	}
	public function usersAction(){
		$this->load->view('scripts/admin/users');
		
	}

	public function usersaddAction(){
		//	$menu = $this->load->model('LayoutModel');
		$admin = $this->load->model('adminModel');
		$result = $admin->loadDepartmentandRole();
		$this->load->view('scripts/admin/usersadd',$result);
	}

	public function saveusernewAction(){
		$admin = $this->load->model('adminModel');
		$user_fname =  $this->set->post('fname');
		$user_lname =  $this->set->post('lname');
		$user_name =  $this->set->post('user_name');
		$user_password = md5( $this->set->post('password'));
		$role_id = $this->set->post('role_id');
		$department_id =  $this->set->post('dept_id');
		$enabled =   isset($_POST['u_enable']) ? 1 : 0;
		$ischecker = isset($_POST['u_examchecker']) ? 1 : 0;
		$user_id = $_SESSION['user_id'];
		print_r($_POST);
		$admin->addnewuser($user_fname,$user_lname,$user_name,$user_password,$role_id,$department_id,$enabled,$user_id,$ischecker);
		
	}
	public function userupdateAction(){
		$admin = $this->load->model('adminModel');
		$user_fname =  $this->set->post('fname');
		$user_lname =  $this->set->post('lname');
		$user_name =  $this->set->post('user_name');
		$role_id = $this->set->post('role_id');
		$department_id =  $this->set->post('dept_id');
		$enabled =   isset($_POST['u_enable']) ? 1 : 0;
		$ischecker = isset($_POST['u_examchecker']) ? 1 : 0;
		$user_id = $_SESSION['user_id'];
		$edit_id = $this->set->post('edit_id');
		$admin->userupdate($user_fname,$user_lname,$user_name,$role_id,$department_id,$enabled,$user_id,$edit_id,$ischecker);
	}
	public function userupdate2Action(){
		$admin = $this->load->model('adminModel');
		$edit_id = $this->set->post('edit_id');
		$change_pass = $this->set->post('change_pass');
		$admin->userupdate2($edit_id, $change_pass);

	}
	public function userslistAction(){
		$admin = $this->load->model('adminModel');
		$result = $admin->loadUsers();
		$this->load->view('scripts/admin/index',$result);
	}
	public function usereditAction(){
		$admin = $this->load->model('adminModel');
		$user_id = $this->set->get('user_id');
		$result = $admin->loadDepartmentandRole();
		$result['user'] = $admin->selectuser($user_id);
		$result['user_id'] = $user_id;
		$this->load->view('scripts/admin/users-edit',$result);
	}

	public function userdeleteAction(){
		$admin = $this->load->model('adminModel');
		$user_id = $this->set->get('user_id');
		$admin->userdelete($user_id);
	}

	/* end users */
	/*sign up*/
	public function signupnewAction(){
		$admin = $this->load->model('adminModel');
		$result['department'] = $admin->loadDepartment();
		$this->load->view('scripts/admin/sign-up',$result);
	}
	public function signupaddAction(){
		$admin = $this->load->model('adminModel');
		$user_fname =  sanitize($this->set->post('fname'));
		$user_lname =  sanitize($this->set->post('lname'));
		$user_name =  sanitize($this->set->post('user_name'));
		$department_id =  sanitize($this->set->post('dept_id'));
		$user_password = md5(sanitize($this->set->post('password')));
		$admin->signupadd($user_fname,$user_lname,$user_name,$user_password,$department_id);
		//header("Location:" . BASE_URL);
	}
	/* end sign up*/
	/*for department*/
	public function departmentsAction(){
		$this->load->view('scripts/admin/departments');
	}
	public function departmentsaddAction(){
		$this->load->view('scripts/admin/departments-add');
	}
	public function savedepartmentnewAction(){
		$admin = $this->load->model('adminModel');
		$department_code = $this->set->post('department_code');
		$department_name = $this->set->post('department_name');
		$admin->savedepartmentnew($department_code,$department_name);
	}
	public function departmentlistAction(){
		$admin = $this->load->model('adminModel');
		$result = $admin->loadDepartment();
		$this->load->view('scripts/admin/department_list',$result);
	}
	public function departmenteditAction(){
		$admin = $this->load->model('adminModel');
		$department_id = $this->set->get('department_id');
		$result = $admin->departmentedit($department_id);
		$this->load->view('scripts/admin/departments-edit',$result);
	}
	public function departmentupdateAction(){
		$admin = $this->load->model('adminModel');
		$department_id = $this->set->post('department_id');
		$department_name = $this->set->post('department_name');
		$admin->departmentupdate($department_id, $department_name);
	}
	public function departmentdeleteAction(){
		$admin = $this->load->model('adminModel');
		$department_id = $this->set->get('department_id');
		$admin->departmentdelete($department_id);
	}
	/*end department*/
	/*for exam */
	public function examsAction(){
		$this->load->view('scripts/admin/exams');
	}
	public function examsaddAction(){
		$admin = $this->load->model('adminModel');
		$result['department'] = $admin->loadDepartment();
		$this->load->view('scripts/admin/exams-add',$result);
	}
	public function saveexamsnewAction(){
		$admin = $this->load->model('adminModel');
		$exam_name = $this->set->post('exam_name');
		$exam_from = $this->set->post('exam_from');
		$exam_to = $this->set->post('exam_to');
		$user_id = $_SESSION['user_id'];
		$total_points = $this->set->post('total_points');
		$passing_grade = $this->set->post('passing_grade');
		$time = ($this->set->post('hrs') * 3600) + ($this->set->post('mins') * 60);
		$dept_id = $this->set->post('dept_id');
		$admin->saveexamsnew($exam_name,$exam_from,$exam_to,$user_id,$total_points,$time,$passing_grade,$dept_id);
	}
	public function saveexamsupdateAction(){
		$admin = $this->load->model('adminModel');
		$exam_name = $this->set->post('exam_name');
		$exam_from = $this->set->post('exam_from');
		$exam_to = $this->set->post('exam_to');
		$exam_id = $this->set->post('exam_id');
		$department_id = $this->set->post('dept_id');
		$user_id = $_SESSION['user_id'];
		$total_points = $this->set->post('total_points');
		$passing_grade = $this->set->post('passing_grade');
		$time = ($this->set->post('hrs') * 3600) + ($this->set->post('mins') * 60);
		$admin->saveexamsupdate($exam_name,$exam_from,$exam_to,$user_id,$total_points,$time,$exam_id,$passing_grade,$department_id);
	}
	public function examslistAction(){
		$admin = $this->load->model('adminModel');
		$from = $this->set->post('from');
		$to = $this->set->post('to');
		$result = $admin->loadExams( $from, $to );
		if ( $from == '' && $to == '' ){
			//$this->load->view('scripts/admin/examsresult',$result);	
		}else{
			//$this->load->view('scripts/admin/examsresult_data',$result);	
		}
		
		$this->load->view('scripts/admin/exams_list',$result);
	}
	public function exameditAction(){
		$admin = $this->load->model('adminModel');
		$exam_id = $this->set->get('exam_id');
		$result = $admin->examedit($exam_id);
		$result['department'] = $admin->loadDepartment();
		$result['exam_id'] = $exam_id;
		$this->load->view('scripts/admin/exams-edit',$result);
	}
	public function examsresultAction(){	
		$admin = $this->load->model('adminModel');
		$from = $this->set->post('from');
		$to = $this->set->post('to');
		$result=$admin->examsresult($from, $to);
		if ( $from == '' && $to == '' ){
			$this->load->view('scripts/admin/examsresult',$result);	
		}else{
			$this->load->view('scripts/admin/examsresult_data',$result);	
		}
	}

	public function checkresultAction(){
		$admin = $this->load->model('adminModel');
		$exam_id = $this->set->get('exam_id');
		$user_id = $this->set->get('user_id');
		$result = $admin->checkresult($exam_id, $user_id);
		$result['exam_id'] = $exam_id;
		$result['user_id'] = $user_id;
		$this->load->view('scripts/admin/checkresults',$result);
	}
	public function rateAction(){
		$admin = $this->load->model('adminModel');
		$transaction_dtl_id = $this->set->get('transaction_dtl_id');
		//$result = $transaction_dtl_id;
		$result['exam_id'] = $this->set->get('exam_id');
		$result['user_id'] = $this->set->get('user_id');
		$result = $admin->rate($transaction_dtl_id);
		$this->load->view('scripts/admin/essay_rate',$result);
	}
	public function rateupdateAction(){
		$admin = $this->load->model('adminModel');
		$transaction_dtl_id = $this->set->post('transaction_dtl_id');
		$score = $this->set->post('score');
		$checked_by = $_SESSION['user_id'];
		$result = $admin->rateupdate($transaction_dtl_id,$score, $checked_by);
		//$this->load->view('scripts/admin/essay_rate',$result);
	}
	public function checkstatusAction(){
		$admin = $this->load->model('adminModel');
		$status = $this->set->post('status');
		$user_id = $this->set->post('user_id');
		$exam_id = $this->set->post('exam_id');
		$admin->checkstatus($status,$user_id,$exam_id);
	}
	/*for question */
	public function questionsAction(){
		$q_id = $this->set->get('exam_id');
		$this->load->view('scripts/admin/questions',$q_id);
	}
	public function questionaddAction(){
		$q_id = $this->set->get('exam_id');
		$this->load->view('scripts/admin/questions-add2',$q_id);
	}
	public function questionexamsnewAction(){
		$exam_id = $this->set->post('exam_id');
		$question = $this->set->post('question');
		$question_type = $this->set->post('question_type');
		$admin = $this->load->model('adminModel');
		$user_id = $_SESSION['user_id'];
		$admin->questionexamsnew($exam_id, $question, $question_type, $this->set->get('data_'),$user_id);
	}
	public function questionaddinsertAction(){
		$exam_id = $this->set->post('exam_id');
		$question = $this->set->post('question_name');
		$user_id = $_SESSION['user_id'];
		$question_type = $this->set->post('question_type');
		$essay_points = $this->set->post('essay_points');
		$admin = $this->load->model('adminModel');
		$admin->questionaddinsert($exam_id,$question,$question_type,$user_id,$essay_points);

	}
	public function questionlistAction(){
		$admin = $this->load->model('adminModel');
		$exam_id = $this->set->get('exam_id');
		$result = $admin->loadQuestion($exam_id);
		$result['exam_id1'] = $this->set->get('exam_id');
		$this->load->view('scripts/admin/questions_list',$result);
	}


	public function questioneditAction(){
		$admin = $this->load->model('adminModel');
		$question_id = $this->set->get('question_id');
		$result['question'] = $admin->questionedit($question_id);
		$result['question_id'] = $question_id;
		$result['exam_id'] = $this->set->get('exam_id');
		$this->load->view('scripts/admin/questions-edit2',$result);
	}
	public function questionupdateAction(){
		$admin = $this->load->model('adminModel');
		$question_name = $this->set->post('question_name');
		$question_type = $this->set->post('question_type');
		$question_id = $this->set->post('question_id');
		$essay_points = $this->set->post('essay_points');
		$admin->questionupdate($question_name,$question_type,$question_id,$essay_points);
	}
	public function questiondeleteAction(){
		$admin = $this->load->model('adminModel');
		$exam_id = $this->set->get('exam_id');
		$admin->questiondelete($exam_id);
	}
	/*for answer */
	public function answereditAction(){
		$admin = $this->load->model('adminModel');
		$answer_id = $this->set->get('answer_id');
		$result = $admin->answeredit($answer_id);
		$result['exam'] = $this->set->get('exam_id');
		$result['answer_id'] = $answer_id;
		$result['question_id'] = $this->set->get('question_id');
		$this->load->view('scripts/admin/answer-edit',$result);
	}
	public function answerupdateAction(){
		$admin = $this->load->model('adminModel');
		$answer_id = $this->set->post('answer_id');
		$answer_name = $this->set->post('answer_name');
		$flag = $this->set->post('flag');
		$question_id = $this->set->post('question_id');
		$admin->answerupdate($answer_id, $answer_name,$flag, $question_id);

	}
	public function answeraddAction(){
		//$admin = $this->load->model('adminModel');
		//$answer_name = $this->set->post('answer_name');
		//$flag = $this->set->post('flag');
		$result['question_id'] = $this->set->get('question_id');
		$result['exam_id'] = $this->set->get('exam_id');
		$this->load->view('scripts/admin/answer-add',$result);
		//$admin->answeradd($answer_name,$flag, $question_id);
	}
	public function answeraddinsertAction(){
		$admin = $this->load->model('adminModel');
		$answer_name = $this->set->post('answer_name');
		$flag = $this->set->post('flag');
		$question_id = $this->set->post('question_id');
		//$answer_name,$flag,$question_id
		$admin->answeraddinsert($answer_name,$flag,$question_id);
	}
	public function answerdeleteAction(){
		$admin = $this->load->model('adminModel');
		$answer_id = $this->set->get('answer_id');
		$admin->answerdelete($answer_id);
	}
}
?>