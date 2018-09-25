<?php
require_once('db_config.php');
if(!$user->is_loggedin())
{
    $user->redirect('login.php');
}
  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE user_name =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
	
?>
<!DOCTYPE HTML>
<head>
	<title>USER | PORTAL</title>
	<?php
	require_once('head.html');
	?>
   <style type="text/css">
            a
            {
                text-decoration:none;
            }
			     					.w3-allerta {
  font-family: "Allerta Stencil", Sans-serif;
}
 #tabs-content .profile
{
    display: none;
    position: relative;
}
            </style>
</head>
<body>
	<section class="w3-padding-16">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 w3-card-8 w3-black w3-card-24 w3-hover-shadow">
			<div class="row">
				<div class="col-sm-3 col-md-3 col-lg-3 w-padding-16 w3-rightbar">
					<h1 class="w3-xlarge w3-slim w3-margin-left">Welcome Client <span class="w3-text-green;"><?php echo $results['first_name'] ." " . $results['last_name']?></span></h1>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 w-padding-16 w3-rightbar w3-transparent w3-bottombar">
					<h1 class="w3-xlarge w3-text-white w3-slim w3-padding-left">Zalego Interview</h1>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-3 w3-margin-top w-padding-16">
					 <div class="dropdown pull-right w3-margin-right">
  <i class="dropdown-toggle" type="button" data-toggle="dropdown">
	<img src="img/img_avatar14.png" class="img-circle" height="40px">
  
</div> 
				</div>
			</div>	
			</div>
		</div>
	</section>
	<section>
		<div class="row  w3-padding-16 w3-card-8">
			
		<div class="row">
            <div class="col-sm-4 col-lg-4">
                <ul class="w3-ul">
                     <li><a class="w3-text-white btn btn-primary" href="logout.php?logout=true">Logout</a></li>
                </ul>
                
            </div>
             <div class="col-sm-8 col-lg-8">
              <table class="table table-hover table-responsive">
                <tr>
                    <td>First Name</td>
                                        <td>Last Name</td>

                    <td>Username</td>

                </tr>
                <tr>
                    <td><?php echo $results['first_name']?></td>
                    <td><?php echo $results['last_name']?></td>
                    <td><?php echo $results['user_name']?></td>
                </tr>
              </table>
                
            </div>
        </div>
		</div>
	
	</section>
 

</body>
</html>