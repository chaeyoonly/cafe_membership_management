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
 <center>
<a href ="main.php" target="main">
	<INPUT type=button value="����ȭ������"/>
</a>
</center

<?

	$uid=$_POST['uid'];
	$uname=$_POST['uname'];
	$ssn=$_POST['ssn'];
	$tel=$_POST['tel'];

	
	$conn = mysql_connect ("localhost","root","apmsetup");  //mysql����
	mysql_select_db("project_starbucks",$conn);   //�����
	mysql_query("set names utf8 ");

	$sql = "update PersonInfo set uname='$uname',ssn=$ssn,tel=$tel where uid=$uid";
	mysql_query($sql, $conn) ;        //sql ���� ����.
	
	if($sql)
	{
	echo"<br><center> ���������� ����Ǿ����ϴ�! </center><br>";
	

	}
	else{
	echo" ���� ���� ";
	}

	$result = mysql_query("select * from PersonInfo", $conn);

	$row_count = mysql_num_rows($result);
	$fields_count = mysql_num_fields ($result);

	if ($row = mysql_fetch_array($result)){
	echo "<center><h2>����Ϣ�</h2></center>";
	echo "<center><table border = 1 width = '600'>\n";
	echo "<tr><th>ȸ�� ���̵�<th>�̸�<th>�ֹι�ȣ<th>��ȭ��ȣ</tr>\n";

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
		echo "<center>������ �������� �ʽ��ϴ�</center>";
	}

	mysql_free_result($result);
	mysql_close($conn);  //mysql���� ����		

?>

    </center></div>
</body>
</html>
