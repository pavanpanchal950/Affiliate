<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . $password . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="email" class="login-input" name="email" placeholder="Email Adress" required>
            <input type="password" class="login-input" name="password" placeholder="Password" required>
            <input type="password" class="login-input" name="password" placeholder="conform Password" required>
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form>
    <?php
    }
    ?>

    <style>
        body {
            background-image: url('https://wallpapercave.com/wp/wp7560270.jpg');
            background-position: center;
            background-size: cover;
            height: 90vh;

        }

        .form {
            background-color: rgba(100, 100, 100, 0.5);
            border-radius: 30px;
            width: 350px;
        }

        input {

            border-radius: 30px;
            box-shadow: 0px 10px 10px 10px rgba(0, 0, 0, 0.384) inset, 0px 0px 10px 0.3px black;

        }

        p {
            color: blue;
            font-weight: 800;
            font-size: 25px;
        }
    </style>
</body>

</html>