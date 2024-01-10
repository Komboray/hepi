<?php
include ('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form id = "form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])  ?>" method = 'POST'>
    <h1>Login</h1>
     <div>
         <label for="username">Username</label>
         <input type="text" id = "username" placeholder = "John Kamau" required>
     </div>

     <div>
         <label for="email">Email</label>
         <input type="email" id = "email" placeholder = "JohnKamau@gmail.com" required>
     </div>

     <div>
         <label for="password">Password</label>
         <input type="password" id = "password" name = "password"  required>
     </div>

     <div>
        <button type = "submit" name ="submit" id = "submit" >Login</button>
     </div>

    </form>
    <?php

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
       $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
       $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
       $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

       if(empty($username)){
        echo "no username";
       }elseif(empty($email)){
        echo "no email";        
       }else{
          
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM user WHERE password = '$hash' ";
        $sql1 = "SELECT * FROM user WHERE username = '$username' ";
        $sql2 = "SELECT * FROM user WHERE email = '$email' ";

        if(!$sql || !$sql1 || !sql2){
            echo "Something is wrong";
        }else{
            $result = mysqli_query($conn, $sql,$sql1, $sql2);
            mysqli_close($conn);
            header("Location: dashboard.php");  
        }
        
       
      }
    }
      
    ?>

    
    
</body>
</html>