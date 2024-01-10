<?php
include ('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])  ?>" method = 'POST'>
  <h1>Registration Form</h1>
    <div >
         <label for="username">Username</label>
         <input type="text" id = "username" name ="username" placeholder = "John Kamau" required>
    </div>

    <div>
         <label for="email">Email</label>
         <input type="email" id = "email" name = "email" placeholder = "JohnKamau@Gmail.com" required>
    </div>

    <div>
         <label for="password">Password</label>
         <input type="password" id = "password" name = "password" required>
    </div>

    <div>
         <label for="cPassword">Confirm password</label>
         <input type="password" id = "cPassword"  required>
    </div>

    <div>
        <button type = "submit" >Login</button>
    </div>
</form>    
</body>
</html>

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
          $sql = "INSERT INTO user (username, email, password) 
                  VALUES('$username','$email','$hash')";
          
          $result = mysqli_query($conn, $sql);
     }
}
?>