<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Connexion</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min1.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Connectez-Vous</h2>
		<span  id="error_message" ></span>
		<form id="login_form_admin" action="" method="post">
           
			<div class="username">
				<span class="username">Email:</span>
				<input type="text" name="email" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Mot de passe:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			
			<div class="login-w3">
					<input type="submit" class="login" value="connectez">
			</div>
			<div class="clearfix"></div>
		</form>
		<div class="back">
						<a href="../index.php">Retour a la page d'acceuil</a>
				</div>
				<div class="footer">
					
				</div>
	</div>
	</div>
	</div>
	<script>
    $(document).ready(function(){
    $('#login_form_admin').on('submit', function(event){
        
    event.preventDefault();
    $.ajax({
    url:"check_login_admin.php",
    method:"POST",
    data:$(this).serialize(),
    success:function(data){
        if(data !='')
        {
           
        
        $('#error_message').html(data);
        }
        else
        {
           
            window.location.href = "dashboard.php"; 
			
            


        }
    }
    })
    })
})
	</script>
</body>
</html>