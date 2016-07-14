<?php
/**
 * Created by PhpStorm.
 * User: hb
 * Date: 16/3/10
 * Time: 下午2:29
 */
    //$data=name,pwd,...,bit_class
	function exe_sql($sql){
		$servername="localhost";
		$username="student";
		$passwd="123456";
		$db="bit";
		$conn=mysqli_connect($servername, $username, $passwd, $db);
        if(mysqli_connect_errno($conn)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return false;
        }
        $res = mysqli_query($conn, $sql);
		mysqli_close($conn);
		return $res;
	}

    function insert_data( $data ){
        $sql="INSERT INTO student_base_info (name, passwd, phone, email, school, grade, major, bit_class, time) VALUES "."("."$data".",now()".")";
		//echo $sql;
		return exe_sql($sql);
    }

    function is_allow_login($name, $passwd){
		$sql = "SELECT * FROM student_base_info WHERE name='$name' AND passwd='$name'";
		return exe_sql($sql);
    }
	//insert_data("'1','1','1','1','1','1','1','1'");

