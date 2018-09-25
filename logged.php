<?php
require_once("db_config.php");
if(isset($_POST['user']) && isset($_POST['password']))
{
    $error = array();
    $username = $_POST['user'];
    $password = $_POST['password'];
    if(empty($username) && empty($password))
    {
        $error[]="You must Provide both username and password";
        
    }
    else
    {
        if(strlen($username) < 3)
        {
            $error[] = "Email Too Short";
        }
        else if(is_numeric($username))
        {
            $error[] = "Invalid Username";
        }
        else if($user->login($username,$password))
        {
            //$user->redirect("orphan_administrator.php");
            echo "OK";
        }
        else
        {
            $error[] = "Wrong Username OR Password";
        }
    }
}
else
{
    $error[]="Not All Fields Are Set Try Again Please";
    
}
foreach($error as $err)
{
    ?>
  
        <?php echo $err ; ?>
    
    <?php
}
?>