<!DOCTYPE html>
<html>
<head>
</head>
<?php
/**
 * Created by PhpStorm.
 * User: hb
 * Date: 16/3/10
 * Time: 下午2:29
 */

require_once("mysql_db_api.php");
$name = $_POST["name"];
$passwd = $_POST["passwd"];

//for debug
//$name="hmm";
//$passwd="123456789";
if( $name != "" && $passwd != ""){
	$res = is_allow_login($name, $passwd);
	if($res){
		print_r($res);
		echo "success\n";
	}else{
		echo "login failed\n";
	}
}
?>
<body>
<h1>login</h1>
</body>
</html>
