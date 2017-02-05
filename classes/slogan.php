<?php
require_once ('db_connect.php');

class Slogan extends Db_Connect {
    public $link;
    public function __construct() {
        $this->link=$this->database_connection();
    }
    // status class add here
    public function save_slogan_info($data) {
        extract($data);
        $sql="INSERT INTO tbl_slogan (slogan, publication_status) VALUES ('$slogan', '$publication_status' )";
        if(mysqli_query($this->link, $sql)) {
            $message="Slogan info save successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_slogan_info() {
        $sql="SELECT * FROM tbl_slogan";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function unpublished_slogan_info_by_id($slogan_id) {
        $sql="UPDATE tbl_slogan SET publication_status = 0 WHERE slogan_id = '$slogan_id' ";
        if(mysqli_query($this->link, $sql)) {
            $message='Slogan info unpublished successfully';
            return $message;
           // header('Loication: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function published_slogan_info_by_id($slogan_id) {
        $sql="UPDATE tbl_slogan SET publication_status = 1 WHERE slogan_id = '$slogan_id' ";
        if(mysqli_query($this->link, $sql)) {
             $message='Slogan info published successfully';
            return $message;
            //header('Loication: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_slogan_info_by_id($slogan_id) {
        $sql="SELECT * FROM tbl_slogan WHERE slogan_id = '$slogan_id' ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function update_slogan_info_by_id($data) {
        extract($data);
        $sql="UPDATE tbl_slogan SET slogan = '$slogan', publication_status = '$publication_status' WHERE slogan_id = '$slogan_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message']='Slogan info update successfully';
            header('Location: manage_slogan.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function delete_slogan_info_by_id($slogan_id) {
         $sql="DELETE FROM tbl_slogan WHERE slogan_id = '$slogan_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message']='Slogan info delete successfully';
            header('Location: manage_slogan.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }

}