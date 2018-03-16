<?php
    include('server.php');
    session_start();
    if(isset($_POST['add'])){
        $name=$_POST['name'];
        $description=$_POST['description'];
        if(isset($_FILES['image'])){
            $filename=$_FILES['image']['name'];
            $filesize=$_FILES['image']['size'];
            $filetype=$_FILES['image']['type'];
            $file_tmp=$_FILES['image']['tmp_name'];
            /*$extensions=array("jpeg","jpg","gif");
            $tmp=explode('.',$_FILES['image']['name']);
            $file_extension=strtolower(end($tmp));
            if(in_array($file_extension,$extensions)==True){*/
            move_uploaded_file($file_tmp,"uploads/".$filename);
            /*}
            else{
            echo "File format is not supported.";
            }*/
            $photo=$_FILES['image']['name'];
            $query="INSERT INTO `product`(`name`,`description`,`photo`) VALUES('$name','$description','$photo')";
            mysqli_query($conn,$query);
            header('location:products.php');
            
       }
    }
?>

<!DOCTYPE html>
<html>
<body>
    <h1>ADD PRODUCTS</h1>
    <form method="POST" action="" enctype="multipart/form-data">
    Product Name:<br><input type="text" name="name" placeholder="Product Name" required><br><br>
    Description:<br><textarea name="description" ></textarea><br><br>
    Image:<br><input type="file" name="image" required><br><br>
    <input type="submit" name="add" placeholder="Add Product">

    </form>

</body>
</html>