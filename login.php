<?php
//$password="password";
//echo md5($password);
require_once('db_config.php');
if($user->is_loggedin()!="")
{
	 $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
    if($results['email'] =="admin@auction.co.ke")
    {
        $user->redirect('auction_dashboard.php');
    }
    else
    {
        $user->redirect('user_dashboard.php');
    }
    
}
?>
<!DOCTYPE HTML>
	<html>
		<head>
			
  <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/sweetalert.css">
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/fonts.css" media="all" />
	<!--========================================== -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/select2/select2.min.css">
	
		<!-- =====================================
			Some of extra effict css
		========================================== -->	
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/owl.theme.css">
		
		<link rel="stylesheet" type="text/css" href="css/hover.css" media="all" />

		<link rel="stylesheet" type="text/css" href="css/animate.css" media="all" />
		</head>
		<body>
			<div class="limiter">
				<h4 class="header_text w3-bottombar">ZALEGO USER LOGIN PANEL</h4>
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/img_avatar14.png" alt="IMG">
				</div>

				<form id="loginForm" class="login100-form validate-form">
					<span class="login100-form-title">
						<a href="index.php">Register Here</a>
					</span>
					<span class="login100-form-title">
						Member Login
					</span>
<div id="error"></div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button id="login_button" type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
			<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					//alert("YOU ARE GOOD TO GO");
					                $("#loginForm").on('submit',(function(e)
																{
																	e.preventDefault();
																	$.ajax({
																		url:"logged.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
																		success:function(data)
																		{
																			//$("#return-data").html(data);
																			if (data=="OK") {
                                                                                //code
																				 $("#login_button").html('<img src="img/ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "user_dashboard.php"; ',3000);
                                                }
																		else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');
						$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
					});
				}
																		}
																		
																	
																	});
				}));
				});
			</script>
		</body>
	</html>