<html>
<meta http-equiv="Content-Type" content="text/html; charset=KSC5601;" />
 <head>
  <TITLE> ����Ÿ���� ȸ��ī�� ���� ���α׷��� </TITLE>
  <style type="text/css">
<!--
body {
	background-color:#FFD9EC;
	
}
div {
	width: 850px; 
	border :solid;text-align: center;
	border-color:#D9418C; margin:6px; color:black; font-size: 20pt; font-family:'�޸հ��';
 }
-->
</style></head>
 </head>
 <body>
 <div>
<h2>����Ÿ���� ȸ��ī�� ���� ���α׷���</h2>
</div>

<center>
<a href ="main.php" target="main">
	<INPUT type=button value="����ȭ������"/>
</a>
</center>

 <table align=center border=2>
	<tr align=center height=50>
	<th>���̵�</th>&nbsp;
	<th>�󸶳� ���</th>&nbsp;
	<th>ȸ�� ī�� ���</th>&nbsp;
	</tr>
<?
	$conn = mysql_connect ('127.0.0.1','root','apmsetup');  //mysql����
	mysql_select_db("project_starbucks",$conn);   //�����
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
	mysql_close($conn);  //mysql���� ����

	echo "
	</table>
	";
?>

 </body>
</html>