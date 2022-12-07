<?php
include_once "db_connect.php";


$db=$GLOBALS['db'];
$menuItems = $db->getMenu();
$offerItems = $db->getOffers();
$contactItems = $db->getContacts();
$menuItems = $db->getMenu();
function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
foreach ($contactItems as $c_Item){
  $companyName = $c_Item['companyName'];
  $phone = $c_Item['phone'];
  $email = $c_Item['email'];
  $year = $c_Item['year'];
  $fbLink = $c_Item['facebookLink'];
  $twLink = $c_Item['twitterLink'];
  $description = $c_Item['description'];
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Car Rental Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="mailto:<?php echo $email; ?>"><i class="fa fa-envelope"></i><?php echo $email; ?></a></li>
              <li><a href="tel:<?php echo $phone;?>"><i class="fa fa-phone"></i><?php echo $phone; ?></a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="<?php echo $fbLink; ?>"><i class="fa fa-facebook"></i></a></li>
              <li><a href="<?php echo $twLink; ?>"><i class="fa fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2><?php echo $companyName; ?><em> Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <?php
              foreach ($menuItems as $m_Item){
                debug_to_console('/'.$m_Item['link']);
                debug_to_console($_SERVER['SCRIPT_NAME']);

                echo '
              <li class="nav-item">
                  <a class="nav-link '.(('/'.$m_Item['link']==$_SERVER['SCRIPT_NAME'])?'active':"").'" href="'.$m_Item['link'].'">'.$m_Item['displayName'].'</a>
              </li>
              ';
              }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Offers</h1>
            <span>Lorem ipsum dolor sit amet.</span>
          </div>
        </div>
      </div>
    </div>

    <div class="services">
      <div class="container">
        <div class="row">

          
        <?php
              foreach ($offerItems as $of_Item){
                debug_to_console('/'.$of_Item['title']);
                // debug_to_console($_SERVER['SCRIPT_NAME']);
                echo'
                <div class="col-md-4">
                <div class="service-item">
                  <img src='.$of_Item['imageLink'].' alt="">
                  <div class="down-content">
                    <h4>'.$of_Item['title'].'</h4>
                    <div style="margin-bottom:10px;">
                      <span>from <sup>$</sup>'.$of_Item['minPrice'].' per weekend</span>
                    </div>
                    <p>'.$of_Item['description'].'</p>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="filled-button">Book Now</a>
                  </div>
                </div>
                <!-- // Item -->
                <br>
               </div>
                ';
              }
        ?>

         
        </div>
        <br>
        <br>
      </div>
    </div>

        <!-- Footer Starts Here -->
        <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-item">
            <h4><?php echo $companyName; ?> Website</h4>
            <p><?php echo $description; ?></p>
            <ul class="social-icons">
              <li><a rel="nofollow" href="<?php echo $fbLink; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="<?php echo $twLink; ?>"><i class="fa fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>
                Copyright © <?php echo $companyName; echo $year;?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 70px;">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form id="form-submit" action="bookauto.php" method="get">
                  <div class="row">

                  <div class="row">
                   <div class="col-md-5">
                        <input type="date" name="getDate" id="getDate" class="form-control" placeholder="Pick-up date" required="">
                   </div>

                   <div class="col-md-5">
                        <input type="date" name="returnDate" id="returnDate" class="form-control" placeholder="Return date" required="">
                   </div>
                  </div>
                      <input type="text" name="fullName" id="fullName" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                   <div class="col-md-5">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" required="">
                   </div>

                   <div class="col-md-5">
                        <input type="phone" name="phone" id="phone" class="form-control" placeholder="Enter phone" required="">
                      </fieldset>
                  </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="form-submit" class="btn btn-primary">Book Now</button>
              </div>
              </form>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>