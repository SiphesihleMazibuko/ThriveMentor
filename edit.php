<?php
    session_start();

    include("./configuration/config.php");

    if(!isset($_SESSION['valid'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://kit.fontawesome.com/b2e0a616b3.js" crossorigin="anonymous"></script>
    <title>Change Profile</title>
</head>

<body>
    <div class="nav">
        <img src="./Images/Logo2.png">
        <div class="logo">
            <p> <a href="profile.php"> ThriveMentor</a></p>
        </div>
        <div class="right-links">
            <a href="./configuration/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>

    <div class="container">
        <div class="box form-box">
            <?php
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($connection, "UPDATE user SET username='$username', email='$email' WHERE Id=$id ") or die("Error Occured");
                if($edit_query){
                    echo "<div class = 'message'>
                             <p> Profile Updated </p>
                          </div> </br>";
                     echo "<a href ='profile.php'><button class='btn'>Go To Profile</button>";
                  }
            }else{

                $id = $_SESSION['id'];
                  $query = mysqli_query($connection, "SELECT * FROM user WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_username = $result['username'];
                    $res_email = $result['email'];

                }
            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_username; ?>"
                        autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_email; ?>" autocomplete="off"
                        required>
                </div>

                <div class="field">
                    <input type="submit" name="submit" class="btn" value="Update" required>
                </div>

            </form>
        </div>
        <?php } ?>
    </div>
    <footer class="footer-distributed">
        <div class="footer-left">
            <h3>Thrive <span>Mentor.io</span></h3>

            <p class="footer-links">
                <a href="Home.php">Home</a>
                |
                <a href="About.php">About</a>
                |
                <a href="Details.php">Details</a>
                |
                <a href="Coaches.php">Coaches</a>
                |
                <a href="profile.php">Profile</a>
            </p>

            <p class="footer-company-name">Copyright <span> &copy;</span> 2023 <b>ThriveMentor.io</b> All rights
                reserved</p>
        </div>
        <div class="footer-center">
            <div>
                <i class="fa-solid fa-location-dot"></i>
                <p><span>UJ Bunting Road</span>Auckland</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>011 559 4555</p>
            </div>
            <div>
                <i class="fa-solid fa-envelope"></i>
                <p>amazibuko763@gmail.com</p>
            </div>

        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>
                <b>ThriveMentor.io</b> is a website that is built for people in need of help and willing to be assisted dealing with their issues
            </p>
        </div>
        <div class="footer-icons">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
        </div>
    </footer>
</body>

</html>