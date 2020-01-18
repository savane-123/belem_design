<?php include("header.php"); ?>
 <head><link href="footer.css" rel="stylesheet" type="text/css" href=""> </head>     
<form action="#" style="color:blue" method="post">
<div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" id="nom" placeholder="Entre le nom" name="nom" required="Entrer votre nom"/>
    </div>
    <div class="form-group">
      <label for="prenom">Prenom:</label>
      <input type="text" class="form-control" id="prenom" placeholder="Entrer le prenom" name="prenom" required="Entrer votre prenom"/>
    </div>
    <div class="form-group">
      <label for="telephone">Telephone:</label>
      <input type="text" class="form-control" id="telephone" placeholder="Entrer le nummero de telephne" name="telephone" required="Entrer le nummero de telephone"/>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Entrer le  email" name="email" required="Entrer votre Email"/>
    </div>
    <div class="row">
      <div class="col-sm-6">
    <div class="form-group">
      <label for="address">Address: </label>
      <textarea placeholder="Entrer votre address" rows="4" cols="50" id="address" name="address" required="Entrer votre address"></textarea>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label for="commentaire">commentaire: </label>
      <textarea placeholder="Entrer votre commentaire" rows="4" cols="50" id="commentaire" name="commentaire" required="Entrer ce que vous desirez"></textarea>
    </div>
  </div>
</div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> me souvenir</label>
    </div>
    <button type="submit" class="btn btn-success" >Envoyer</button>
    <button type="reset" class="btn btn-success" >Annuler</button>
  </form>
</div>
<?php
 //Connect to database
     if($_SERVER["REQUEST_METHOD"]=="POST")
    {
     if(isset($_POST['nom']))
    {
        if(empty($_POST['nom']) or empty($_POST['prenom']) or empty($_POST['telephone']) or empty($_POST['email']) or empty($_POST['address']) or empty($_POST['commentaire']))
        {
          echo "Remplicez toutes les fenetres SVP";
        }
        else{
      @$nom=$_POST['nom'];
      @$prenom=$_POST['prenom'];
      @$telephone=$_POST['telephone'];
      @$email=$_POST['email'];
      @$address=$_POST['address'];
      @$commentaire=$_POST['commentaire'];
      if(empty($_POST["nom"])){$nameerr="Missing!!!";}
      else{
          $nom=$_POST["nom"];
      }
      $nom = mysqli_real_escape_string($con, $_POST['nom']);
     $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
     $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
     $commentaire = mysqli_real_escape_string($con, $_POST['commentaire']);
      $query="SELECT * FROM contact WHERE telephone='$telephone' or email='$email'";
      $ex=mysqli_query($con,$query);
      $no=mysqli_num_rows($ex);
      if ($no > 0) {
        echo "This email ".$email." or Phone number ".$telephone." is exist";

      }else{
      $query="INSERT INTO contact(nom,prenom,telephone,email,commentaire,Address) VALUES('$nom','$prenom','$telephone','$email','$commentaire','$address')";
      $result=mysqli_query($con,$query) or die("connection to the table failled");
    }
    }
  }
 }
     session_write_close($con);
     ?>
     <footer class="footer-basic-centered">

      <p class="footer-company-motto">Belem design <br/>
                 Email: belemedesign@gmail.com <br/>
         Telephone: 00225 05 01 30 60/07 30 60 40  
        </p>

       
      <p class="footer-company-name">Croyez nous vous faite la difference  &copy; 2018</p>

    </footer>
<script src="../js/bootstrap.min.js"></script>
 <script src="../js/jquery.min.js"></script>
</body>
</html>