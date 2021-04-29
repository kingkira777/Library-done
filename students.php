<?php require_once './config/auth.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Students</title>
    <?php include './partials/head.extention.php' ?>
</head>
<body class="bg-theme bg-theme1">
    <div class="wrapper">
        
        <!-- SIDEBAR -->
        <?php include"./partials/sidebar.php" ?>
        <!-- TOPBAR -->
        <?php include"./partials/topbar.php" ?>


        <div class="page-wrapper">
            <div class="page-content-wrapper">
                <div class="page-content">
                    
                    <div class="card radius-15">
                        <div class="card-header">
                            <h4>Student List</h4>
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-student-modal">
                                        <i class="feather feather-file-plus"></i>
                                        ADD STUDENT
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
							<div class="table-responsive">
                                <table id="table-students" class="table table-striped table-bordered" style="width:100%"></table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="add-student-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add/Update Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-student">
                            <label>Student No</label>
                            <input type="text" class="form-control" name="no">
                            <label>Firstname</label>
                            <input type="text" class="form-control" name="firstname">
                            <label>Lastname</label>
                            <input type="text" class="form-control" name="lastname">
                            <label>Middlename</label>
                            <input type="text" class="form-control" name="middlename">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="dob">
                            <label>Contact#</label>
                            <input type="text" class="form-control" name="contactno">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address">
                            <hr />
                            <button type="submit" class="btn btn-light">Save/Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include './partials/footer.extention.php' ?>
    <script>var access ="<?php echo $access; ?>"</script>
    <script src="pages/students.js"></script>
</body>
</html>