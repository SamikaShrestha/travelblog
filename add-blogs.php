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

<h1>Add Blog</h1>
<hr>

<form action="" method="post" enctype="multipart/form-data">
    Category:
    <select name="category_id" required>
        <option value="">----------Select Category-----------</option>
        <?php foreach($category as $cat) { ?>
            <option value="<?php echo $cat['cid']; ?>">
                <?php echo $cat['name']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>
    Title:
    <input type="text" name="title" required>
    <br><br>
    Image:
    <input type="file" name="image" required>
    <br><br>
    Description:
    <textarea name="description" required></textarea>
    <br><br>
    <button>Add Post</button>
</form>

