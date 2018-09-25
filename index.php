<!DOCTYPE HTML>
<html>
    <head>
        <title>ZALEGO| INTERVIEW</title>
        <?php
        require_once('head.html');
        ?>
    </head>
    <body>
        <section>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 w3-black w3-padding-16 w3-card-4">
                    <h1 class="w3-xlarge w3-center w3-bottombar w3-text-white" style="font-family: cursive;">Zalego Interview</h1>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 w3-card-4 w3-padding-16">
                    <h3 class="w3-xlarge w3-center w3-bottombar w3-text-green" style="font-family: cursive;">User Details Registration Form <a href="login.php" class="btn btn-success pull-right">LOGIN HERE</a></h3>
                
                </div>
            </div>
              <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3 w3-card-4 w3-padding-16">
                    
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 w3-card-4 w3-padding-16">
                    <div class="row w3-padding-16 w3-padding-left">
    <form class="col s12" id="registerForm">
			<div class="" id="error"></div>
      <div class="row">
        <div class="input-field col s12">
          <input id="first_name" type="text" name="first" class="validate">
          <label for="first_name">First Name</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <input id="last_name" type="text" name="last" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
	   <div class="row">
        <div class="input-field col s12">
          <input id="username" type="text" name="username" class="validate">
          <label for="username">Username</label>
        </div>
       </div>
        <div class="row">
		 <div class="input-field col s12">
          <input id="pass" type="password" name="pass" class="validate">
          <label for="pass">Password</label>
        </div>
        </div>
      </div>
	   

     <div id="register_success" class="">
			
		 </div>
     <div class="row">
		<div class="col s12">
			<p class="register"><input type="submit" id="register" value="REGISTER" class="my_reg hvr-round-corners w3-green btn-lg btn-block"></p>
		</div>
	 </div>
    </form>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 w3-card-4 w3-padding-16">
                    
                </div>
            </div>
        </section>
        		
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script  src="js/materialize.min.js"></script>
<script src="js/sweetalert.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                //alert('Jquery is Okay');
	$('.materialboxed').materialbox();
	
	$("#registerForm").on('submit',(function(e)
																{
																	e.preventDefault();
																	$.ajax({
																		url:"register.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#error").fadeOut();
				$("#register").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Registering ...');
			},
		success : function(response){						
				if(response=="ok"){									
				 swal("Thanks,You Have Successfully Been Registered", {
                              button: "OK",
                            });
				 $("#modal1").fadeOut('slow');
				 $(".modal").close();
				}				
				else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('&nbsp; '+response+' !');
						$("#register").html('REGISTER');
					});
				}
			}
																	});
																	}));
	
	
	
	
	
	
});
        </script>
    </body>
</html>