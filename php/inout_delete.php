<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=KSC5601;" />
<title>����Ÿ���� ȸ��ī�� ���� ���α׷���</title>
 </head>
<body bgcolor="#FFD9EC">
 <BR><BR><BR><BR><BR>

<div style="width: 850px; border :solid;text-align: center;
 border-color:#D9418C; margin:6px; color:black; font-size: 20pt; font-family:'�޸հ��';">
		<h2>����Ÿ���� ȸ��ī�� ���� ���α׷���</h2>
</div>
<center>
<a href ="main.php" target="main">
	<INPUT type=button value="����ȭ������"/>
</a>
</center

<form name='PHP' method=post action='inout_yes.php'>
 <center>
 <h1>�����Ͽ����ϴ�!</h1>
 <table border=2 >
 <tr>
 <td align=center><h4>ȸ�� ���̵�</h4>&nbsp;

 <?

	$conn = mysql_connect ('127.0.0.1','root','apmsetup');  //mysql����
	mysql_select_db("project_starbucks",$conn);   //�����
	mysql_query(" set names utf8 ");

	$uid = $_POST['uid'];

	$sql = "delete from Charge_Return where uid =$uid";
	$result = mysql_query($sql, $conn);

?>


<table align=center border=2>
	<tr align=center height=50>
	<th>ȸ�� ���̵� </th>&nbsp;
	<th>����/��ȯ</th>&nbsp;
	<th>����/ī��</th>&nbsp;
	<th>�ݾ�</th>&nbsp;
	<th>��¥</th>&nbsp;
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
	mysql_close($conn);  //mysql���� ����

	echo "
	</table>
	";
?>

 </body>
</html>