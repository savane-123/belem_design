<? include("header.php"); 
?>
   <?php
   if(!isset($_SESSION['email'])) {
  header("location:test.php");
}?>
   <div class="row">
      <div class="col-sm-6">
     <div class="container"> 
     
      <?php
     $query="select * from contact order by numero ";
     $result=mysqli_query($con,$query) or die("connection to the table failed");
     ?>
     </div>
     </div>
     </div>
     <div class="row">
      <div class="col-sm-6">
     <div class="container"> 
       <ul>
       	   <?php 
       	       while($data=mysqli_fetch_array($result)) 
       	     {?> 
                
       	    <li><?php echo $data['nom'];?> : <?php echo $data['prenom']; ?>
       	    	: <?php echo $data['telephone']; ?>
       	    </li>
          <?php   } ?>
       </ul>
     </div>
 </div>
</div>
<footer class="footer-basic-centered">

      <p class="footer-company-motto">Belem design <br/>
                 Email: belemedesign@gmail.com <br/>
         Telephone: 00225 05 01 30 60/07 30 60 40 <br> 
         <?php
         $email=$_SESSION['email'];
         echo $email;
         ?>
        </p>

       
      <p class="footer-company-name">Croyez nous vous faite la difference  &copy; 2018</p>

    </footer>
<script src="../js/bootstrap.min.js"></script>
 <script src="../js/jquery.min.js"></script>
</body>
</html>