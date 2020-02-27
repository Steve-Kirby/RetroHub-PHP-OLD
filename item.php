<?php
require_once 'dbConnect.php';
if (isset($_GET['sortorder'])){
if ($_GET['sortorder'] == 'title') {
	 $sort = 'itemTitle asc';
} else if($_GET['sortorder'] == 'console') {
	 $sort = 'itemConsole desc';
} else if($_GET['sortorder'] == 'condition') {
	 $sort = 'itemCondition desc';
 }else if($_GET['sortorder'] == 'price') {
	 $sort = 'itemPrice desc';
 } else {
	 $sort = 'itemStock desc';	 
 }
} else {
$sort = 'itemStock desc';
}
if (isset($_GET['search'])){
$search = $_GET['search'];
$search = preg_replace('/\s\s+/', ' ', $search);
$result = mysqli_query($conn,"SELECT * FROM items WHERE itemTitle LIKE '%$search%' ORDER BY {$sort} LIMIT 1000") or die ("Search was Invalid");
} else {
$result = mysqli_query($conn,"SELECT * FROM items WHERE itemFeatured > 0");
}
while($row = mysqli_fetch_array($result)) {
  echo("<hr>
    <div class='item row' style='margin-bottom:20px;padding-left:20px;'>
    
      <div class='col-lg-3'>
        <img style='float:left;margin:20px;max-width:200px;' class='img-responsive' src='pic/{$row['itemThumbnail']}'/>
      </div>
      <div class='col-lg-6'>
        <h2><a href='#'>{$row['itemTitle']}</a></h2><h4 style='float:right;margin:10px;'><a href='#'>{$row['itemConsole']}</a></h4>
        
        <p>{$row['itemDescription1']}</p>
        <p>{$row['itemDescription2']}</p>
  <div style='float:left;'>
  <div id='bar{$row['itemID']}'class='bar-main-container yellow'>

        <div class='bar-container'>
          <div style='width:{$row['itemCondition']}%;' class='bar'></div>
        </div>

    </div>
  <p style='text-align:center'>Condition meter: <span class='conditions'>{$row['itemCondition']}</span>%</p>
  </div>
  <div style='float:right;'>
  <input type='checkbox' disabled='true' "); if($row['itemBoxed'] == 1){ echo("checked");} echo(">Boxed</input>
  <input type='checkbox' disabled='true' "); if($row['itemManual'] == 1){ echo("checked");} echo(">Manual</input>
  <input type='checkbox' disabled='true' "); if($row['itemSealed'] == 1){ echo("checked");} echo(">Sealed</input>
  </div>
  </div>
  <div class='col-lg-3'>
        <h3 style='float:left;text-align:center;'>");

  if($row['itemPreviousPrice'] > 0){
    echo(" <em style='font-size:0.5em'>was </em><span class='strikeout' style='color:#FF5050;'>£{$row['itemPreviousPrice']}</span><br>");
  }
  echo("<em style='font-size:0.5em'>now </em><span style='color:green'>£<span class='price'>{$row['itemPrice']}</span></span><br><form action='' method='get'><button class='btn btn-info' style='width:150px;margin:5px 10px 5px 10px' name='add' value='{$row['itemID']}'>Add to Cart&nbsp;<i class='fa fa-cart-plus' aria-hidden='true'></i>
  </button></form><form action='' method='get'><button class='btn btn-danger' style='width:150px;margin:5px 10px 5px 10px;' name='wishlist' value='{$row['itemID']}'>Wishlist me&nbsp;<i class='fa fa-heart-o' aria-hidden='true'></i>
  </button></form><a href='https://www.facebook.com/sharer/sharer.php?u=https://sellcards.co.uk/index.php?search={$row['itemTitle']}' target='_blank'><button class='btn btn-primary' style='width:150px;margin:5px 10px 5px 10px'><i class='fa fa-facebook-square' aria-hidden='true'></i>
  &nbsp;Share Now</button></a></h3>

      </div>
    </div>");
$itemid = $row['itemID'];
if($row['itemCondition'] < 35){
echo('
<script>
	$("#bar'.$itemid.'").addClass("red").removeClass("yellow");
</script>');
}
if($row['itemCondition'] > 69){
echo('
<script>
	$("#bar'.$itemid.'").addClass("emerald").removeClass("yellow");
</script>');
}
}

 
?>
