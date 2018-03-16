<?php 
include "server.php";
session_start();
?>
<!DOCTYPE html>
<html>
        <div class="content">
            <div class="disp">
                    <h1>Products</h1>
                    <?php 
                    $uid=$_SESSION['username'];
                    $qry = "SELECT * FROM `product`";
                    $sql = mysqli_query($conn,$qry);
                    if(mysqli_num_rows($sql)>0) { 
                        while($row=mysqli_fetch_assoc($sql)) { 
                           $imagepath ="uploads/".$row["photo"];
                           $productlink = "view.php?rid=".$row['pid']; 
                           $name = $row['name'];
                           $description = $row['description'];
                           echo "<li>";
                           echo "<img src='$imagepath' width='50%' height='50%'>";
                           echo "<h3><a href='$productlink'>$name</a></h3>";
                           echo "<p>$description</p>";
                           echo "</li>";
                        } 
                    }
                    ?>
                    </ul>
            </div> 
            <p class="footer">&#169; Online Auction</p>
        </div>
    </body>  
</html>
