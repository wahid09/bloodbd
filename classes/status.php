<?php
require_once ('db_connect.php');

class Status extends Db_Connect {
    public $link;
    public function __construct() {
        $this->link=$this->database_connection();
    }
    // status class add here
    public function save_status_info($data) {
        extract($data);
        $sql="INSERT INTO tbl_status (status_name, publication_status) VALUES ('$status_name', '$publication_status' )";
        if(mysqli_query($this->link, $sql)) {
            $message="Status info save successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_status_info() {
        $sql="SELECT * FROM tbl_status";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function unpublished_status_info_by_id($status_id) {
        $sql="UPDATE tbl_status SET publication_status = 0 WHERE status_id = '$status_id' ";
        if(mysqli_query($this->link, $sql)) {
            $message='Status info unpublished successfully';
            return $message;
           // header('Loication: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function published_status_info_by_id($status_id) {
        $sql="UPDATE tbl_status SET publication_status = 1 WHERE status_id = '$status_id' ";
        if(mysqli_query($this->link, $sql)) {
             $message='Status info published successfully';
            return $message;
            //header('Loication: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_status_info_by_id($status_id) {
        $sql="SELECT * FROM tbl_status WHERE status_id = '$status_id' ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function update_status_info_by_id($data) {
        extract($data);
        $sql="UPDATE tbl_status SET status_name = '$status_name', publication_status = '$publication_status' WHERE status_id = '$status_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message']='Status info update successfully';
            header('Location: manage_status.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function delete_status_info_by_id($status_id) {
         $sql="DELETE FROM tbl_status WHERE status_id = '$status_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message']='Status info delete successfully';
            header('Location: manage_status.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }

}