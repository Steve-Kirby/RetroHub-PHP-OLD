<?php
if(isset($_GET['search'])){
$search = $_GET['search'];
} else {
$search = "";
}
if(isset($_GET['filter'])){
$filter = $_GET['filter'];
} else {
$filter = "";
}
if(isset($_GET['sortorder'])){
$sort = $_GET['sortorder'];
} else {
$sort = "";
}

?>

<div class="row" style="margin-top:70px;">
  <div class="col-lg-3">
<p class="lead">Search</p>
<form action="" method="get">
  <div class="row">
    <div class="col-lg-8">
      <input class="search-query form-control" name="search" type="text" size="30" placeholder="Search">
     </form>
    </div>
    <div class="col-lg-4">
      <input class="btn btn-danger" type="submit" value="Search">
    </div>
</div>
</form>
<br>
  <div class="list-group">
    <!--<a href="#"><p class="list-group-item">Retro Games</p></a>
    <a href="#"><p class="list-group-item">Cards</p></a>
    <a href="#"><p class="list-group-item">Cars</p></a>
    <a href="#"><p class="list-group-item">Misc</p></a>
    <a href="#"><p class="list-group-item">Services</p></a>-->
  </div>
  <a href="#" onclick="$('#SortBy').toggle()"><p class="lead">Sort by <span class="caret" style="float:right"></span></p></a>
  <div id="SortBy" class="list-group">
    <a href="<?php echo("?search={$search}&sortorder=price");?>"><p class="list-group-item">Price</p></a>
    <a href="<?php echo("?search={$search}&sortorder=console");?>"><p class="list-group-item">Console</p></a>
    <a href="<?php echo("?search={$search}&sortorder=condition");?>"><p class="list-group-item">Condition</p></a>
    <a href="<?php echo("?search={$search}&sortorder=title");?>"><p class="list-group-item">Title</p></a>
    <!--<a href="#"><p class="list-group-item">Most Discounted</p></a>
    <a href="#"><p class="list-group-item">Most Popular</p></a>-->
  </div>
  <a href="#" onclick="$('#Filters').toggle()"><p class="lead">Filter <span class="caret" style="float:right"></span></p></a>
  <div id="Filters" class="list-group">
  <div id="conFilter" class="range list-group-item reda">
            <input type="range" style="float:left;" name="range" min="1" max="100" value="1" onchange="range.value=value;color(value);change1(value)">
            <span>Min Condition </span><output style="float:right;"id="range">1</output>
  </div>
 <script>
 
  </script>
  <div id="priceFilter" class="range list-group-item">
            <input type="range" style="float:left;" name="pricerange" min="1" max="500" value="500" onchange="pricerange.value=value;change1(value)">
            <span>Max Price </span><output style="float:right;"id="pricerange">500</output>
  </div>
  <div id="consoleFilter" class="list-group-item">
   <p>Console<br>&nbsp;<span class="consoleFilters">N64</span>&nbsp;<input type="checkbox" checked onchange="change1(value);">&nbsp;<span class="consoleFilters">PS1</span>&nbsp;<input type="checkbox" checked onchange="change1(value);"></p>
   </div>
  </div>
</div>
  <div class="col-lg-9">
<?php include 'ItemHold.php';?>
  </div>
</div>
<script>
function color(p1) {
    if(p1 > 35){
    	$('#conFilter').removeClass("reda").removeClass("emeralda").addClass("yellowa");
    	if(p1 > 69){
    	
    	$('#conFilter').removeClass("reda").removeClass("yellowa").addClass("emeralda");
    	return;
    	}
    	return;
    }
    if(p1 < 36){
    	$('#conFilter').removeClass("emeralda").removeClass("yellowa").addClass("reda");
    	return;
    }
}
function change1(value){
  	
  	var confilter = document.getElementById("conFilter").children[0];
  	var elements = document.getElementsByClassName("price");
  	var pricefilter = document.getElementById("priceFilter").children[0];
  	var consolefilter = document.getElementsByClassName("consoleFilters");
  	for (let element of Array.from(elements)) {
  		if(Math.round(element.parentElement.parentElement.parentElement.previousElementSibling.children[4].children[1].children[0].innerHTML * 100)/100 >= confilter.value && Math.round(element.innerHTML * 100)/100 <= pricefilter.value){
	  		element.parentElement.parentElement.parentElement.parentElement.style.display = 'block';
	  		element.parentElement.parentElement.parentElement.parentElement.previousElementSibling.style.display = 'block';
	  		for (let console of Array.from(consolefilter)) {
	  		if(console.nextElementSibling.checked && console.innerHTML === element.parentElement.parentElement.parentElement.previousElementSibling.children[1].children[0].innerHTML){
	  		element.parentElement.parentElement.parentElement.parentElement.style.display = 'block';
	  		element.parentElement.parentElement.parentElement.parentElement.previousElementSibling.style.display = 'block';
	  		}
	  		if(!console.nextElementSibling.checked && console.innerHTML === element.parentElement.parentElement.parentElement.previousElementSibling.children[1].children[0].innerHTML){
	  		element.parentElement.parentElement.parentElement.parentElement.style.display = 'none';
	  		element.parentElement.parentElement.parentElement.parentElement.previousElementSibling.style.display = 'none';
	  		}
	  		}
	  	} else {
	  		element.parentElement.parentElement.parentElement.parentElement.style.display = 'none';
	  		element.parentElement.parentElement.parentElement.parentElement.previousElementSibling.style.display = 'none';
	  		
	  	}
	}
  	
  	return;
  	
  	}
</script>