<body style="background-color:snow">
  <div class="container-fluid">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <ul class="nav navbar-nav">
        <li class="active"><a class="navbar-brand" href="index.php">RetroHub</a></li>
      </ul>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href=<?php if(isset($_SESSION['user'])){
        	echo("'account.php'");
        } else {
        	echo("'login.php'");
        }?>>Your Account</a></li>
        <li><a href="index.php">Search</a></li>
        <li><a href="contact.php">Contact us</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      <form class="navbar-form" action="index.php" method="get" style="float:left;display:inline;margin-top:-3px;">
        <input style="margin:10px 5px 0px 0px;" id="navbarSearchButton" class="btn btn-danger" type="submit" value="Search"><input style="margin-top:10px;" id="navbarSearchBar" class="search-query form-control" name="search" type="text" size="30" placeholder="Search">
        </form>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user"></span>&nbsp;Hi <span style="color:red"><?php echo $guest;?></span> &nbsp;<span class="caret"></span>&nbsp;</a>
            <ul class="dropdown-menu">
              <li>
                <?php
                if ($guest == "Guest"){
                  echo('<a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Sign in</a>');
                } else {
                  echo('<a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign out</a>');
                }
                ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
  </nav>
