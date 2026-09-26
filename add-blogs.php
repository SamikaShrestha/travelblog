<?php 
require_once 'header.php';
require_once 'connection.php';

if(!isset($_SESSION['auth'])){
    $_SESSION['error']="Login to access this page";
    header("Location:login.php");
    exit;
}

if(!empty($_POST)){
    $category_id = $_POST['category_id'];
    $userid = $_SESSION['auth']['uid'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $slug = strtolower(str_replace(" ", "-", $title));

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    if(!move_uploaded_file($tmp_name, "img/".$image)){
        echo "Image not uploaded!";
    }

    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $sql = "INSERT INTO posts(category_id,user_id,title,slug,image,description)
    VALUES ('$category_id','$userid','$title','$slug','$image','$description')";
    $result = mysqli_query($conn, $sql);
    if($result) {
        $_SESSION['success'] = "Post added successfully";
        header("Location:add-blogs.php");
        exit;
    } else {
        $_SESSION['error'] = "Post not added";
        header("Location:add-blogs.php");
        exit;
    }
}    

$query = "SELECT * FROM category";
$category = mysqli_query($conn, $query);
?>

<div class="blog-entry">
    <aside class="aside-container">
        <img class="aside-img" src="img/aside.webp" alt="img">
    </aside>

    <form class="form" action="" method="post" enctype="multipart/form-data">
        <h1>Add Blog</h1>
        <br>
        Category:<br>
        <select name="category_id" class="add category-box" required>
            <option value="">---------------------------------------Select Category-----------------------------------------------------------</option>
            <?php foreach($category as $cat) { ?>
                <option value="<?php echo $cat['cid']; ?>">
                    <?php echo $cat['name']; ?>
                </option>
            <?php } ?>
        </select>
        <br><br>
        Title:<br>
        <input type="text" name="title" class="add title-box" required>
        <br><br>
        Image:<br>
        <input type="file" name="image" class="add image-box" required>
        <br><br>
        Description:<br>
        <textarea name="description" class="add descrip-box" required></textarea>
        <br><br>
        <button class="add-post">Add Post</button>
    </form>
</div>

<?php
require_once "footer.php";
?>

