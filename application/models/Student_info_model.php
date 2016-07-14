<?php

class Student_info_model extends CI_Model{
//class Student_info_model{

	public function __construct ()
	{
		parent::__construct();
	}

	//注意数据库名称中的反引号，用于保证sql的执行度，新浪云必须按照这种方式进行查询，否则会出现比较坑的问题
	public function get_student_info( $name  = '', $school='', $grade='', $major='', $bit_class='' )
	{
		$table_name = '` students_base_info`';
		$cond = '';
		$sql  = '';

		if( !empty( $name ) ){
			$cond = '姓名='."\"$name\"";
		}else{
			$cond = '1 ='."1";
		}

		if( !empty( $school ) ){
			$cond = $cond.' AND 学校='."\"$school\"";
		}
		if( !empty( $grade ) ){
			$cond = $cond.' AND 年级='."\"$grade\"";
		}
		if( !empty( $major )  ){
			$cond = $cond.' AND 专业='."\"$major\"";
		}
		if( !empty( $bit_class ) ){
			$cond = $cond.' AND 比特班级='."\"$bit_class\"";
		}
		
		$sql = 'SELECT * FROM '.$table_name;
		if( !empty($cond) ){
			$sql = $sql.' where '.$cond;
		}

	//	echo $sql;
	//	$this->load->database();
		$res = $this->db->query($sql);
		if( !$res ){
			die(mysql_error());
		}

		return array('res' => true, 'data' => $res->result_array());
	}

	public function insert_student_info($name='bit',$passwd='bit',$school='', $major='',$grade='', $phone='', $email='', $bit_class='', $sex='', $is_read='')
	{
		$table_name = '` students_base_info`';
		$sql='INSERT INTO '.$table_name.' ( `姓名`,	`密码` ,`学校`, `专业`, `年级`, `性别`, `电话`, `邮箱`, `比特班级`, `是否毕业`) VALUES ( ';
		$sql=$sql."'$name'".","."'$passwd'".","."'$school'".","."'$major'".","."'$grade'".","."'$sex'".","."'$phone'".","."'$email'".","."'$bit_class'".","."'$is_read'".')';

		$res = $this->db->query($sql);
		if( !$res ){
			die(mysql_error());
		}
		return $res;
	}
}
//$test= new Student_info_model;
//$test->get_student_info('1', '2', '3', '4');









