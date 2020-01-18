<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['password']) and isset($_POST['password1'])){
if (empty($_POST['password']) or empty($_POST['password1'])) {
	echo "place write in all feild";
}
   else{
	$password=$_POST['password'];
	$password1=$_POST['password1'];
  $username=$_SESSION["username"];
  $email=$_SESSION["email"];
	if($password==$password1) {
    $pass=sha1($password);
		$con=mysqli_connect('localhost','root','');
    $select=mysqli_select_db($con,'belem');
    $query="UPDATE login SET password='$pass' WHERE username='$username' and email='$email'";
    $ex=mysqli_query($con,$query);
    session_unset();
    if($ex) {
    	          header("location:test.php");
    }
    else
     {
    	   echo "password not update";

    }
	  }
  else
	{
		echo "passwords is not match";
	}

}
}
 ?>
   <center>
  <form action="#" method="post" class="from" name="form1" onsubmit="return validate()">
   <p>PASSWORD:</p><input type="password" name="password" id="password"   min="6" required="required"/><br/>
   <p>Conform PASSWORD:</p><input type="password" name="password1" id="password"   min="6" required="required"/><br/>
   <br/>
    <input type="submit" name="submit" value="SUBMIT"/> 
    <input type="reset" name="cancel" value="CANCEL" />
      <br />
      
      <a href="createaccount1.php">
        <input type="button" value="CREATE ACCOUNT"/>
      </a>
  </form>
  <footer class="footer-basic-centered">

      <p class="footer-company-motto">Belem design <br/>
                 Email: belemedesign@gmail.com <br/>
         Telephone: 00225 05 01 30 60/07 30 60 40  
        </p>

       
      <p class="footer-company-name">Croyez nous vous faite la difference  &copy; 2018</p>

    </footer>
</center>