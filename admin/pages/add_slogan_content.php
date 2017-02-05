<?php
   require '../classes/slogan.php';
$obj_slogan=new Slogan();
   $message='';
   
   if(isset($_POST['btn'])) {
       $message=$obj_slogan->save_slogan_info($_POST);
   }
   
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Add Slogan Form</p>
                <h3 class="text-center text-success lead"><?php echo $message; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-lg-3">slogan</label>
                        <div class="col-lg-9">
                            <input type="text" name="slogan" class="form-control" required>
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
                            <input type="submit" name="btn" value="Save Slogan Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>