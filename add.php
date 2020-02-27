<?php 
if(isset($_GET['add'])){
if(!isset($_SESSION['user'])){
header("Location: login.php");
} else {
$userId = $_SESSION['user'];
$res = mysqli_query($conn,"SELECT * FROM users WHERE userId=".$userId);
$userRow = $res->fetch_assoc();
echo $userId;
echo $userRow;

$addId = $_GET['add'];
$insert="INSERT INTO `cart`(`userID`, `itemID`) VALUES ('$userId','$addId')";
$doit= $conn->query($insert);
}
}
?>