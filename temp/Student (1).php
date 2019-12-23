<?php

    require_once("Connect/mysql/PDOData.php");
    
    class Student{
	
        public function __contruct() {
        }
		//Lấy ra danh sách ca thi sinh viên đã đăng kí
		public function SelectStudentExam($sv_id){
		$db =new PDOData();
        $ret=$db->doQuery("select c.cathi_id,r.room_name,h.ten_mon_hoc,c.ngaythi,c.start,c.end from cathi c
		inner join room r on r.room_id=c.room_id 
		inner join hocphan h on h.hocphan_id=c.hocphan_id
		inner join sv_cathi s on s.cathi_id=c.cathi_id
		where s.sv_id='$sv_id'
		;
		");
			return $ret;
   		}
		
        //Thêm học sinh vào danh sách ca thi
		public function AddStudentExam($sv_id,$cathi_id){
		$db =new PDOData();
        $db->doSql("INSERT INTO sv_cathi(sv_id ,cathi_id )
			VALUES('$sv_id' ,'$cathi_id' );
				");
   		}
			
		//Thêm(sửa) tài khoản học sinh nhập từ Excel
		public function AddUserFromExcel($data){
		$db =new PDOData();
		foreach ($data as $r) {
			$hashed=hash("sha256", $r[2]);
			$db->doSql("INSERT INTO user(user_id ,username,password,fullname )
		VALUES('$r[0]' ,'$r[1]','$hashed','$r[3]' )
		ON DUPLICATE KEY UPDATE
			username = '$r[1]', 
			password = '$hashed',
			fullname='$r[3]';");
             }
   		} 
		//Cập nhật danh sách học sinh bị cấm thi
		public function BanTestUpdate($data){
		$db =new PDOData();
		foreach ($data as $r) {
			$db->doSql("UPDATE sv_kythi_hocphan
		SET banned=1
		WHERE sv_id='$r[0]' and hocphan_id='$r[1]';");
             }

		} 
		
    }

