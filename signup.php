<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sign up</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="signup.css?v=<?php echo time(); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    </head>

<body>


<?php 
	function reg(){
		$email=$_POST["email"];
		$user=$_POST["user"];
		
		include('db.php');
		$result = mysqli_query($conn,"SELECT * FROM users");
		
		$emails=array();
		$usernames=array();
		while($row = mysqli_fetch_array($result)){
			$emails[]= $row['email'];
			$usernames[]= $row['user_name'];
		} 
		if (!(in_array($email, $emails) || in_array($user, $usernames))){
			return 1;
		}	
		return 0;
	}
	
	$msg_index=0;
	if(isset($_POST["register"])){
		if (reg()){
			$email=$_POST["email"];
			$user=$_POST["user"];
			$pass=$_POST["pass"];
			$first_name=$_POST["first_name"];
            $last_name=$_POST["last_name"];
			
			
			if (strlen($email)>0 && strlen($pass)>0 && strlen($first_name)>0 && strlen($last_name)>0 && strlen($user)>0){
				include('db.php');
				$sql= "INSERT INTO users (email, user_name, password, first_name, last_name, is_logged) VALUES ('$email', '$user', '$pass', '$first_name', '$last_name', 1)";
				$result = mysqli_query($conn,$sql);
				if($result){
					header("Location: home.php");
					exit();				
				}
				else
					#echo "<h3> Nastala je greska! </h3>";
                    $msg_index=1;
				
			}
			else {
				#echo "<h3> Molim Vas da unesete ispravne podatke! </h3>";
                $msg_index=2;
			}
		}
		else {
            #echo "<h3> Korisnik sa ovim podacima vec postoji! </h3>";
            $msg_index=3;
        }
	}
	
	?>

	
<form action="signup.php" method="post">
	  <div class="container">
      <div class="title">
        Create account
      </div>

    <?php 
        if($msg_index==1) 
            echo "
            <div>
              <div class='inputclass'>There was an unknown error!<div>
            </div>";
        elseif($msg_index==2) 
            echo "
            <div>
                <div class='inputclass'>Some of the information that you entered is not valid!</div>
            </div>";
        elseif($msg_index==3) 
            echo "
            <div>
              <div class='inputclass'>User already exists!</div>
            </div>";
        elseif($msg_index==0) 
            echo "
            <div>
                <div>
                </div>
            </div>";
    ?> 
      <div class="input-container">
        <div class="storage">
          <label for="firstName">First name*</label>
          <input id="firstName" class="inputclass" name="first_name" type="text" placeholder="Enter your first name"/>
        </div>
        <div class="storage">
          <label for="lastName">Last name*</label>
          <input id="lastName" class="inputclass" name="last_name" type="text" placeholder="Enter your last name"/>
        </div>
        <div class="storage">
          <label for="emailInput">Email*</label>
          <input id="emailInput" class="inputclass"  id="colspanedit" name="email" type="text" placeholder="Enter your email"/>
        </div>
        <div class="storage">
          <label for="username">Username*</label>
          <input id="username" class="inputclass" id="colspanedit" name="user" type="text" placeholder="Create your username"/>
        </div>
        <div class="storage">
          <label for="passwordInput">Password*</label>
          <input id="passwordInput" class="inputclass"  id="colspanedit" name="pass" type="password" placeholder="Create a password"/>
        </div>
        <div class="storage">
          <input name="register" class="submit-button" type="submit" value="Create account" id="register"/>
        </div>
      </div>
      <div class="log-option">
          <div class="text">Already have an account? <a href="login.php">Log in</a></div>
      </div>

      

    </div>

    <div class="container2">
      <img src="pics/pexels-cottonbro-4722571.jpg">
      <div class="overlay-text">
        <h1>Unlock the best of cinema</h1>
        <div>
        Welcome to our Top 100 Movies community! By signing up, you'll gain exclusive access to curated lists, in-depth reviews, and personalized recommendations that will elevate your movie-watching experience.
        </div>
      </div>
    </div>
	</form> 
   </td>
   
  </tr>
	</table>

</body>
</html>