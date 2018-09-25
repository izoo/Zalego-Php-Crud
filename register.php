<?php
require_once('db_config.php');
 $error = array();
if(isset($_POST['first']) && isset($_POST['last']) && isset($_POST['pass']) && isset($_POST['username']))
{
  $first = $user->testinput($_POST['first']);
  $last = $user->testinput($_POST['last']);
  $username = $user->testinput($_POST['username']);

  $pass = $user->testinput($_POST['pass']);


  if(!empty($first) && !empty($last)  && !empty($username)   && !empty($pass))
  {
   
    
    if(!ctype_alpha($first))
    {
        $error[]="Invalid Firstname,can only contain alphabetic characters";
    }
    else if(strlen($first)<3)
    {
        $error[]="Firstname Too short";
    }
     else if(!ctype_alpha($last))
    {
        $error[]="Invalid Lastname,can only contain alphabetic characters!!!!";
    }
    else if(strlen($last)<3)
    {
        $error[]="Lastname Too short!!!!";
    }
    else if(!ctype_alpha($username))
    {
        $error[]="Invalid Lastname,can only contain alphabetic characters!!!!";
    }
    else if(strlen($username)<3)
    {
        $error[]="Lastname Too short!!!!";
    }
    else if(strlen($pass)<7)
    {
      $error[]  = "Password Too Short";
    }
   
    
    else if($user->user_register($first,$last,$username,$pass))
    {
      echo "ok";
    }
    
    
    
    
  }
  else
  {
     $error[]="Fill in All The Fields First";
  }
}
else
{
    ?>
    <div class="alert alert-danger w3-padding-16 w3-win-phone-red alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong class="w3-text-red ">Not All Fields Are Set Set Them First</strong> 
</div>
    <?php
}
    foreach($error as $err)
      {
        ?>
         <div class="alert alert-danger  w3-padding-16 w3-win-phone-red alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?php echo $err ;?></strong> 
</div>
        <?php
      
    }
?>