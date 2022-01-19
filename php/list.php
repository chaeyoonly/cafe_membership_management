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
 <?

	$conn = mysql_connect ('127.0.0.1','root','apmsetup');  //mysql접속
	mysql_select_db("project_starbucks",$conn);   //디비선택
	mysql_query(" set names utf8 ");
	
	$sql = "select * from PersonInfo;";
	$result = mysql_query($sql, $conn);

	$row_count = mysql_num_rows($result);
	$fields_count = mysql_num_fields ($result);
	
?>

 <div>
<h2>♡스타벅스 회원카드 관리 프로그램♡</h2>
</div>

 <table border=2>
	<tr align=center height=50>
	<th>회원 아이디 </th>&nbsp;
	<th>이름</th>&nbsp;
	<th>주민번호</th>&nbsp;
	<th>전화번호</th>&nbsp;
	</tr>
			
<?php			
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

<a href ="main.php" target="main">
	<INPUT type=button value="메인화면으로"/>
</a>


 </body>
</html>