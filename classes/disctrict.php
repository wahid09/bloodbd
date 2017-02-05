<?php
require_once ('db_connect.php');

class District extends Db_Connect {
    public $link;
    public function __construct() {
        $this->link=$this->database_connection();
    }
    // status class add here
    public function save_disctrict_info($data) {
        extract($data);
        $sql="INSERT INTO tbl_disctrict (disc_name, publication_status) VALUES ('$disc_name', '$publication_status' )";
        if(mysqli_query($this->link, $sql)) {
            $message="savedisctrict info save successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_disctrict_info() {
        $sql="SELECT * FROM tbl_disctrict";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function unpublished_disctrict_info_by_id($disc_id) {
        $sql="UPDATE tbl_disctrict SET publication_status = 0 WHERE disc_id = '$disc_id' ";
        if(mysqli_query($this->link, $sql)) {
            $message='Disctrict info unpublished successfully';
            return $message;
           // header('Loication: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function published_disctrict_info_by_id($disc_id) {
        $sql="UPDATE tbl_disctrict SET publication_status = 1 WHERE disc_id = '$disc_id' ";
        if(mysqli_query($this->link, $sql)) {
             $message='Disctrict info published successfully';
            return $message;
            //header('Loication: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_disc_info_by_id($disc_id) {
        $sql="SELECT * FROM tbl_disctrict WHERE disc_id = '$disc_id' ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function update_slogan_info_by_id($data) {
        extract($data);
        $sql="UPDATE tbl_disctrict SET disc_name = '$disctrict', publication_status = '$publication_status' WHERE disc_id = '$disc_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message']='Disctrict info update successfully';
            header('Location: manage_district.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function delete_slogan_info_by_id($slogan_id) {
         $sql="DELETE FROM tbl_district WHERE disc_id = '$sdisc_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message']='Slogan info delete successfully';
            header('Location: manage_disctrict.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }

}