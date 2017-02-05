<?php
require_once ('db_connect.php');

class Logo extends Db_Connect {
    public $link;
    public function __construct() {
        $this->link=$this->database_connection();
    }
    public function save_logo_info($data){
    	$directory = '../assets/logo_images/';
    $target_file = $directory . $_FILES['logo_image']['name'];
    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_size = $_FILES['logo_image']['size'];
    $check = getimagesize($_FILES['logo_image']['tmp_name']);
    if ($check) {
        if(file_exists($target_file)) {
            die("This image already exists. please try another one !");
        } else {
            if($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
                die('Sorry the file type is not valid. use jpg or png.');
            } else {
              if($file_size > 100000 ) {
                  die("your file size is too large. please use with in 10mb");
              } else {
                  move_uploaded_file($_FILES['logo_image']['tmp_name'], $target_file);
                  $sql="INSERT INTO tbl_logo (logo_title, logo_image, publication_status) VALUES ('$data[logo_title]', '$target_file', '$data[publication_status]')";
                  if(mysqli_query($this->link, $sql));{
                  $message="logo info save successfully";
                  return $message; 
               }
               //else{
              // 	die('Query Problem'.mysqli_error($this->link));
              // }
              } 
            }
        }
    } else {
        die('Please select an valid image  file for upload');
    }
	}
	public function select_all_logo_info(){
		$sql="SELECT * FROM tbl_logo";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
	}
	public function unpublished_logo_info_by_id($logo_id) {
        $sql="UPDATE tbl_logo SET publication_status = 0 WHERE logo_id = '$logo_id' ";
        if(mysqli_query($this->link, $sql)) {
            $message='Logo info unpublished successfully';
            return $message;
           // header('Loication: manage_logo.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function published_logo_info_by_id($logo_id) {
        $sql="UPDATE tbl_logo SET publication_status = 1 WHERE logo_id = '$logo_id' ";
        if(mysqli_query($this->link, $sql)) {
             $message='Logo info published successfully';
            return $message;
            //header('Loication: manage_logo.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_logo_info_by_id($logo_id) {
        $sql="SELECT * FROM tbl_logo WHERE logo_id='$logo_id'";
        if(mysqli_query($this->link, $sql)){
            $query_result=mysqli_query($this->link, $sql);
            return $query_result;
        }else{
            die('Query Problem'.mysqli_error($this->link));
        }
    }
    public function update_logo_info_by_id($data) {
        extract($data);
        $sql="UPDATE tbl_logo SET logo_title = '$logo_title', publication_status = '$publication_status' WHERE logo_id = '$logo_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message']='Logo info update successfully';
            header('Location: manage_logo.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function delete_logo_info_by_id($logo_id) {
         $sql="DELETE FROM tbl_logo WHERE logo_id = '$logo_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message']='Logo info delete successfully';
            header('Location: manage_logo.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    }