-- users table
CREATE TABLE IF NOT EXISTS users(
uid int AUTO_INCREMENT PRIMARY KEY,
name varchar(100),
email varchar(100)UNIQUE,
password varchar(100),
role SET("admin","user")DEFAULT "user",
created_at datetime,
updated_at datetime
);

-- category table
CREATE TABLE IF NOT EXISTS category(
cid int AUTO_INCREMENT PRIMARY KEY,
name varchar(100),
created_at datetime,
updated_at datetime
);

INSERT INTO category (name) VALUES
('Travel Guide'),
('Destinations'),
('Travel Blog');

-- posts table
CREATE TABLE IF NOT EXISTS posts(
    pid int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    category_id int,
    title varchar(255),
    slug varchar(255) UNIQUE,
    image varchar(225),
    description text,
    created_at datetime,
    updated_at datetime,
    
    FOREIGN KEY (user_id) REFERENCES users(uid) ON DELETE RESTRICT,
    FOREIGN KEY (category_id) REFERENCES category(cid) ON DELETE RESTRICT
); 

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
    $userid=$_SESSION['auth']['uid'];
    $title = $_POST['title'];
    $slug=strtolower(str_replace("","-",$title));
    $image=$_FILES['image']['name'];
    $tmp_name= $_FILES['image']['tmp_name'];
    if(!move_uploaded_file($tmp_name,"img/".$image)){
        echo "Image not uploaded!";
    }
    $description=$_POST['description'];
    $sql="INSERT INTO posts(category_id,user_id,title,slug,image,description)
    VALUES ('$category_id','$userid','$title','$slug','$image','$description')";
    $result=mysqli_query($conn,$sql);
    if($result) {
        $_SESSION['success']="Post added successfully";
        header("Location:add-blogs.php");
    }else{
    $_SESSION['error']="Post not added";
    header("Location:add-blogs.php");
    }
}    

$query="SELECT * FROM category";
$category = mysqli_query($conn,$query);

?>

<h1>Add Blog</h1>
<hr>
<form action="" method="post" enctype="multipart/form-data">
    Category: <select name="category_id" id="" required>
        <option value="">----------Select Category-----------</option>
        <?php foreach($category as $cat) { ?>
        <option value="<?php echo $cat['cid']; ?> ">
            <?php echo $cat['name']; ?>
        </option>
        <?php } ?>
    </select> <br><br>
    Title: <input type="text" name="title" id="" required><br><br>
    Image: <input type="file" name="image" id="" required><br><br>
    Description: <textarea name="description" id="" required></textarea><br><br>
    <button>Add Post</button>
</form>