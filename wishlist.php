<?php
if(isset($_GET['wishlist'])){
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
        
    } else {
        $statement = $conn->prepare("INSERT INTO `wishlist`(`userID`, `itemID`) VALUES (?,?)");
        $statement->bind_param("ii",$_SESSION['user'], $_GET['wishlist']);
        $statement->execute();
    }
}
?>
