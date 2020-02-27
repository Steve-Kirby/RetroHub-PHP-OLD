<?php 
if(isset($_GET['wishlist'])){
if(!isset($_SESSION['user'])){
header("Location: login.php");
} else {
$userId = $_SESSION['user'];
$res = mysqli_query($conn,"SELECT * FROM users WHERE userId=".$userId);
$userRow = $res->fetch_assoc();
echo $userId;
echo $userRow;

$wishlistId = $_GET['wishlist'];
$insert="INSERT INTO `wishlist`(`userID`, `itemID`) VALUES ('$userId','$wishlistId')";
$doit= $conn->query($insert);
}
}
?>