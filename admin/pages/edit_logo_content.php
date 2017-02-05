<?php
require '../classes/logo.php';
$obj_logo=new Logo();
$logo_id = $_GET['id']; 
$query_result = $obj_logo->select_logo_info_by_id($logo_id);
 $logo_info = mysqli_fetch_assoc($query_result);
 extract($logo_info);

   if(isset($_POST['btn'])) {
       $obj_logo->update_logo_info_by_id($_POST);
   }
   
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Edit logo Form</p>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" name="edit_category_form">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Logo Title</label>
                        <div class="col-lg-9">
                            <input type="text" name="logo_title" value="<?php echo $logo_title; ?>" class="form-control" required>
                            <input type="hidden" name="logo_id" value="<?php echo $logo_id; ?>" class="form-control" required>
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
    document.forms['edit_logo_form'].elements['publication_status'].value='<?php echo $publication_status; ?>';
</script>