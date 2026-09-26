<?php
require_once "header.php";
require_once "connection.php";

if(!empty($_POST)){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="Account Created";
        header("Location:register.php");
    }else{
        $_SESSION['error']="Account Not Created";
        header("Location:register.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <blockquote>
        <div class="register-entry">
            <aside class="aside-container">
                <img class="aside-img" src="img/aside.webp" alt="img">
            </aside>
            <form class="reg-form" method="post">
                <h1>Register Form</h1>
                <br>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" class="reg name-box" required><br><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" class="reg email-box" required><br><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" class="reg pass-box" required><br><br>

                <button class="reg-btn">Create new account</button>
                </form>
        </div>
    </blockquote>
</body>
</html>

<?php
require_once "footer.php";
?>