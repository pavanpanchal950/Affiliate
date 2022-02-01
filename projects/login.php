<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    // $con=mysqli_connect("localhost","root","","LoginSystem");    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . $password  . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            // Redirect to user dashboard page
            header("Location: welcome.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
    ?>

        <form class="form" method="post" name="login" action="">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" required />
            <input type="password" class="login-input" name="password" placeholder="Password" required />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <p class="link"><a href="registration.php">New Registration</a></p>

        </form>

    <?php
    }
    ?>
    <style>
        body {


            background-image: url('https://wallpaperaccess.com/full/13324.jpg');
            background-position: center;
            background-size: cover;
            height: 90vh;
        }

        form {
            background-color: rgba(100, 100, 100, 0.5) !important;
            border-radius: 30px;

        }

        .form {
            border-radius: 30px;
        }

        input {
            border-radius: 30px;
            box-shadow: 0px 10px 10px 10px rgba(0, 0, 0, 0.384) inset, 0px 0px 10px 0.3px black;
        }
    </style>
</body>

</html>