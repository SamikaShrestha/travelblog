<?php
require_once "header.php";
require_once "connection.php";
$slug=$_GET['slug'];
$sql="SELECT category.cid,category.name as category_name,users.uid,users.name,posts.* FROM posts
JOIN category on category.cid=posts.category_id
JOIN users ON users.uid=posts.user_id
WHERE posts.slug='$slug'";
$result = mysqli_query($conn,$sql);
$post= mysqli_fetch_assoc($result);
?>

<div class="product-detail">
    <div class="product-card">
        <h2><?php echo $post['title'] ?></h2>
        <div class="product-img">
        <img src="img/<?php echo $post['image'] ?>" width="350px" height="300px" ><br><br>
        </div>
        <div class="description">
            <p class="description-text">
                Vendor: <?php echo $post['name'] ?>
                Category: <?php echo $post['category_name'] ?>
            </p>
        </div>
        <p class="main-body"><?php echo $post['description'] ?> </p>
    </div>
</div>

<?php
require_once "footer.php";
?>