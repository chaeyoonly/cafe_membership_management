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
<?

	$conn = mysql_connect ('127.0.0.1','root','apmsetup');  //mysql����
	mysql_select_db("project_starbucks",$conn);   //�����
	mysql_query(" set names utf8 ");
	
	
	$sql = "select * from Membership_Card;";
	$result = mysql_query($sql, $conn);

	$row_count = mysql_num_rows($result);
	$fields_count = mysql_num_fields ($result);
	
?>
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
	<th>ȸ�� ���̵� </th>&nbsp;
	<th>ī�� ��ȣ</th>&nbsp;
	<th>��� ��ȣ</th>&nbsp;
	<th>�ܾ�</th>&nbsp;
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
	mysql_close($conn);  //mysql���� ����

	echo "
	</table>
	";
?>

 </body>
</html>