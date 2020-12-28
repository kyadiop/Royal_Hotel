<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:home.php");  
 }  
 
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SUN RISE ADMIN</title>
  
      <link rel="stylesheet" href="css/style.css">
</head>
<style>
  #login form input[type="submit"] {
    /* border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px; */
    background-color: #dd3d3d;
    color: #eee;
    font-weight: bold;
    margin-bottom: 2em;
    text-transform: uppercase;
    width: 280px;
}
#login form input[type="text"], input[type="password"] {
  background-color: white;
  border-radius: 0px 10px 10px 0px;
  color: #606468;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 230px; 
  border:solid 1px #dd3d3d ;
}
#login form span {
  background-color:#dd3d3d ;
  border-radius: 10px 0px 0px 10px;
  color: #606468;
  display: block;
  float: left;
  height: 50px;
  line-height: 50px;
  text-align: center;
  width: 50px;
}
#hr{
  background-color:#dd3d3d; 
  font-size:100px;
}

</style>

<body style="background-color:white;">

  <!-- <div id="clouds">
	<div class="cloud x1"></div>
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div> -->

 <div class="container">


      <div id="login">


        <form method="post">

          <fieldset class="clearfix">
            <p><span class="fontawesome-user"></span><input type="text"  name="user" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span><input type="password" name="pass"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            <p><input type="submit" name="sub"    id="submit" value="SE CONNECTER" style="border-radius:30px;"></p>
          </fieldset>
        </form>
        <hr id="hr">

      </div> <!-- end login -->


    </div>

    <div class="bottom"><img src="assets/img/moi.png" alt="" style="width:260px;" ></div><br> <br> <br> <br><br> <br> <br> <br>

    <div class="bottom"> <p> <span style="font-family:bolder; font-size:25px; margin:50px;">Se Connecter</span></p>
</div>
    <!-- <div class="bottom">  <h3><a href="../index.php">SUN RISE HOMEPAGE</a></h3></div> -->
  
</body>
</html>

<?php
   include('db.php');
  
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['user']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
      
      $sql = "SELECT id FROM login WHERE usname = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;
         
         header("location: home.php");
      }else {
         echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
      }
   }
?>
