<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=KSC5601;" />
<title>♡스타벅스 회원카드 관리 프로그램♡</title>
 </head>
<body bgcolor="#FFD9EC">
 <BR><BR><BR><BR><BR>

<div style="width: 850px; border :solid;text-align: center;
 border-color:#D9418C; margin:6px; color:black; font-size: 20pt; font-family:'휴먼고딕';">
		<h2>♡스타벅스 회원카드 관리 프로그램♡</h2>
</div>
<center>
<a href ="main.php" target="main">
	<INPUT type=button value="메인화면으로"/>
</a>
</center

<form name='PHP' method=post action='inout_yes.php'>
 <center>
 <h1>삭제하였습니다!</h1>
 <table border=2 >
 <tr>
 <td align=center><h4>회원 아이디</h4>&nbsp;

 <?

	$conn = mysql_connect ('127.0.0.1','root','apmsetup');  //mysql접속
	mysql_select_db("project_starbucks",$conn);   //디비선택
	mysql_query(" set names utf8 ");

	$uid = $_POST['uid'];

	$sql = "delete from Charge_Return where uid =$uid";
	$result = mysql_query($sql, $conn);

?>


<table align=center border=2>
	<tr align=center height=50>
	<th>회원 아이디 </th>&nbsp;
	<th>충전/반환</th>&nbsp;
	<th>현금/카드</th>&nbsp;
	<th>금액</th>&nbsp;
	<th>날짜</th>&nbsp;
	</tr>

<?
	
	$sql = "select * from Charge_Return;";
	$result = mysql_query($sql, $conn);
	
	$row_count = mysql_num_rows($result);
	$fields_count = mysql_num_fields ($result);
	

	for ($a = 0; $a < $row_count; $a++) {
		echo "<tr>";
		for ($b = 0; $b < $fields_count; $b++) {
			$data = mysql_result($result, $a, $b); 
			echo "<td>$data </td>";  
		}
		echo "</tr>";
	}
	mysql_close($conn);  //mysql접속 종료

	echo "
	</table>
	";
?>

 </body>
</html>