<?php
if (isset($_GET['search'])){
$search = $_GET['search'];} 
else {
$search = "";
}
$search = preg_replace('/\s\s+/', ' ', $search);
$result = mysqli_query($conn,"SELECT * FROM items WHERE itemTitle LIKE '%$search%'") or die ("Search was Invalid");
$count = mysqli_num_rows($result);
?>
<h3>There were <?php echo("$count search results for ''$search''")?></h3>
<div id="results" style="background-color: #f3f9fe ">
  
    <?php include 'item.php'; ?>
</div>
