

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Civilisation'17 | CEG</title>
    <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="../tab-logo.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="assets/signup-form.css" type="text/css" />
  <link rel="stylesheet" href="../style.css"> 
  <link rel="stylesheet" href="style.css"> 
</head>

<body>
<header class="container-fluid bg-4 text-center"> 
              <div class="footer-content text-center">
                    <span class="logo">
                            <a href="../index.html"><img src="../logo.png"/></a><br \><br \>
                            <button class="col-2 btn home btn-info" onclick="location.href='../index.html'">Home</button>
                        </span>
            </div>

</header>
<hr class="primary header">

	<div class="container">
        <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
          <div class="panel-heading">
            <h3 class="">CIVILISATION'17</h3>
            <hr>
            </div>
<?php

include "connect.php";
echo "sakthi";
session_start();
if(isset($_POST['submit']))
        {

				echo $_POST['email'];
				$email_id=$_POST['email'];
                
                $q=mysqli_query($con,"select * from students where  email='$email_id'   ")or die(mysqli_error($con));
                $user_id;
				$password;
				while($row=mysqli_fetch_assoc($q))
				{
					$user_id=$row['user_id'];
					$password=$row['password'];
				}
				/* userid and password is sent to mail*/
		
		
		}
else
	{			

?>
<form action="forget_passsword.php" method="POST">

<input name="email" type="email"  placeholder="registered email id">

<input  type="submit" name="submit" value="submit">

</form>

<?php

	}
?>
           
		   <div class="row">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<hr class="primary bottom">
<footer class="container-fluid bg-4 text-center"> 
              <div class="footer-content">
                    <p>Privacy Policy | Contact INDIA</p>
                    <p>Copyright © Civilisation 2017. All rights are reserved.</p>
                    <small><p>designed by <i><b>Civilisation Team</b></i></p></small>
            </div>

</footer>
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/jquery-1.11.2.min.js"></script>
    <script src="assets/jquery.validate.min.js"></script>
    <script src="assets/register.js"></script>
    <script type="text/javascript">
      $(function() {

    $('#login-form-link').click(function(e) {
      $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});

    </script>

</body>
</html>
