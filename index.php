<!DOCTYPE html>
<html lang="en">
<head>
  <title>BloodBD||Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
  <link rel="stylesheet" href="assets/front_end/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/front_end/css/style.css">
<style>
.navbar{
  background-color: white;
}


  .navbar-inverse .navbar-nav>li>a {
    color: black;
}
.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
    color: #fff;
    background-color: #9e0909;
}

/* visited link */
.navbar-inverse .navbar-nav>li>a:visited {
    color: black;
}

/* mouse over link */
.navbar-inverse .navbar-nav>li>a:hover {
    color: #fff;
    background-color: #9e0909;
}
body{
  background-color: #9e0909;
}
.body_content{
  background-color: white;
}
</style>
</head>
<body>
<?php include './includes/header.php'; ?>
<?php
if(isset($pages)) {
                if($pages == 'about') {
                     include './pages/about_content.php';
                }
                else if($pages == 'register') {
                    include './pages/register_content.php';
                }else if($pages == 'contact') {
                    include './pages/contact_content.php';
                }
                
                }else {
                include './pages/home_content.php';
            }
?>


    <!--                                  Media area is here End -->
   <!--               footer area start in here -->
   <?php include './includes/footer.php'; ?>
</body>
</html>
