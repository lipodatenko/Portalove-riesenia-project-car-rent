<?php
include_once "db_connect.php";
$db=$GLOBALS['db'];


// $contacts=$db ->getAllContacts();
// $reservations=$db ->getAllReservations();
// $blogs=$db ->getAllBlogPosts();
// $newsletters=$db ->getAllNewsletter();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visual Admin Dashboard - Home</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!--
    Visual Admin Template
    https://templatemo.com/tm-455-visual-admin
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo_ad   min-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
<!-- Left column -->
<div class="templatemo-flex-row">
    <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
            <div class="square"></div>
            <h1> Admin</h1>
        </header>

        <!-- Search box -->

        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">
            <ul>
                <li><a href="admin.php" class="active"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
                <li><a href="index.php"><i class="fa fa-navicon fa-fw"></i>Web page</a></li>
                <li><a href="menu.php"><i class="fa fa-database fa-fw"></i>Menu</a></li>
                <li><a href="blog.php"><i class="fa fa-book fa-fw"></i>Blog</a></li>
                <li><a href="contact.php"><i class="fa fa-users fa-fw"></i>Contact</a></li>
                <li><a href="insert_blog_form.php"><i class="fa fa-sliders fa-fw"></i>Insert blog post</a></li>

            </ul>
        </nav>
    </div>
    <!-- Main content -->
    <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
            <div class="row">
                <nav class="templatemo-top-nav col-lg-12 col-md-12">
                    <ul class="text-uppercase">
                        <li><a href="admin.php" class="active">Admin panel</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="templatemo-content-container">

            <div class="templatemo-flex-row flex-content-row">

                <div class="col-1">
                    <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                        <i class="fa fa-times"></i>
                        <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Emails</h2></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Phone</td>
                                    <td>Message</td>
                                    <td>Created_at</td>
                                    <td>Update</td>
                                    <td>Delete</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($contacts as $email){  ?>
                                    <tr>
                                        <td><?php echo $email['name']; ?></td>
                                        <td><?php echo $email['email']; ?></td>
                                        <td><?php echo $email['phone']; ?></td>
                                        <td><?php echo $email['message']; ?></td>
                                        <td><?php echo $email['created_at']; ?></td>
                                        <td><a href="delete_contact.php?id=<?php echo $email['id']; ?>">Delete</a></td>
                                        <td><a href="update_contact_form.php?id=<?php echo $email['id']; ?>">Update</a></td>
                                    </tr>

                                <?php    }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- Second row ends -->

            <div class="templatemo-flex-row flex-content-row">

                <div class="col-1">
                    <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                        <i class="fa fa-times"></i>
                        <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Reservations</h2></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Phone</td>
                                    <td>Day</td>
                                    <td>Time</td>
                                    <td>Number of people</td>
                                    <td>Created_at</td>
                                    <td>Status</td>
                                    <td>Update</td>
                                    <td>Delete</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($reservations as $reservation){  ?>
                                    <tr>
                                        <td><?php echo $reservation['name']; ?></td>
                                        <td><?php echo $reservation['phone']; ?></td>
                                        <td><?php echo $reservation['day']; ?></td>
                                        <td><?php echo $reservation['time']; ?></td>
                                        <td><?php echo $reservation['number_of_people']; ?></td>
                                        <td><?php echo $reservation['created_at']; ?></td>
                                        <td><?php echo $reservation['status']; ?></td>
                                        <td><a href="delete_reservation.php?id=<?php echo $reservation['id']; ?>">Delete</a></td>
                                        <td><a href="update_reservation_form.php?id=<?php echo $reservation['id']; ?>">Update</a></td>
                                    </tr>

                                <?php    }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- Second row ends -->

            <div class="templatemo-flex-row flex-content-row">

                <div class="col-1">
                    <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                        <i class="fa fa-times"></i>
                        <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Blog posts</h2></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <td>Title</td>
                                    <td>Author</td>
                                    <td>Image path</td>
                                    <td>Image path for blog entry</td>
                                    <td>Text</td>
                                    <td>Created_at</td>
                                    <td>Update</td>
                                    <td>Delete</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($blogs as $blog){  ?>
                                    <tr>
                                        <td><?php echo $blog['display_name']; ?></td>
                                        <td><?php echo $blog['author']; ?></td>
                                        <td><?php echo $blog['image']; ?></td>
                                        <td><?php echo $blog['image_blog_entries']; ?></td>
                                        <td><?php echo $blog['text']; ?></td>
                                        <td><?php echo $blog['created_at']; ?></td>
                                        <td><a href="delete_blog.php?id=<?php echo $blog['id']; ?>">Delete</a></td>
                                        <td><a href="update_blog_form.php?id=<?php echo $blog['id']; ?>">Update</a></td>
                                    </tr>

                                <?php    }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- Second row ends -->


            <div class="col-1">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <i class="fa fa-times"></i>
                    <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Newsletter</h2></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>Email</td>
                                <td>Created at</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($newsletters as $newsletter){  ?>
                                <tr>
                                    <td><?php echo $newsletter['email']; ?></td>
                                    <td><?php echo $newsletter['created_at']; ?></td>
                                    <td><a href="delete_newsletter.php?id=<?php echo $newsletter['id']; ?>">Delete</a></td>
                                </tr>

                            <?php    }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Second row ends -->





            <footer class="text-right">
                <p>Copyright &copy; 2084 Company Name
                    | Design: Template Mo</p>
            </footer>
        </div>
    </div>
</div>

<!-- JS -->
<!-- Templatemo Script -->

</body>
</html>
