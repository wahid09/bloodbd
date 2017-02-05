<?php
require '../classes/slogan.php';
$obj_slogan=new Slogan();
$message= '';

if(isset($_GET['status'])) {
    $slogan_id=$_GET['id'];
    if($_GET['status'] == 'unpublished') {
        $message = $obj_slogan->unpublished_slogan_info_by_id($slogan_id);
    }
    else if ($_GET['status'] == 'published') {
         $message = $obj_slogan->published_slogan_info_by_id($slogan_id);
    }
    else if ($_GET['status'] == 'delete') {
         $message = $obj_slogan->delete_slogan_info_by_id($slogan_id);
    }
} 
$query_result = $obj_slogan->select_all_slogan_info();
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
                All Slogan information goese here
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Status Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; while ( $slogan_info = mysqli_fetch_assoc($query_result))  { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $slogan_info['slogan']; ?></td>
                            <td class="center"><?php 
                                if ( $slogan_info['publication_status'] == 1 ) {
                                    echo 'Published';
                                }  else {
                                    echo 'Unpublished';
                                }
                            ?></td>
                            <td class="center">
                                <?php  if ( $slogan_info['publication_status'] == 1 ) { ?>
                                <a href="?status=unpublished&&id=<?php echo $slogan_info['slogan_id']; ?>" class="btn btn-primary" title="Unpublished">
                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                </a>
                                <?php } else { ?>
                                <a href="?status=published&&id=<?php echo $slogan_info['slogan_id']; ?>" class="btn btn-danger" title="Published">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                <?php } ?>
                                <a href="edit_slogan.php?id=<?php echo $slogan_info['slogan_id']; ?>" class="btn btn-success" title="Edit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="?status=delete&&id=<?php echo $slogan_info['slogan_id']; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status(); ">
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