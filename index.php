<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Front Page</title>

    <!--Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 15px;
        padding-bottom: 20px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    
    <!-- Icons -->
    <link rel="shortcut icon" href="http://twitter.github.com/bootstrap/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">
  </head>


  <body>
    <!--Start of Center Section-->
    <div id="center-section">

        <!--Start of Navigation Bar-->
        <div class="navbar navbar-inverse ">
            <div class="navbar-inner">
                <div class="container-nav">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <!--Links to Account Login and Cart-->
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                        <ul class="nav pull-right">
                            <a class="brand" href="#">Login/Create Account</a>
                            <a class="brand" href="#">My Cart</a>
                        </ul>
                        </p>
                    </div>
                    <!--Search Bar-->
                    <form class="form-search">
                        <div style="text-align:left">
                            <input type="text" class="span6  input-large search-query">
                            <button type="submit" class="btn">Search</button>
                        </div>
                    </form><!--End of Search Bar-->
                </div>
            </div>
        </div><!--End of Navigation Bar-->

        <!--Start of the Center Section below the Navigation Bar-->
        <div class="container-center">
            <div class="row-fluid">
                <!--Logo Here-->
                <a class="brand" href="index.html"> <img src="assets/img/logo.png"></a>
            </div>
        

            <?php
             $con = mysql_connect("studentdb.gl.umbc.edu","clargr1","clargr1") or die("Could not connect to MySQL");
             $rs = mysql_select_db("clargr1", $con) or die("Could not connect select $db database");
             $query = "";
             $row = array();
            
            ?>
            <!--Start of Sidebar-->
            <div class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="nav-header">Product Categories</li>
                            <?php include 'sidebar.php';?>
                        </ul>
                    </div><!--End of Sidebar-->
                </div><!--Span-->
        
                <!--Start of Featured Section-->
                <div class="span9">
                    <div class="container-main">
                        <h3>Featured Items</h3>
                        <div id="featured" class="carousel slide">  
                            <!-- Carousel items -->  
                            <div class="carousel-inner">  
                                <div class="active item"><img src="assets/timg/t1.jpg" alt="" width="400" height="100" >&rsaquo;
                                <div class="carousel-caption">
                                    <p>Featured 1</p></div></div>  
                                <div class="item"><img src="assets/timg/t2.jpg" alt="" width="400" height="100" >&rsaquo;
                                <div class="carousel-caption">
                                    <p>Featured 2</p></div></div>    
                                <div class="item"><img src="assets/timg/t3.jpg" alt="" width="400" height="100" >&rsaquo;
                                <div class="carousel-caption">
                                    <p>Featured 3</p></div></div>       
                            </div>  
                            <!-- Carousel nav -->  
                            <a class="carousel-control left" href="#featured" data-slide="prev">&lsaquo;</a>  
                            <a class="carousel-control right" href="#featured" data-slide="next">&rsaquo;</a>  
                        </div><!--End of Featured Section-->
                    </div><!--Span-->
                    <hr><!--Breakline between Featured Section and New Items Display-->
                </div><!--End of row containing sidebar and main section-->

                <!--Start of New Items Display-->
                <div class="row-fluid">
                    <!--Start of Newest Item Display-->
                    <div class="offset3 span4">
                        <h3>New Item #1</h3>
                        <p>
                            Item Details
                        </p>
                        <p><a class="btn" href="#">View details »</a></p>
                    </div><!--End of Newest Item Display-->

                    <!--Start of 2nd Newest Item Display-->
                    <div class="offset1 span4">
                        <h3>New Item #2</h3>
                        <p>
                            Item Details
                        </p>
                        <p><a class="btn" href="#">View details »</a></p>
                    </div><!--Start of 2nd Newest Item Display-->
                </div><!--End of New Items Display-->

      <hr><!--Breakline before Footer-->
      <!--Footer-->
      <footer>
        <p><a href="#">Contact Us</a></p>
      </footer>

        </div><!--End of the Center Section below the Navigation Bar-->
    </div><!--End of Center Section-->
    

    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery-1.8.2.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body></html>