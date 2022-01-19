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
<a href ="main.php" target="main">
	<INPUT type=button value="메인화면으로"/>
</a>
</center>

 <table align=center border=2>
	<tr align=center height=50>
	<th>아이디</th>&nbsp;
	<th>얼마나 사용</th>&nbsp;
	<th>회원 카드 등급</th>&nbsp;
	</tr>
<?
	$conn = mysql_connect ('127.0.0.1','root','apmsetup');  //mysql접속
	mysql_select_db("project_starbucks",$conn);   //디비선택
	mysql_query(" set names utf8 ");
	

	
	$uid = $_POST['uid'];


	$sqlb = "select distinct balance from Membership_Card where uid = $uid;";
	$result_b = mysql_query($sqlb, $conn);
	$how_much = mysql_result($result_b,0,0);
	
	if($how_much>500000): $grade = 'Gold';
	else: $grade = 'Green';
	endif;

	$sql = "insert into Membership_Grade(uid,how_much,grade)";
	$sql.= "values('$uid', '$how_much','$grade')";
	mysql_query($sql, $conn) ;

	$result = mysql_query("select * from Membership_Grade where uid=$uid", $conn);
	
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