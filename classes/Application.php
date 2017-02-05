<?php
require_once ('db_connect.php');

class Application extends Db_Connect {
    //put your code here
    public $link;
    public function __construct() {
        $this->link = $this->database_connection();
    }
    public function select_all_published_category_info() {
        $sql="SELECT * FROM tbl_category WHERE publication_status = 1";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_published_status_info() {
        $sql="SELECT * FROM tbl_status WHERE publication_status = 1";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_published_slogan_info() {
        $sql="SELECT * FROM tbl_slogan WHERE publication_status = 1";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_published_disctric_info() {
        $sql="SELECT * FROM tbl_disctrict WHERE publication_status = 1";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    // public function select_product_info_by_manufacturer_id($manufacturer_id) {
    //     $sql="SELECT * FROM tbl_product WHERE publication_status = 1 AND manufacturer_id = '$manufacturer_id' ";
    //     if(mysqli_query($this->link, $sql)) {
    //         $query_result = mysqli_query($this->link, $sql);
    //         return $query_result;
    //     } else {
    //         die('Query problem'.mysqli_error($this->link) );
    //     }
    // }
}
