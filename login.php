<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="login_style.css?v=<?php echo time(); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    </head>

    <body>

      <?php 
        function search($arr1, $arr2, $user){         //ovo je da vidi da li je username ili email uopste u bazi
          for($i=0; $i<count($arr1); $i++){           //in-built array_search ne returna nista ako ne nadje nista
            if($arr1[$i]==$user || $arr2[$i]==$user)  //pa sam napravio ovo da lakse bude ispitivanje
              return $i;
          }
          return -1;
        }
        $msg_index=0;
        if(isset($_POST["submit"])){
            $email_user=$_POST["email_user"];
            $pass=$_POST["pass"];
                
            if(strlen($email_user)>0 && strlen($pass)>0){   //ako je neko od polja prazno onda preskace svako ispitivanje
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
                    
                  if (search($usernames, $emails, $email_user)===-1){  //ovaj search je moja funkcija
                      $msg_index=2;
                      #echo "<h3>Niste unijeli ispravne podatke</h3>";
                  }
                  else {
                      if (str_contains($email_user, "@")) {
                          if ($passwords[array_search($email_user, $emails)]===$pass){
                              header("Location: home.php");
                              exit();		
                          }
                          else {
                              $msg_index=2;
                              # echo "<h3>Niste unijeli postojece podatke</h3>";
                              }
                        } 
                        else {
                            if ($passwords[array_search($email_user, $usernames)]===$pass){
                                header("Location: home.php");
                                exit();		
                            }
                            else {
                                $msg_index=2;
                                #echo "<h3>Niste unijeli postojece podatke</h3>";
                                }
                        }	
                  }  
                }
                else {
                    $msg_index=2;
                    #echo "<h3>Niste unijeli postojece podatke</h3>";
                }
            }
            else{
                $msg_index=1;
                #echo "<h3>Niste unijeli podatke</h3>";
            }
        }
      ?>


      <form action="login.php" method="post">
          <div class = "table">
            <div>
              <div class="inputclass">Sign in</div>
            </div>
            
            <div id="error_div">
              <p id="error_msg">
                  <?php 
                    if($msg_index==1) 
                        echo "Wrong username or password!";
                    elseif($msg_index==2) 
                        echo "Wrong username or password!";
                    elseif($msg_index==0) 
                        echo "";
                  ?> 
                </p>
            </div>
            
            <div class="container">
              <input class="user-input" name="email_user" type="text" placeholder="Email or username">
              <input type="password" placeholder = "Password" class = "user-input" name="pass">
              <button class="submitBtn" type="submit" name="submit">Sign in</button>
            </div> 
            <div class="container2">
              <div class="signupOption">Don't have an account? <a class="signupLink" href="signup.php"> Sign up here </a></div>
            </div> 
            <div>
              <div>&nbsp;</div>
            </div>
          </div>
      </form> 
  </body>
</html>