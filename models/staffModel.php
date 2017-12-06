<?php
Class staffModel extends _Db{
	public function exam_list($user_id){
		$sql = "SELECT * FROM exams 
			    INNER JOIN  users ON exams.department_id = users.department_id
				WHERE /*CURDATE() BETWEEN exam_from AND exam_to 
			 	AND*/  users.user_id = $user_id ORDER BY exam_id ASC";
		$result['exam'] = $this->fetch_all_rows($sql);
		if(is_array($result['exam'])){
			foreach($result['exam'] as $row){

				if ($row['isdeleted'] == 0){
					$sql = "SELECT * FROM transaction_dtl where user_id=$user_id and exam_id =".$row['exam_id'] . " ORDER BY exam_id ASC" ;
					//echo $sql . '</br>';
					$result[$row['exam_id']] = $this->fetch_all_rows($sql);	
				}
			}	
		}
		return $result;
		//return $this->fetch_all_rows($sql);
	}

	public function getexamfirst($exam_id){
		$sql = "SELECT *, count(exams.exam_id) FROM exams 
				LEFT JOIN exams_question ON exams.exam_id = exams_question.exam_id
				WHERE exams.exam_id = $exam_id GROUP BY exams.exam_id ORDER BY question_id ASC ";
		$result['count'] = $this->fetch_all_rows($sql);
		$sql = "SELECT * FROM exams 
				INNER JOIN exams_question ON exams.exam_id = exams_question.exam_id
				WHERE exams.exam_id = $exam_id order by question_id ASC LIMIT 0,1";
		$result['exam'] = $this->fetch_all_rows($sql);
		if (is_array($result['exam'])){
			foreach($result['exam'] as $row){
				$sql = "SELECT * FROM exams_answers WHERE question_id = $row[question_id] order by answer_id asc";
				$result[$row['question_id']] = $this->fetch_all_rows($sql);
			}
		}
		return $result;
	}
	public function alreadytaken($user_id, $exam_id){
		$sql = "SELECT * FROM transaction_dtl WHERE user_id = $user_id AND exam_id = $exam_id";
		return $this->fetch_all_rows($sql);
	}
	public function getexamnext($exam_id, $start){
		$sql = "SELECT * FROM exams 
				LEFT JOIN exams_question ON exams.exam_id = exams_question.exam_id
				WHERE exams.exam_id = $exam_id order by question_id ASC LIMIT ". $start. ",1";

		$result['exam'] = $this->fetch_all_rows($sql);
		if (is_array($result['exam'])){
			foreach($result['exam'] as $row){
				$sql = "SELECT * FROM exams_answers WHERE question_id = $row[question_id] order by answer_id asc";
				$result[$row['question_id']] = $this->fetch_all_rows($sql);
			}
		}
		
		return $result;
	}
	public function submitresult( $user_id, $exam_id, $time_consumed ){
		$sql = "SELECT UUID()";
		$uuid = $this->query($sql);
		$uuid = substr($uuid[0]['UUID()'],0,8);
		$date = date("Y-m-d");
		$this->insert('transaction',array('transaction_date'=>"'$date'",'transaction_code'=>"'$uuid'",'user_id'=>$user_id,'exam_id'=>$exam_id,'time_consumed'=>$time_consumed));
		if (isset($_SESSION['question_id'])){
			foreach($_SESSION['answer_id'] as $row){
				if (isset($_SESSION['answer'][$row])){
					$answer = $_SESSION['answer'][$row];
				}else{
					$answer='null';
				}
				$qtype = $_SESSION['question_id'][$row];
				$question_type = $this->query("SELECT * FROM exams_question WHERE question_id = $qtype");
				//print_r($question_type);
				$question_type = $question_type[0]['question_type'];
				$sql = "SELECT * FROM exams_answers WHERE answer_id = $row";
				$correct = $this->fetch_all_rows($sql);
				//print_r($correct);
				$score = 0;	
				$israted=0;
				if ($correct[0]['answer_flag']==1){
					$score = 1;
				}
				if ( $question_type==0 ){
					$israted=1;
				}
				$this->insert('transaction_dtl',array('user_id'=>$user_id,'question_id'=>$_SESSION['question_id'][$row],
													  'transaction_answer_id'=>$row,
													  'exam_id'=>$exam_id,'essay'=>"'$answer'",'transaction_code'=>"'$uuid'",
													  'transaction_question_type'=>$question_type,'score'=>$score,'israted'=>$israted));
			}	
		}else{
			$this->insert('transaction_dtl',array('user_id'=>$user_id,'question_id'=>0,'transaction_answer_id'=>0,'exam_id'=>$exam_id,'transaction_code'=>"'$uuid'",'israted'=>0));
		}
		
	}
	public function viewresults( $exam_id,$user_id){
		$sql = "SELECT * FROM exams WHERE exam_id = $exam_id";
		$result['exam_name'] = $this->fetch_all_rows($sql);

		$sql = "SELECT * 
				FROM transaction_dtl
				INNER JOIN exams_question ON transaction_dtl.question_id = exams_question.question_id
				LEFT JOIN exams_answers ON transaction_dtl.transaction_answer_id = exams_answers.answer_id
				WHERE user_id = $user_id AND transaction_dtl.exam_id = $exam_id ORDER BY exams_question.question_id ASC";
		$result['transaction_dtl'] = $this->query($sql);
		return $result;
	}
    public function examsresult($from = '', $to = '') {
        //return $this->fetch_all_rows('select * from exams WHERE NOW() BETWEEN exam_from AND exam_to ORDER BY exam_id ASC');
        if ($from != '' && $to != '') {
            $WHERE = " WHERE exam_from >= '$from' AND exam_to <= '$to' ORDER BY exams.exam_id, transaction.user_id ASC";
        } else {
            $WHERE = " WHERE CURDATE() BETWEEN exam_from AND exam_to ORDER BY exams.exam_id, transaction.user_id ASC";
        }
        $sql = "SELECT * FROM transaction 
				INNER JOIN users ON transaction.user_id = users.user_id
				INNER JOIN exams ON transaction.exam_id = exams.exam_id 
				$WHERE";
       // echo $sql;
        $result['exam'] = $this->fetch_all_rows($sql);
        if (is_array($result['exam'])) {
            foreach ($result['exam'] as $row) {
                $sql = "SELECT SUM(score) AS 'score' FROM transaction_dtl WHERE user_id = $row[user_id]  AND exam_id = $row[exam_id] ORDER BY exam_id, user_id ASC";
                $result[$row['user_id']][$row['exam_id']] = $this->fetch_all_rows($sql);
            }
          
        }
        return $result;
    }
    public function loadExams($from, $to) {
        if ($from != '' && $to != '') {
            $WHERE = " LEFT JOIN department ON exams.department_id = department.department_id WHERE exam_from >= '$from' AND exam_to <= '$to'  ORDER BY exam_id ASC";
        } else {
            $WHERE = " LEFT JOIN department ON exams.department_id = department.department_id /*WHERE CURDATE() BETWEEN exam_from AND exam_to*/ ORDER BY exam_id ASC";
        }
        $sql = "select * from exams $WHERE ";
        return $this->fetch_all_rows($sql);
    }
}

?>