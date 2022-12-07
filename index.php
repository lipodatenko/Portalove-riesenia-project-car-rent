<?php
include_once "db_connect.php";


$db=$GLOBALS['db'];
$menuItems = $db->getMenu();
$bannerItems = $db->getBanner();
$offerItems = $db->getOffers();
$contactItems = $db->getContacts();
$comItems = $db->getComments();
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

    <title><?php echo $companyName; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">

          <?php
              foreach ($bannerItems as $b_Item){
                // debug_to_console('/'.$b_Item['link']);
                // debug_to_console($_SERVER['SCRIPT_NAME']);
                echo'
                <!-- Item -->
                <div class="item" >
                  <div class="img-fill" style="background-image: url('.$b_Item['imageLink'].')">
                      <div class="text-content">
                        <h6>'.$b_Item['title'].'</h6>
                        <h4>'.$b_Item['mainText'].'</h4>
                        <p>'.$b_Item['description'].'</p>
                        <a href="'.$b_Item['buttonLink'].'" class="filled-button">'.$b_Item['button'].'</a>
                      </div>
                  </div>
                </div>
                <!-- // Item -->
                
                ';
              }
              ?>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="request-form">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h4>Request a call back right now ?</h4>
            <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
          </div>
          <div class="col-md-4">
            <a href="contact.php" class="border-button">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our <em>Offers</em></h2>
            </div>
          </div>
          <?php            
              $index = 0;
              foreach ($offerItems as $of_Item){
                debug_to_console('/'.$of_Item['title']);
                if($index<3){
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
                      <a href="offers.php" class="filled-button">Check more offers</a>
                    </div>
                  </div>
                  <!-- // Item -->
                  <br>
                 </div>
                  ';
                  $index++;
                } else{
                  break;
                }
              }
        ?>
        </div>
      </div>
    </div>

    <div class="fun-facts">
      <div class="container">
        <div class="more-info-content">
          <div class="row">
            <div class="col-md-6">
              <div class="left-image">
                <img src="assets/images/about-1-570x350.jpg" class="img-fluid" alt="">
              </div>
            </div>
            <div class="col-md-6 align-self-center">
              <div class="right-content">
                <span>Who we are</span>
                <h2>Get to know about <em>our company</em></h2>
                <p>Get to know about our company. Sed non sagittis neque. Nulla conse quat tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus</p>
                <a href="about.php" class="filled-button">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="testimonials">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>What they say <em>about us</em></h2>
              <span>testimonials from our greatest clients</span>
            </div>
          </div>
          <div class="col-md-12">
            <div>

            <?php
            foreach ($comItems as $c_Item){
              echo'
              <!-- Comment -->
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>'.$c_Item['fullName'].'</h4>
                  <span>'.$c_Item['position'].'</span>
                  <p>'.$c_Item['comment'].'</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              <!-- // Comment -->
              ';
              }
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>

   

        <br>
        <br>
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
