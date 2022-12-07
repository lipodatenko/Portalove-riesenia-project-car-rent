<?php
include_once "db_connect.php";
$db=$GLOBALS['db'];

$bookingInfo=$db ->getBookingInfo($_GET['id']);


?>


<!DOCTYPE html>
<link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><style lang="en" type="text/css" id="dark-mode-custom-style"></style><style lang="en" type="text/css" id="dark-mode-native-style"></style><style lang="en" type="text/css" id="dark-mode-native-sheet"></style><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Go back Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">Update Form</h3>
      </div>

      


<form class="form-horizontal" action="updatebooking.php" method="post">


<legend>Update booking</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Full Name</label>  
  <div class="col-md-8">
  <input  id="fullName" name="fullName" type="text" value="<?php echo $bookingInfo[0]['fullName'];?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Phone</label>  
  <div class="col-md-8">
  <input id="phone" name="phone" type="phone" value="<?php echo $bookingInfo[0]['phone'];?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-8">
  <input id="email" name="email" type="email" value="<?php echo $bookingInfo[0]['email'];?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Book from</label>  
  <div class="col-md-8">
  <input id="getDate" name="getDate" type="date" value="<?php echo $bookingInfo[0]['getDate'];?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Book to</label>  
  <div class="col-md-8">
  <input id="returnDate" name="returnDate" type="date" value="<?php echo $bookingInfo[0]['returnDate'];?>" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Status</label>
  <div class="col-md-8">
    <select id="status" name="status" class="form-control">
    <option value="<?php echo $bookingInfo[0]['status']; ?>" selected> Current status: <?php echo $bookingInfo[0]['status'];?></option>
      <option value="new">new</option>
      <option value="processing">processing</option>
      <option value="finished">finished</option>
    </select>
  </div>
</div>
<input type="hidden" name="id" value="<?php echo $bookingInfo[0]['id'];?>"><br>
<button type="submit" name ="submit" class="btn btn-success" value="apply">Apply Changes</button>
<a href="adminpanel.php" class="btn btn-danger">Cancel</button>


    
</form>

</body>
</html>




