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

<?php

echo "

<body>
 <br/><br/><br/><br/><br/>
<div>
<h2>♡스타벅스 회원카드 관리 프로그램♡</h2>
</div>

 <form name='PHP' method=post action='insert_yes.php'>

 <h1><b>충전/반환 정보를 입력하세요.</b></h1>
 <table border=2 >
 <tr>
 <td align=center><h4>회원 아이디</h4>&nbsp;
 <INPUT  type=text name='uid'  size=20/>
 </td>
 <td align=center>  <h4>이름</h4> &nbsp; 
<INPUT  type=text name='uname'  size=20/>
 </td>
 <td align=center>  <h4>주민번호</h4> &nbsp; 
 <INPUT  type=text name='ssn'  size=20/>
  </td>
 <td align=center> <h4>전화번호</h4> &nbsp;
 <INPUT  type=text name='tel'  size=20/>
  </td>
  </tr>

 <tr>
 <td colspan =4>
 <center><input type='submit' name='save' value='저장'/> </center></td>
 </tr>

 </table> 
 </form></body> ";
 ?>

 </html> 


