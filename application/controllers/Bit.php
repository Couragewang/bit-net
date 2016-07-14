<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->load->view('site/student_base_info_view/student_info_index.html');
	}

	//获取学生所有基本信息
	public function get_students_base_info()
	{
		$this->load->view('site/student_base_info_view/student_info_table_header.html');
		$_name   = $_POST['name'] != '无' ? $_POST['name'] : '';
		$_school = $_POST['school']!= '无' ? $_POST['school'] : '';
		$_grade  = $_POST['grade'] != '无' ? $_POST['grade'] : '';
		$_major  = $_POST['major'] != '无' ? $_POST['major'] : '';
		$_bit_class = $_POST['bit_class'] != '无' ? $_POST['bit_class'] : '';

		$this->load->model('student_info_model', 'db_model', TRUE);
		$res = $this->db_model->get_student_info($_name, $_school, $_grade, $_major, $_bit_class);

		if( $res['res'] ){
			$row=array();
			//foreach($res['data']->result_array() as $row){
			foreach($res['data'] as $row){
				//foreach($row as $key => $val){
				//	//printf("%s : %s\n", $key, $val);
				//}
				$this->load->view('site/student_base_info_view/student_info_table.html', $row);
			}
		}
		$this->load->view('site/student_base_info_view/student_info_table_tail.html');
	}

	//管理员或学生提交信息到数据库
	public function insert_students_base_info($usr = ''){
		$res='false';
		if( $usr != 'user' && $usr != 'admin' ){
			return $res;
		}

		$_passwd = '';
		$_name = $_POST['name'];
		$_school = $_POST['school'];
		$_major = $_POST['major'];
		$_grade = $_POST['grade'];
		$_phone = $_POST['phone'];
		$_email = $_POST['email'];
		$_bit_class = $_POST['bit_class'];
		$_sex = $_POST['sex'];
		$_is_read = $_POST['is_read'];

		if( $usr == 'user' ){ //普通用户，需要输入密码，将来这里要进行验证和加密
			$_passwd=$_POST['passwd'];
		}elseif( $usr == 'admin' ){
		}
		if(empty($_passwd)){
			$_passwd = 'bit'; //使用缺省
		}
		if(empty($_name)){
			$_name = 'bit'; //使用缺省
		}
		$this->load->model('student_info_model', 'db_model', TRUE);
		$res = $this->db_model->insert_student_info($_name, $_passwd, $_school, $_major,$_grade, $_phone, $_email, $_bit_class, $_sex, $_is_read);
		$this->load->view('site/sign_up_jump.html');
		if( !$res ){
			die(mysql_error());
		}
	}

	//分析学生数据
	public function analy_students_base_info($part = 'all'){
		$this->load->view('site/user_base_info_analy_view/major_distribution.html');
	}
}








