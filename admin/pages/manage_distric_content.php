<?php
require '../classes/disctrict.php';
$obj_disc=new District();
$message= '';

if(isset($_GET['status'])) {
    $disc_id=$_GET['id'];
    if($_GET['status'] == 'unpublished') {
        $message = $obj_disc->unpublished_disctrict_info_by_id($disc_id);
    }
    else if ($_GET['status'] == 'published') {
         $message = $obj_disc->published_disctrict_info_by_id($disc_id);
    }
    else if ($_GET['status'] == 'delete') {
         $message = $obj_disc->delete_slogan_info_by_id($disc_id);
    }
} 
$query_result = $obj_disc->select_all_disctrict_info();
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center text-success">
            <?php echo $message; ?>
            <?php
                if(isset($_SESSION['message'])) {
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                }
            ?>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center lead">
                All Disctrict information goese here
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Disctrict Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; while ( $disc_info = mysqli_fetch_assoc($query_result))  { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $disc_info['disc_name']; ?></td>
                            <td class="center"><?php 
                                if ( $disc_info['publication_status'] == 1 ) {
                                    echo 'Published';
                                }  else {
                                    echo 'Unpublished';
                                }
                            ?></td>
                            <td class="center">
                                <?php  if ( $disc_info['publication_status'] == 1 ) { ?>
                                <a href="?status=unpublished&&id=<?php echo $disc_info['disc_id']; ?>" class="btn btn-primary" title="Unpublished">
                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                </a>
                                <?php } else { ?>
                                <a href="?status=published&&id=<?php echo $disc_info['disc_id']; ?>" class="btn btn-danger" title="Published">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                <?php } ?>
                                <a href="edit_disctrict.php?id=<?php echo $disc_info['disc_id']; ?>" class="btn btn-success" title="Edit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="?status=delete&&id=<?php echo $slogan_info['disc_id']; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status(); ">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>