<html>
<meta http-equiv="Content-Type" content="text/html; charset=KSC5601;" />
 <head>
  <TITLE> ♡스타벅스 회원카드 관리 프로그램♡ </TITLE>
  <style type="text/css">
<!--
body {
	background-color:#FFD9EC;
	
}
div {
	width: 850px; 
	border :solid;text-align: center;
	border-color:#D9418C; margin:6px; color:black; font-size: 20pt; font-family:'휴먼고딕';
 }
-->
</style></head>
 </head>
<body>

<div>
	<h2>♡스타벅스 회원카드 관리 프로그램♡</h2>
</div>
 <center>
<center>
<a href ="main.php" target="main">
	<INPUT type=button value="메인화면으로"/>
</a>
</center
<?
	
	$uid=$_POST['uid'];
	$card_num=$_POST['card_num'];
	$pw=$_POST['pw'];
	$balance=$_POST['balance'];

	$conn = mysql_connect ("localhost","root","apmsetup");  //mysql접속
	mysql_select_db("project_starbucks",$conn);   //디비선택
	mysql_query(" set names utf8 ");

	$sql = "insert into Membership_Card(uid,card_num,pw,balance)";
	$sql.= "values('$uid', '$card_num', '$pw', '$balance')";
	mysql_query($sql, $conn) ;        //sql 질의 수행.
	
	if($sql)
	{
	echo"<br><center> 성공적으로 저장되었습니다! </center><br>";

	}
	else{
	echo" 저장 실패 ";
	}

	$result = mysql_query("select * from Membership_Card", $conn);

	$row_count = mysql_num_rows($result);
	$fields_count = mysql_num_fields ($result);

	if ($row = mysql_fetch_array($result)){
	echo "<center><h2>★카드 목록★</h2></center>";
	echo "<center><table border = 1 width = '600'>\n";
	echo "<tr><th>회원 아이디<th>카드 번호<th>비밀 번호<th>잔액</tr>\n";

	for ($a = 0; $a < $row_count; $a++) {
		echo "<tr>";
		for ($b = 0; $b < $fields_count; $b++) {
			$data = mysql_result($result, $a, $b); 
			echo "<td>$data </td>";  
		}
		echo "</tr>";
	}

	echo "</table></center>\n";
	}
	else {
		echo "<center>내용이 존재하지 않습니다</center>";
	}

	mysql_free_result($result);
	mysql_close($conn);  //mysql접속 종료		

?>

    </center></div>
</body>
</html>
