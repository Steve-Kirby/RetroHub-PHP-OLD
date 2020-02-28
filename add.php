<?php
if(isset($_GET['add'])){
  if(!isset($_SESSION['user'])){
    header("Location: login.php");
  } else {
    $statement = $conn->prepare("INSERT INTO `cart`(`userID`, `itemID`) VALUES (?,?)");
    $statement->bind_param("ii",$_SESSION['user'], $_GET['add']);
    $statement->execute();
  }
}
?>
