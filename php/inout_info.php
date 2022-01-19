<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=KSC5601;" />
<title>♡스타벅스 회원카드 관리 프로그램♡</title>
 </head>
 <body bgcolor="#FFD9EC">
 <BR><BR><BR><BR><BR>


 <?

	$conn = mysql_connect ('127.0.0.1','root','apmsetup');  //mysql접속
	mysql_select_db("project_starbucks",$conn);   //디비선택
	mysql_query(" set names utf8 ");
	
	$sql = "select uid from PersonInfo";
	$result = mysql_query($sql, $conn);

	$row_count = mysql_num_rows($result);
	$fields_count = mysql_num_fields ($result);

	
?>

<div style="width: 850px; border :solid;text-align: center;
 border-color:#D9418C; margin:6px; color:black; font-size: 20pt; font-family:'휴먼고딕';">
		<h2>♡스타벅스 회원카드 관리 프로그램♡</h2>
</div>


<form name='PHP' method=post action='inout_yes.php'>
 <center>
 <h1><b>카드정보를 입력하세요.</b></h1>
 <table border=2 >
 <tr>
 <td align=center><h4>회원 아이디</h4>&nbsp;


 <?

 
 $uid = $_POST['uid'];

 for ($a = 0; $a < $row_count; $a++) {
		for ($b = 0; $b < $fields_count; $b++) {
			$data = mysql_result($result, $a, $b); 
			if($uid == $data): echo "<INPUT type=text name='uid' value=$uid>";
			else: 
			endif;
		}
 }

	
 ?>


 </td>
 <td align=center>  <h4>CHARGE_RETURN</h4> &nbsp; 
 <SELECT name='charge_return' size='1' >
       <option value='in'>충전</option>
       <option value='out'>반환</option>
 </SELECT>
 </td>
 <td align=center>  <h4>CASH_CARD</h4> &nbsp; 
  <SELECT name='cash_card' size='1' >
       <option value='cash'>현금</option>
       <option value='card'>카드</option>
 </SELECT>
  </td>
 <td align=center> <h4>금액</h4> &nbsp;
 <INPUT  type=text name='amount'  size=20/>
  </td>
  <td align=center><h4>날짜</h4>&nbsp;
 <INPUT  type=text name='date'  size=20/>
 </td>
  </tr>

 <tr>
 <td colspan =6>
 <center><input type='submit' name='save' value='저장'/> </center></td>
 </tr>

 </table> </center>
 </form>
 </body>
</html>