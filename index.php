<?php
session_start();
session_unset();

if (isset($_POST['msg'])) {
    echo "<script>window.alert(" . $_POST['msg'] . ")</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Login.css">
    <link rel="shortcut icon" href="assets/icon.png">
    <title>SIGN IN</title>
</head>

<body>
    <main>
        <h1>Login</h1>
        <form class="form1" method="POST" action="login_action.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username client/admin">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <input type="submit" value="Login" onclick="login();">
        </form>
        <form class="form2" action="register.php" method="get">
            <input type="submit" value="Don't have account? Register">
        </form>
    </main>
    <?php if (isset($_SESSION['login_error'])) : ?>
        <script>
            alert("<?php echo $_SESSION['login_error']; ?>");
        </script>
    <?php session_unset();
    endif; ?>
</body>

</html>