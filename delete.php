<?php
    session_start();
    include("./configuration/config.php");

    if(isset($_GET['Id'])){
        $id = $_GET['Id'];
        $sql = "DELETE FROM user WHERE Id= $id";
        $result = mysqli_query($connection, $sql);

        echo "<div class = 'message'>
                   <p> User Deleted </p>
                </div> </br>";

    }
    header("Location: register.php");
    session_destroy();
    

   
    
?>
    