<?php
require_once "header.php";
require_once "connection.php";

$sql= "SELECT * FROM posts";
$result=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
    <section class="blog-banner">
        <div class="banner-container">
            <img src="img/blogpage.jpg" alt="" class="blog-img">
        </div>
        <div class="blog-overlay"></div>
        <div class="blog-text">
            <h1 class="blog-heading">Blogs</h1>
            <p class="blog-description">Recent Travel Blogs</p>
        </div>
    </section>
    <section class="post-container">
        <h2 class="post-heading">Blog Posts</h2><br>
        <hr>
        <div class="post-list">
                <?php foreach($result as $post) { ?>
                <div class="post-box">
                    <div class="post-image">
                        <img class="image" src="img/<?php echo $post['image'] ?>"><br><br>
                    </div>
                    <div class="post-data">
                        <div class="post-title">
                            <h2><?php echo $post['title'] ?></h2>
                        </div>
                        <div class="post-description">
                            <p><?php echo $post['description'] ?></p>
                        </div>
                    </div>
                    <div class="btn-container">
                        <div class="post-blog">
                            <a  class="blog-btn" href="blog_detail.php?slug=<?php echo $post['slug']; ?>">Read More</a>
                        </div>
                    </div>
                </div>
                <?php } ?>  
        </div>
    </section>
</main>
</body>
</html>

<?php
require_once "footer.php";
?>