<?php
session_start(); 
require_once("mail/PHPMailerAutoload.php");
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['email'])){
if (empty($_POST['email'])) {
	echo "please enter your user Email";
}else{
	$email=$_POST['email'];
	$con=mysqli_connect('localhost','root','');
    $select=mysqli_select_db($con,'belem');
    $query="SELECT * FROM login WHERE email='$email'";
    $ex=mysqli_query($con,$query);
    $name;
    $Username;
    while ($data=mysqli_fetch_array($ex)) {
    $Email=$data['email'];
    $Username=$data['username'];
    echo $Email."<br>";
    }
    $no=mysqli_num_rows($ex);
    if ($no > 0 and $email==$Email ) {
      $number=mt_rand();
      echo $number;
      $_SESSION["opt"]=$number;
      $_SESSION["email"]=$email;
      $_SESSION['username']=$Username;
      $mail = new PHPMailer;
					//$mail->SMTPDebug = 3;
					$mail->isSMTP();
					$mail->Host = 'smtp.gmail.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'mazadiproject1993@gmail.com';
					$mail->Password = 'hosam7asko77';
					$mail->SMTPSecure = 'tls';
					$mail->Port = 587;
					$mail->setFrom('mazadiproject1993@gmail.com','Mazadi');
					$mail->addAddress($Email);
					$mail->addReplyTo('mazadiproject1993@gmail.com');
					$mail->isHTML(true);
					$mail->Subject = 'Reset Password';
					$mail->Body ='<a href="https://ibb.co/VWmHM3n"><img src="https://i.ibb.co/WWtDBs8/image-slider-5.jpg" alt="image-slider-5" border="0"></a></br><hr><br>
						 The  Opt  is <font size="5" color="blue"> '.$number.' </font> plase dont Forget Agane <br>
						 <font size="2" color="red"> This project design by mohammed savane</font>';
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
					if($mail->send()){
							       header("Location:confopt.php");
  		 							exit;
					}else{
						echo "<br/>"."Email not send ";
					}

    }else{
    echo "login failed";
    }
}
}
 ?>
 <html>
<body>
 <form action="#" method="post" class="from" name="form1" onsubmit="return validate()">
   <p>Email:</p><input type="email" name="email" id="email" placeholder="enter your email" />
   <br/>
    <input type="submit" name="submit" value="SUBMIT"/> 
    </form>
</body>
<html>