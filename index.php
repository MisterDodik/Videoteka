<!DOCTYPE html>
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
        </style>

    </head>
    
    <body>
    
    <?php 
    $msg_index=0;
        if(isset($_POST["submit"])){
            $email_user=$_POST["email_user"];
            $pass=$_POST["pass"];
                
            if(strlen($email_user)>0 || strlen($pass)>0){   //ako je neko od polja prazno onda preskace svako ispitivanje
                include('db.php');
                $result = mysqli_query($conn,"SELECT * FROM users");
                
                $emails=array();
                $usernames=array();
                $passwords=array();
                while($row = mysqli_fetch_array($result)){
                    $emails[]= $row['email'];
                    $usernames[]= $row['user_name'];
                    $passwords[]= $row['password'];
                } 
                
                if(count($emails)>0){   //ako je prazna tabela users onda znaci da uneseni podaci ne postoje
                    if (str_contains($email_user, "@")) {
                        if ($passwords[array_search($email_user, $emails)]==$pass){
                            echo "da @";
                        }
                        else {
                            $msg_index=2;
                            # echo "<h3>Niste unijeli postojece podatke</h3>";
                            }
                    } 
                    else {
                        if ($passwords[array_search($email_user, $usernames)]==$pass){
                            echo $email_user.array_search($email_user, $usernames).$pass."</br>";
                        }
                        else {
                            $msg_index=2;
                            # echo "<h3>Niste unijeli postojece podatke</h3>";
                            }
                    }	
                }
                else {
                    $msg_index=2;
                    # echo "<h3>Niste unijeli postojece podatke</h3>";
                }
            }
            else{
                $msg_index=1;
                # echo "<h3>Niste unijeli podatke</h3>";
            }
        }
    ?>







      <br/><br/><br/><br/><br/><br/> 

      
        <form action="index.php" method="post">
            <table align="center" width="500px" height="600px" border="0" cellpadding="0" cellspacing="0" style="background-color: rgb(14, 28, 59);">
              <tr height="80px">
                <td class="inputclass" style="color: white;">Log in</td>
              </tr>
              <?php 
                    if($msg_index==1) 
                        echo "
                        <tr align='center'  height='50px'>
                            <td>
                            <p class='inputclass' style='color: red;'>Wrong username or password!</p>
                            </td>
                        </tr>";
                    elseif($msg_index==2) 
                        echo "
                        <tr align='center'  height='50px'>
                            <td>
                            <p class='inputclass' style='color: red;'>Wrong username or password!</p>
                            </td>
                        </tr>";
                    elseif($msg_index==0) 
                        echo "
                        <tr align='center'  height='60px'>
                            <td>
                            </td>
                        </tr>";
                    ?> 
              <tr align="center" height="100px">
                <td height="80px"><input class="inputclass" name="email_user" type="text" placeholder="Email or username"/></td>
              </tr>
              <tr align="center" height="100px">
                <td height="80px"><input class="inputclass" name="pass" type="text" placeholder="Password"/></td>
              </tr>
              <tr align="center" height="100px">
                <td><input name="submit" class="inputclass" type="submit" value="Log in" id="prijavise"/></td>
              </tr>    
              <tr align="center" height="100px">
                <td><p style="font: 20px; color: white;">Don't have an account? <a href="signup.php"> Sign up </a></p> </td> 
              </tr> 
              <tr align="center">
                <td>&nbsp;</td>
              </tr>
                </table>
            </form> 
    </body>
</html>