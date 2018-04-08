<html>
<head>
<link rel="icon" href="image/logo.png">
<link rel="stylesheet" href="styles/styles.css">
<title>Sistem Jual Buku</title>
<style>
.konten {
font-size:17px;
}
.konten input[type=text],input[type=password] {
  padding: 3px;
  font-size: 17px;
  border: 1px solid #ccc; 
  width:70%;
}
.konten input[type=submit],input[type=reset]
{
  padding: 3px;
  font-size: 17px;
  border: 1px solid #fff; 
  width:34%;
  background-color:#39B4E9;
  color:#FBFBFB;
  border-radius:5px;
  transition:.3s ease-in;
}
.konten input[type=submit]:hover,input[type=reset]:hover{
  padding: 3px;
  font-size: 17px;
  width:34%;
  background-color:#2FA4D7;
  color:#E8E8E8;
  border-radius:5px;
}
@media screen and (max-width:600px){
.konten{

  font-size: 13px;
}
}
</style>
<script>
function validasilogin(){
var username=formlogin.Username.value;
var password=formlogin.Password.value;
if (username==""){
alert('Username Masih Kosong !');
formlogin.Username.focus();
return false;
}
if (password==""){
alert('Password Masih Kosong !');
formlogin.Password.focus();
return false;
}
}
</script>
</head>
<body>
<div class="topnav">
  <a  href="index.php">Home</a>
  <a class="active" href="login.php">Login</a>
</div>
<div id="kotak">
<center>
   <img src="image/garisbuku.png" class="logo"></center>
<div  class="konten" style="text-align:center;">
  <h1 style="color:#4FB6F0;">Halaman Login</h1>
  <div id="bingkai">
  <form onSubmit="return validasilogin();" name="formlogin" method="post" action="proseslogin.php">
  
<table style="margin-left:5%;" width="80%">
    <tr>
    <td width="45%" align="right" >Username :</td>
    <td align="left"><input type="text" name="Username"></td>
    	</tr>
        <tr>
        <td align="right">Passsword :</td>
        <td align="left" ><input type="password" name="Password"></td>
        </tr>
        <tr>
        <td></td>
        <td align="left"><input type="submit"  value="Login">
        	<input type="reset" value="Batal"></td>
        </tr>
</table>
</form>
</div>
	</div>
	</div>
<div class="footer">&copy; Anthony Lee - Jual Buku 2018</div>
</body>
</html>
