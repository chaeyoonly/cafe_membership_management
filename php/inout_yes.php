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
	$charge_return=$_POST['charge_return'];
	$cash_card=$_POST['cash_card'];
	$amount=$_POST['amount'];
	$date=$_POST['date'];

		
	$conn = mysql_connect ("localhost","root","apmsetup");  //mysql����
	mysql_select_db("project_starbucks",$conn);   //�����
	mysql_query(" set names utf8 ");

	$sql = "insert into Charge_Return(uid,charge_return,cash_card,amount,date)";
	$sql.= "values('$uid', '$charge_return', '$cash_card', '$amount','$date')";
	mysql_query($sql, $conn) ;        //sql ���� ����.


	$a = $charge_return;
	$str = strcmp($in, $a);
	$am = $amount;

	if($sql)
	{
	echo"<br><center> ���������� ����Ǿ����ϴ�! </center><br>";
		if($str):
			$sql = "update Membership_Card set balance=balance-$am where uid=$uid";
			mysql_query($sql, $conn) ;        //sql ���� ����.
		else:
			$sql = "update Membership_Card set balance=balance+$am where uid=$uid";
			mysql_query($sql, $conn) ;        //sql ���� ����.
		endif;
	}
	else{
	echo" ���� ���� ";
	}

	$result = mysql_query("select * from Charge_Return", $conn);

	$row_count = mysql_num_rows($result);
	$fields_count = mysql_num_fields ($result);

	if ($row = mysql_fetch_array($result)){
	echo "<center><h2>����Ϣ�</h2></center>";
	echo "<center><table border = 1 width = '600'>\n";
	echo "<tr><th>ȸ�� ���̵�<th>����/��ȯ<th>����/ī��<th>�ݾ�<th>��¥</tr>\n";


	
	for ($a = 0; $a < $row_count; $a++) {
		echo "<tr>";
		for ($b = 0; $b < $fields_count; $b++) {
			$data = mysql_result($result, $a, $b);;
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
