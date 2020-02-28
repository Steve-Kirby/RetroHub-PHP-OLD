<?php
ob_start();
 session_start();
 require_once 'dbConnect.php';

//Now Safer
$statement = $conn->prepare("SELECT * FROM users WHERE userId= ?");
$statement->bind_param("i",$_SESSION['user']);
$statement->execute();

$userRow = $statement->get_result();

?>
<?php


if(isset($_GET['remove']))
{
//Now Safer	
$statement = $conn->prepare("DELETE FROM `cart` WHERE `itemID` = ? and `userID` = ?");
$statement->bind_param("ii",$_GET['remove'], $_SESSION['user']);
$statement->execute();
	
echo("<script>window.location('account.php')</script>");

}
?>

<?php

    if(isset($_POST['checkout']) )
    {
    
        $statement = $conn->prepare("SELECT * FROM cart WHERE userID = ?");
        $statement->bind_param("i", $_SESSION['user']);
        $statement->execute();
        $userCart = $statement->get_result();
        
        if($userCart->num_rows > 0){
            $statement = $conn->prepare("INSERT INTO `orders`(`orderID`, `userID`) VALUES ('',?)");
            $statement->bind_param("i", $_SESSION['user']); 
            $statement->execute();
            $insertID = $conn->insert_id;
        
            while ($row = $userCart->fetch_assoc()) {
                $insertStatement = $conn->prepare("INSERT INTO `orderdetail`(`orderID`, `selectionID`) VALUES ($insertID,{$row['itemID']})");
                $insertStatement->execute();
            }
            
        $emptyCart = $conn->prepare("DELETE FROM cart where userID = ?");
        $emptyCart->bind_param("i", $_SESSION['user']);
        $emptyCart->execute();
        }
    }
    	
    	
    include_once 'usercheck.php';
    include_once 'navbar.php';
?>


 <div id="wrapper">

 <div class="container-fluid" style='margin-right:10px, margin-left:10px';>
    
     <div class="page-header">
     <h3></h3>
     </div>
        
        <div class="container-fluid">

        <div class="row">

            <div class="col-md-4">
				<p class="lead">Account Details</p>
				<div class="list-group">
				
				    <a class='list-group-item'>User Name: <?php echo $userRow['userName']; ?></a>
					<a class='list-group-item'>First Name: <?php echo $userRow['userFirst']; ?></a>
                    <a class='list-group-item'>Last Name: <?php echo $userRow['userLast']; ?></a>
                    <a class='list-group-item'>Email: <?php echo $userRow['userEmail']; ?></a>
					<a class='list-group-item'>Address: <?php echo $userRow['userAddress']; ?></a>
				</div>
				<div class="list-group">
				<p class="lead">Wishlist</p>
<?php 

$sql2="SELECT * FROM wishlist WHERE userID =".$_SESSION['user'];
$query2= mysqli_query($conn,$sql2);
while ($row3 = mysqli_fetch_array($query2)){
$itemdata2= mysqli_query($conn,"SELECT * FROM items WHERE itemID={$row3['itemID']}");
	while($row4 = mysqli_fetch_array($itemdata2)){
	echo("
				
					<div class='list-group-item'>
					<p><img src='pic/{$row4['itemThumbnail']}' style='max-width:50px;'/> {$row4['itemTitle']}</p>
					<p>£{$row4['itemPrice']}</p>
					
					</div>
				");
	
	}

}

?>
				</div>
				
				
            </div>

            <div class="col-md-8">

<p class='lead'>Cart</p>
				
				<div class="container-fluid">
				
				<?php
$sql="SELECT * FROM cart WHERE userID =".$_SESSION['user'];
$query= mysqli_query($conn,$sql);
$count = mysqli_num_rows($query);
$colum = 1;
$total = 0.00;
if($count == 0){
      $output = "Your cart is Empty!";
		print ("$output");
    }else{
		      while ($row = mysqli_fetch_array($query)) {
$itemdata= mysqli_query($conn,"SELECT * FROM items WHERE itemID={$row['itemID']}");
				while($row2 = mysqli_fetch_array($itemdata)){
if ($colum == 1){						
        echo("<div class='row'>
	<div class='col-sm-8 col-lg-8 col-md-8'>		
				<div class='list-group'>
				<a href='#' class='list-group-item'>Item ID:{$row2['itemID']}</a>
				<a href='#' class='list-group-item'>Item Name:{$row2['itemTitle']}</a>
                <a href='#' class='list-group-item'>Price:£{$row2['itemPrice']}</a>
				
				</div>

			
</div>
				
					
				<div class='col-sm-4 col-lg-4 col-md-4'>
				
							<img src='pic/{$row2['itemThumbnail']}' style='max-width:200px;margin:20px;'alt=''>
				
				
				
				
				
				
			<form action='' method='get'>
							<button name='remove' value='{$row['itemID']}' style='margin:20px;'>Remove</button>
				</form>
				
				
				
                </div>
				
				");
$total += $row2['itemPrice'];

}
			}
			$total = number_format($total, 2);
			  }
}	
?>		

</div>
<div class='row'>

				<a href='' class='list-group-item'>Total: £<?php echo "$total" ?>	<?php include "pay.php" ?></a>
 

</a>
				
</div>
            </div>
</div>
        </div>

    </div>
    <!-- /.container -->
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Steven Kirby 2017</p>
                </div>
            </div>
        </footer>

    </div>

    
    </div>
    
    </div>

    
</body>
</html>
 
