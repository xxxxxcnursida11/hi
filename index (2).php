
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body> 
<canvas id="svgBlob"></canvas>
<link rel="stylesheet" href="s.css">
<div class="position">
  <form class="container">
    <form action="login.php"  method="post">
    <div class="centering-wrapper">
      <div class="section1 text-center">
        <div class="primary-header">Welcome back!</div>
        <div class="secondary-header">We're so excited to see you again!</div>
        <div class="input-position">
	  <div class="form-group">
            <label for="email" id="email-txt">Email<span class="error-message" id="email-error"></span></h5>
	    <input type="email" required="true" name="logemail" class="form-style" id="logemail" autocomplete="off" style="margin-bottom: 20px;">
	    <i class="input-icon uil uil-at"></i>
	  </div>	
          <div class="form-group">
            <label for="password" id="pword-txt">Password<span class="error-message" id="password-error"></span></h5>
	    <input type="password" required="true" name="logpass" class="form-style" id="logpass" autocomplete="on">
	    <i class="input-icon uil uil-lock-alt"></i>
	  </div>
        </div>
        <div class="password-container"><a href="#" class="link">Forgot your password?</a></div>
          <div class="btn-position">
          <a href="login.php" class="btn">Login</a>
          <a href="sign ups.php" class="link">Register an Account</a>
        </div>
      </div>
      <div class="horizontalSeparator"></div>
      <div class="qr-login">
        <div class="qr-container">
          <img class="logo" src="h.png"/>
          <canvas id="qr-code"></canvas>
        </div>
        <div class="qr-pheader">Log in with QR Code</div>
        <div class="qr-sheader">Scan this with the <strong>scanner app </strong>to log in instantly.</div>
      </div>
    </div>
  </form>

</div>
<script>
    function validate() {
        var $valid = true;
        document.getElementById("email-txt").innerHTML = "";
        document.getElementById("pword-txt").innerHTML = "";
        
        var userName = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("email-txt").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("pword-txt").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }
    </script>
</body>
</html>