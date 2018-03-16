<?php 
  include "server.php";
  session_start();

  $rid = $_GET['pid'];// het the rid parameter of GET request using $_GET associative array
  $qry = "SELECT * FROM `product` where `pid`='$rid'";
  $sql = mysqli_query($conn,$qry);
  if(mysqli_num_rows($sql)>0) 
     $row=mysqli_fetch_assoc($sql);
  else 
     $warning = "Invalid page";
     
?>
<!DOCTYPE html>
<html>
    <head>

    </head>   
    <body>
        <div class="header">

            <?php include "header.php"?>
        </div>
        <div class="content">
            <div class="disp decription">
                <h2><?php echo $row['name'];?></h2>
                <p ><?php echo $row['description'];?></p>
                <h3>InitialValue</h3>
                <?php echo $row['init_value'];?>
                <h3>Photo</h3>
                <ul class="inline">
                    <li><img src="uploads/<?php echo $row['photo'];?>" width=50%,height=50%></li>
                </ul>
                <h3>Place bids</h3>
                <form method="post" id="frm">
                <input type="text" name="comment" id="comment">
                <input type="button" value="submit" onclick="showComments()"/>
                </form>
                
                <div id="comments" class="comments">
                <?php $qry1 = "SELECT * FROM `tbl_comments` where `product_id` = '$rid'";
                $sql1 = mysqli_query($conn,$qry1);
                if(mysqli_num_rows($sql1)>0) {
                while($row1=mysqli_fetch_assoc($sql1)) {
                $uid = $row1['user_id'];
                $bidamount=$row1['bid_amount'];
                $qry2 = "SELECT * FROM `user` where `uid` = '$uid'";
                $sql2 = mysqli_query($conn,$qry2);
                $row2=mysqli_fetch_assoc($sql2);
                echo "<div class='comment'>";
                echo "By:<b>".$row2['username']."</b><br>";
                echo $bidamount;
                echo "</div>";
                }
                }
                else echo "No bids placed"; ?>
                </div>
                <?phpheader('location:products.php');?>
                <script>
                function showComments() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("comments").innerHTML += this.responseText;
                        }
                    };
                    var comment = document.getElementById("comment").value;
                    document.getElementById("frm").reset();
                    xhttp.open("GET", "bids.php?rid=<?php echo $rid;?>&comment="+comment, true);
                    xhttp.send();
                }
                </script>
            </div> 
            <p class="footer">&#169; Online Auction</p>
        </div>
    </body>  
</html>
