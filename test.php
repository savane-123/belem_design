<?php session_start() ;

if (isset($_SESSION['email'])) {
  header("location:adminpage.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LOGING PAGE</title>

<style type="text/css">
/* CSS Document */
div.shadow{width: 500px;
  height: 500px;
  margin-bottom: 40px;
  margin-left: 500px;
  margin-top: 120px;
  border-radius: 10%;
  background-color:#FFFFFF;
  border:#FFFFFF}

.fristtext{
  text-align:justify;
  margin-left: 190px;
  font-family: 'Boogaloo', cursive;
  font-size: 60px;
  }
  .img{
    padding-left: 30px;
  }

body{
  background-color: #FF7AA7;


}
p{
  size: 5px;
  font-size: 16px;
}
.from{
  margin-left: 200px;
  

}
 </style>
</head>
<body>
<?php
     function test_input($data)
     {
       $data=trim($data);
       $data=stripslashes($data);
       $data=htmlspecialchars($data);
       return $data;
     }
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 if(isset($_POST['email']) or isset($_POST['password']))
 {
  if (empty($_POST['email']) or empty($_POST['password'])) {
    echo "error in insert";
  }else{
    @$email=test_input($_POST["email"]);
    @$pass=$_POST['password'];
    @$password=sha1($pass);
    $con=mysqli_connect('localhost','root','');
    $select=mysqli_select_db($con,'belem');
    $query="SELECT * FROM login WHERE email='$email' AND password='$password'";
    $ex=mysqli_query($con,$query);
    while ($data=mysqli_fetch_array($ex)) {
    @$email=$data["email"];
    @$pass=$data["password"];
    }
    $no=mysqli_num_rows($ex);
    if ($no > 0) {
      echo "<br>login done";
      $_SESSION['email']=$email;
      header("location:adminpage.php");
    }else{
    echo "login failed";
    }
       mysqli_close($con); 
  }
  }else{
   echo "reuired faild are missing"; 
  }    
}

  
 ?>  
<div class="shadow">
<center>

  <h1 class="fristtext" >LOGIN</h1>

</center>
 <center>
  <img src="../img/adm.png" width="200"  height="110" class="img" />
</center>
<br/>
  <form action="#" method="post" class="from" name="form1">
   <p>Email:</p><input type="email" name="email" id="email"/>
 
   <p>PASSWORD:</p><input type="password" name="password" id="password"   min="6" required="required"/><br/>
   <br/>
    <input type="submit" name="submit" value="SUBMIT"/> 
    <input type="reset" name="cancel" value="CANCEL" />
      <br />
      
      <a href="sendopt.php">
        <input type="button" value="Forgot password"/>
      </a>
  </form>
  </div>
  <footer class="footer-basic-centered">

      <p class="footer-company-motto">Belem design <br/>
                 Email: belemedesign@gmail.com <br/>
         Telephone: 00225 05 01 30 60/07 30 60 40  
        </p>

       
      <p class="footer-company-name">Croyez nous vous faite la difference  &copy; 2018</p>

    </footer>
</body>
</html>