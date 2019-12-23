<?php

    require_once("Connect/mysql/PDOData.php");
    
    class Student{
	
        public function __contruct() {
        }
        	//Lấy danh sách tất cả học sinh
		public function getAll() {
			$db =new PDOData();
            $ret = $db->doQuery("select p.* from students s
			INNER JOIN profiles p on p.student_id=s.student_id;");
            return $ret;
        }
		//Lấy danh sách học sinh theo lớp
		public function getStudentByClass($class_id) {
			$db =new PDOData();
            $ret = $db->doQuery("SELECT p.*
				FROM students s
				INNER JOIN profiles p on p.student_id=s.student_id
				INNER join classes c on c.class_id=s.class_id
				WHERE c.class_id=$class_id;
				");
            return $ret;
        }
		//Lấy danh sách học sinh theo kỳ thi
		public function getStudentInExam($exam_id){
		$db =new PDOData();
            $ret = $db->doQuery("SELECT p.*
				FROM studentsexams se
				INNER JOIN profiles p on p.student_id=se.student_id
				INNER join exams e on e.exam_id=se.exam_id
				WHERE e.exam_id=$exam_id;
				");
            return $ret;
		}
		//Lấy danh sách tất cả các kỳ thi
		public function getExam(){
		$db =new PDOData();
            $ret = $db->doQuery("SELECT * from exams;
				");
            return $ret;
		}
		//Lấy danh sách các kỳ thi mà học sinh với student_id tham gia
		public function getExamByStudent($student_id){
		$db =new PDOData();
            $ret = $db->doQuery("SELECT e.* from exams e
			inner join studentsexams se on se.exam_id = e.exam_id
			where se.student_id=$student_id;
				");
            return $ret;
		}
		//Tạo kỳ thi mới
		public function CreateExam($class_id,$exam_date,$Time_started,$Time_finished,$exam_room,$exam_limit){
		$db =new PDOData();
        $db->doSql("INSERT INTO exams(class_id ,exam_date ,Time_started ,Time_finished ,exam_room ,exam_limit)
			VALUES('$class_id' ,'$exam_date' ,'$Time_started' ,'$Time_finished' ,'$exam_room' ,'$exam_limit');
				");
		}
		 //Thêm sinh viên vào kỳ thi
		public function AddStudentExam($student_id,$exam_id){
		$db =new PDOData();
        $db->doSql("INSERT INTO studentsexams(student_id ,exam_id )
			VALUES('$student_id' ,'$exam_id' );
				");
		}  
    }

