<?php
require_once "header.php";
require_once "connection.php";

if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['success'] = "Login Successful!";
        $_SESSION['auth'] = $user;
        header("Location:index.php");
    } else {
        $_SESSION['error'] = "Invalid creditials";
        header("Location:login.php");
    }
}
?>

<blockquote>
    <div class="login-entry">
    <aside class="log-aside-container">
        <img class="log-aside-img" src="img/aside.webp" alt="img">
    </aside>
    <form class="log-form" action="" method="post">
        <h1>Login Form</h1>
        <br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" class="log gmail-box"><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" class="log set-pass"><br><br>

        <button class="log-btn" type="submit">Login</button>
    </form>
    </div>
</blockquote>

<?php
require_once "footer.php";
?>