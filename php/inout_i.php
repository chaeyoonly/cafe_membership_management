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
 <h1><b>ī�带 ����/��ȯ�� ���̵� �����ϼ���!</b></h1>
</center>

<?

	$conn = mysql_connect ('127.0.0.1','root','apmsetup');  //mysql����
	mysql_select_db("project_starbucks",$conn);   //�����
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

<form name='PHP' method=post action='inout_info.php'>
	 <table align=left border=2>
		<tr align=left height=50>
		<th>ȸ�� ���̵� </th>&nbsp;
		</tr>

<?
	if ($row = mysql_fetch_array($result)){
		for ($a = 0; $a < $row_count; $a++) {
			echo "<tr>";
			for ($b = 0; $b < $fields_count; $b++) {
				$data = mysql_result($result, $a, $b); 
				echo "	
				<td><a href =inout_info.php target=main> 
				<INPUT  type=submit name='uid' value=$data> 
				</a></td>";  
			}
			echo "</tr>";
		}
	}
	mysql_close($conn);  //mysql���� ����

	echo "
	</table>
	</form>
	";
?>
 </body>
 </html> 
