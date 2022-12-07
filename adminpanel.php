<?php
include_once "db_connect.php";


$db=$GLOBALS['db'];
$bookItems = $db ->getBookings();
$mesItems = $db ->getMessages();

function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
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
        <h3 class="text-muted">Admin panel</h3>
      </div>

      

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Reservations</h4>
          <p><ul class="list-group">
  
</ul>
<table class="table">		  
    <thead>			
        <tr>			  
            <th>id</th>			  
            <th>Full Name</th>			  
            <th>Phone</th>			  
            <th>Email</th>
            <th>book from</th>
            <th>book to</th>
            <th>status</th>
            <th>created</th>
            <th>updated</th>
            <td>Update</td>
            <td>Delete</td>			
        </tr>		
      </thead>		
        <tbody>	
            <?php
                foreach ($bookItems as $b_item){  ?>
                    <tr>
                        <td><?php echo $b_item['id']; ?></td>
                        <td><?php echo $b_item['fullName']; ?></td>
                        <td><?php echo $b_item['phone']; ?></td>
                        <td><?php echo $b_item['email']; ?></td>
                        <td><?php echo $b_item['getDate']; ?></td>
                        <td><?php echo $b_item['returnDate']; ?></td>
                        <td><?php echo $b_item['status']; ?></td>
                        <td><?php echo $b_item['created']; ?></td>
                        <td><?php echo $b_item['updated']; ?></td>
                        <td><a href="deletebooking.php?id=<?php echo $b_item['id']; ?>">Delete</a></td>
                        <td><a href="updatebooking_form.php?id=<?php echo $b_item['id']; ?>">Update</a></td>
                    </tr>

                <?php    } ?>		
            </tbody>		
        </table>
      </p>

          
          

          
          
        </div>

        
      </div>
      <br><br><br>
      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Messages</h4>
          <p><ul class="list-group">
  
</ul>
<table class="table">		  
    <thead>			
        <tr>			  
            <th>Date</th>			  
            <th>Full Name</th>			  			  
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>			
        </tr>		
      </thead>		
        <tbody>	
            <?php
                foreach ($mesItems as $m_item){  ?>
                    <tr>
                        <td><?php echo $m_item['created']; ?></td>
                        <td><?php echo $m_item['fullName']; ?></td>
                        <td><?php echo $m_item['email']; ?></td>
                        <td><?php echo $m_item['subject']; ?></td>
                        <td><?php echo $m_item['message']; ?></td>
                    </tr>

                <?php    } ?>		
            </tbody>		
        </table>
      </p>

          
          

          
          
        </div>

        
      </div>

      <footer class="footer">
        
      </footer>

    </div> <!-- /container -->
  

</body>
</html>