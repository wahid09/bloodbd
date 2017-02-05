<?php
    require './classes/application.php';
    $obj_app = new Application();
    
   $category_result = $obj_app->select_all_published_category_info();
    $status_result = $obj_app->select_all_published_status_info();
    $slogan_result = $obj_app->select_all_published_slogan_info();
    $disctric_result = $obj_app->select_all_published_disctric_info();
   
   if(isset($_POST['btn'])) {
       $message = $obj_product->save_product_info($_POST);
   }
                   // registration area
   // if ( isset($_POST['btn']) ) {
  
  // clean user inputs to prevent sql injections
 //  $name = trim($_POST['name']);
 //  $name = strip_tags($name);
 //  $name = htmlspecialchars($name);
  
 //  $email = trim($_POST['email']);
 //  $email = strip_tags($email);
 //  $email = htmlspecialchars($email);
  
 //  $pass = trim($_POST['pass']);
 //  $pass = strip_tags($pass);
 //  $pass = htmlspecialchars($pass);
  
 //  // basic name validation
 //  if (empty($name)) {
 //   $error = true;
 //   $nameError = "Please enter your full name.";
 //  } else if (strlen($name) < 3) {
 //   $error = true;
 //   $nameError = "Name must have atleat 3 characters.";
 //  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
 //   $error = true;
 //   $nameError = "Name must contain alphabets and space.";
 //  }
  
 //  //basic email validation
 //  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
 //   $error = true;
 //   $emailError = "Please enter valid email address.";
 //  } else {
 //   // check email exist or not
 //   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
 //   $result = mysql_query($query);
 //   $count = mysql_num_rows($result);
 //   if($count!=0){
 //    $error = true;
 //    $emailError = "Provided Email is already in use.";
 //   }
 //  }
 //  // password validation
 //  if (empty($pass)){
 //   $error = true;
 //   $passError = "Please enter password.";
 //  } else if(strlen($pass) < 6) {
 //   $error = true;
 //   $passError = "Password must have atleast 6 characters.";
 //  }
  
 //  // password encrypt using SHA256();
 //  $password = hash('sha256', $pass);
  
 //  // if there's no error, continue to signup
 //  if( !$error ) {
   
 //   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
 //   $res = mysql_query($query);
    
 //   if ($res) {
 //    $errTyp = "success";
 //    $errMSG = "Successfully registered, you may login now";
 //    unset($name);
 //    unset($email);
 //    unset($pass);
 //   } else {
 //    $errTyp = "danger";
 //    $errMSG = "Something went wrong, try again later..."; 
 //   } 
    
 //  }
  
  
 // }

?>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">if you want to be a blood donor, Please fill up This form. </p>
                <h3 class="text-center text-success lead"><?php //echo $message; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                        <label class="control-label col-lg-3">Blood Group</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="publication_status">
                                <option> --- Please Select Blood Group --- </option>
                                <?php while ($published_category = mysqli_fetch_assoc($category_result)) { ?>
                                <option value="<?php echo $published_category['category_id']; ?>"><?php echo $published_category['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">User Name</label>
                        <div class="col-lg-9">
                            <input type="text" name="user_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Password</label>
                        <div class="col-lg-9">
                            <input type="number" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Status</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="publication_status">
                                <option> --- Please Select Donation status --- </option>
                                <?php while ($published_status = mysqli_fetch_assoc($status_result)) { ?>
                                <option value="<?php echo $published_status['status_id']; ?>"><?php echo $published_status['status_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Prefered Slogan</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="publication_status">
                                <option> --- Please Select Your Slogan --- </option>
                                <?php while ($published_slogan = mysqli_fetch_assoc($slogan_result)) { ?>
                                <option value="<?php echo $published_slogan['slogan_id']; ?>"><?php echo $published_slogan['slogan']; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Donor Name</label>
                        <div class="col-lg-9">
                            <input type="text" name="donor_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">E-mail</label>
                        <div class="col-lg-9">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">District</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="publication_status">
                                <option> --- Please Select Your District --- </option>
                                <?php while ($published_disctric = mysqli_fetch_assoc($disctric_result)) { ?>
                                <option value="<?php echo $published_disctric['disc_id']; ?>"><?php echo $published_disctric['disc_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Last Donatino Date</label>
                        <div class="col-lg-9">
                            <input type="Date" name="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Contact Number</label>
                        <div class="col-lg-9">
                            <input type="number" name="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Save Me" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>