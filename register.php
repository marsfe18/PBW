<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <link rel="shortcut icon" href="assets/icon.png">
    <title>SIGN UP</title>
</head>

<body>
    <main>
        <h1>Register</h1>
        <form name="registerform" onsubmit="return validateForm();" action="register_action.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>
            <label for="password_confirm">Confirm Password:</label>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm password" required>
            <div class="formtgl">
                <label>Tanggal Lahir:</label>
                <input type="date" name="lahir" required>
            </div>
            <label>Jenis Kelamin:</label>
            <div class="formjk">
                <input type="radio" id="man" name="jk" value="m">
                <label for="man">Laki-laki</label>
                <input type="radio" id="woman" name="jk" value="f">
                <label for="woman">Perempuan</label>
            </div>
            <div class="term">
                <input type="checkbox" name="agree" required>
                <p>I agree to the <a href="#">Terms & Policy</a></p>
            </div>
            <input type="submit" value="Register">
        </form>
        <a href="index.php" style="margin-top: 10px;">Sudah punya akun? masuk</a>
    </main>
    '<script>
        function validateForm() {
            var password = document.forms["registerform"]["password"].value;
            var password_confirm = document.forms["registerform"]["password_confirm"].value;
            if (password !== password_confirm) {
                window.alert("Password berbeda");
                return false;
            }
        }
    </script>'
</body>

</html>