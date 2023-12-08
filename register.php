<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php

        include("./configuration/config.php");

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
                        

            $verify_query = mysqli_query($connection,"SELECT Email FROM user WHERE Email='$email'");

            if(mysqli_num_rows($verify_query) != 0){
                echo "<div class = 'message'>
                            <p> This email is used, Try another One Please! </p>
                     </div> </br>";
                echo "<a href ='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            else{
                mysqli_query($connection, "INSERT INTO user(username,Email,Password,password2) VALUES ('$username','$email','$password','$password2')") or die("Error Ocuured");

                echo "<div class = 'message'>
                           <p> Registration Successful </p>
                      </div> </br>";
                 echo "<a href ='login.php'><button class='btn'>Login Now</button>";
            }
            }else{

            

        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password2" id="password2" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Sign Up" required>
                </div>
                <div class="links">
                    Already have an account? <a href="login.php">Sign In </a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>