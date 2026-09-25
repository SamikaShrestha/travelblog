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
        <h1>Register Form</h1>
        <hr>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <button>Create new account</button>
            
            </form>
    </blockquote>
</body>
</html>

<?php
require_once "footer.php";
?>