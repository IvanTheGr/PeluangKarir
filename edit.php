<?php 
   session_start();

   include("configure.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">PeluangKarir</a>
        <nav>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php"><button class="btn">Log Out</button></a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="box">
            <div class="form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($conn,"UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='home.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($conn,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                }

            ?>
                <header>Edit profile</header>
                <div id="error-message" class="error-message"></div>
                <form action="register.php" method="post">
                    <div class="field input">
                        <label for="Username">Username</label>
                        <input type="text" name="Username" id="Username" required>
                    </div>
    
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
    
                    <div class="field input">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" required>
                    </div>
    
                    <div class="field">
                        <input type="submit" class="bton" value="submit">
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
    
</body>
</html>