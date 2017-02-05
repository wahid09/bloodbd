<?php
require '../classes/disctrict.php';
$obj_disc=new District();
$disc_id = $_GET['id']; 
$query_result = $obj_disc->select_disc_info_by_id($disc_id);
 $disc_info = mysqli_fetch_assoc($query_result);
 extract($slogan_info);

   if(isset($_POST['btn'])) {
       $obj_disc->update_disc_info_by_id($_POST);
   }
   
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Edit Disctrict Form</p>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" name="edit_category_form">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Disctrict Nmae</label>
                        <div class="col-lg-9">
                            <input type="text" name="slogan" value="<?php echo $disc_name; ?>" class="form-control" required>
                            <input type="hidden" name="$disc_id" value="<?php echo $disc_id; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Publication Status</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="publication_status">
                                <option> --- Select Publication Status --- </option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Update Category Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['edit_category_form'].elements['publication_status'].value='<?php echo $publication_status; ?>';
</script>