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
 <h1><b>회원 정보를 수정할 아이디를 선택하세요!</b></h1>
</center>

<?

	$conn = mysql_connect ('127.0.0.1','root','apmsetup');  //mysql접속
	mysql_select_db("project_starbucks",$conn);   //디비선택
	mysql_query(" set names utf8 ");
	
	
	$sql = "select uid from PersonInfo
			where exists(select *
						from Membership_Card
						where card_num is not null);";
	$result = mysql_query($sql, $conn);

	$row_count = mysql_num_rows($result);
	$fields_count = mysql_num_fields ($result);
	$row_count = mysql_num_rows($result);
	$fields_count = mysql_num_fields ($result);

?>

<form name='PHP' method=post action='update_info.php'>
	 <table align=left border=2>
		<tr align=left height=50>
		<th>회원 아이디 </th>&nbsp;
		</tr>

<?
	if ($row = mysql_fetch_array($result)){
		for ($a = 0; $a < $row_count; $a++) {
			echo "<tr>";
			for ($b = 0; $b < $fields_count; $b++) {
				$data = mysql_result($result, $a, $b); 
				echo "	
				<td><a href =update_info.php target=main> 
				<INPUT  type=submit name='uid' value=$data> 
				</a></td>";  
			}
			echo "</tr>";
		}
	}
	mysql_close($conn);  //mysql접속 종료

	echo "
	</table>
	</form>
	";
?>
 </body>
 </html> 
