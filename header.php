<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header class="header">
        <nav class="nav-bar">
            <ul class="navlist">
                <li><a href="index.php">Home</a></li>
                <li><a href="blogs.php">Blogs</a></li>
                <li><a href="index.php#destinations">Destinations</a></li>
                <li><a href="index.php#aboutus">About Us</a></li>
                <li><a href="index.php#footer">Contact Us</a></li>
                <?php if (isset($_SESSION['auth'])){ ?>
                    <li class="user-profile">
                        <a href="profile.php" class="account-btn">
                            <i class="fa-solid fa-user-circle"></i>
                            <span><?php echo htmlspecialchars($_SESSION['auth']['name'] ?? 'Account'); ?></span>
                        </a>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                <?php }else{ ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <?php if (isset($_SESSION['success'])) { ?>
        <h1><?= $_SESSION['success']; ?></h1>
        <?php unset($_SESSION['success']); ?>
    <?php } ?>

    <?php if (isset($_SESSION['error'])) { ?>
        <h1><?= $_SESSION['error']; ?></h1>
        <?php unset($_SESSION['error']); ?>
    <?php } ?>