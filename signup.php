<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">

        <style>
          body{
            background-color: rgb(35, 54, 97);
          } 
          .inputclass {
            font-size: 25px;
          }
          #colspanedit {
            width: 100%;
          }

        </style>

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
	<table width="500px" height="400px" border="0" cellpadding="0" cellspacing="0" bgcolor="white" style="background-color: rgb(14, 28, 59);">
    <tr height="80px">
        <td class="inputclass" style="color: white;">Sign Up</td>
    </tr>

    <?php 
        if($msg_index==1) 
            echo "
            <tr align='center'  height='50px'>
                <td colspan='2'>
                <p class='inputclass' style='color: red;'>There was an unknown error!</p>
                </td>
            </tr>";
        elseif($msg_index==2) 
            echo "
            <tr align='center'  height='50px'>
                <td colspan='2'>
                <p class='inputclass' style='color: red;'>Some of the information that you entered is not valid!</p>
                </td>
            </tr>";
        elseif($msg_index==3) 
            echo "
            <tr align='center'  height='50px'>
                <td colspan='2'>
                <p class='inputclass' style='color: red;'>User already exists!</p>
                </td>
            </tr>";
        elseif($msg_index==0) 
            echo "
            <tr align='center'  height='60px'>
                <td colspan='2'>
                </td>
            </tr>";
    ?> 

    <tr align="center" height="100px">
		<td height="60px"><input class="inputclass" name="first_name" type="text" placeholder="First name"/></td>
        <td height="60px"><input class="inputclass" name="last_name" type="text" placeholder="Last name"/></td>
	  </tr>
	  <tr align="center" height="100px">
		<td height="60px" colspan="2"><input class="inputclass"  id="colspanedit" name="email" type="text" placeholder="Email"/></td>
	  </tr>
	  <tr align="center" height="100px">
		<td height="60px" colspan="2"><input class="inputclass" id="colspanedit" name="user" type="text" placeholder="Username"/></td>
	  </tr>
	  <tr align="center" height="100px">
		<td height="60px" colspan="2"><input class="inputclass"  id="colspanedit" name="pass" type="password" placeholder="New password"/></td>
	  </tr>
	  <tr align="center" height="100px">
		<td colspan="2"><input name="register" class="inputclass" type="submit" value="Sign Up" id="register"/></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>
	</table>
	</form> 
   </td>
   
  </tr>
	</table>

</body>
</html>