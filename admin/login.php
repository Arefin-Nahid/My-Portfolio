<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
       <div class="box">
        <div class="header">
            <header>
                <div><p>Log In to Admin</p></div>
                <div><img src="../images/logo.png" alt=""></div>
            </header>
        </div>
        
        <div class="error-message">
        <?php
            session_start();
            require_once "../include/config.php";
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
                $stmt = $pdo->prepare($sql);
            
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                
                $stmt->execute();
                if($stmt->rowCount() == 1) {
                    $_SESSION['isUserLoggedIn']=true;
                    $_SESSION['email']= $_POST['email'];
                    echo "<script>window.location.href = 'index.php'</script>";
                    exit;
                } else {
                    echo "Invalid email or password";
                }
            }
            ?>
        </div>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-box">
                <label for="email">E-Mail</label>
                <input type="email" class="input-field" id="email" name="email" required>
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <label for="pass">Password</label>
                <input type="password" class="input-field" id="pass" name="password" required>
                <i class="bx bx-lock"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="input-submit" value="SIGN IN">
            </div>
        </form>
       </div>
       <div class="wrapper"></div>
    </div>
</body>
</html>
