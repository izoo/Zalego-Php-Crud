<?php
class USER
{
	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
		public function testinput($data)
	{
		$data = htmlspecialchars($data);
		$data=stripslashes($data);
		$data=trim($data);
		return $data;

	}
	public function user_register($first_name,$last_name,$user_name,$pass)
	{
		try
		{
			$new_password = MD5($pass);
			$stmt2=$this->db->prepare("SELECT * FROM users_content WHERE user_name=:user");
			$stmt2->bindParam(":user",$user_name);
			$stmt2->execute();
			if($stmt2->rowCount()>0)
			{
				?>
				<div class="animated swing alert alert-danger alert-dismissal w3-win-phone-red w3-padding-16">
				 <?php echo $user_name  ?>  username already exists try different one
				</div>
				<?php
			}
			else
			{
			$stmt = $this->db->prepare("INSERT INTO users_content(first_name,last_name,user_name,password)
		                                               VALUES(:first_name,:last_name,:user_name,:pass)");

			$stmt->bindparam(":first_name", $first_name);
			$stmt->bindparam(":last_name", $last_name);
			$stmt->bindparam(":user_name", $user_name);
			$stmt->bindParam(":pass",$new_password);



			$stmt->execute();

			return $stmt;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function login($username,$upass)
	{
		try
		{
			$stmt = $this->db->prepare("SELECT * FROM users_content WHERE user_name=:ema LIMIT 1");
		    $stmt->bindParam(":ema",$username);
			$stmt->execute();
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				if($userRow['password']==MD5($upass))
				{
					$_SESSION['user_session'] = $userRow['user_name'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function logout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>
