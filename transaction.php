<?php require_once './config/auth.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Transactions</title>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card radius-15">
                                <div class="card-header">
                                    <h4>Borrowed Books</h4>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button data-toggle="modal" data-target="#borrowed-modal" class="btn btn-light btn-sm">   
                                                Borrow Book(s)
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="borrowed-table-books" class="table table-striiped" style="width:100%;"></table>
                                    </div>
                                    <hr />
                                    
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button id="returned-books" class="btn btn-light btn-sm">   
                                                Return Book(s)
                                            </button>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card radius-15">
                                <div class="card-header">
                                    <h4>Returned Books</h4>
                                    <!-- <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-light btn-striped">   
                                                Return Book(s)
                                            </button>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="returned-table-books" class="table table-striiped" style="width:100%;"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="borrowed-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Borrow Books</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <label>Student Name</label>
                            <select class="form-control" id="student-name"></select>

                            <table id="table-books-borrow" style="width:100%" class="table table-striped"></table>
                            <label>Notes</label>
                            <textarea row="3" id="notes" class="form-control" readonly value="Sample Notes">Please Return This Book Within 3 Days or else You'll Have A Penalty And If You Lost It You'll Pay For It.</textarea>  
                            <hr />
                            <button id="btnBorrowedBooks" type="button" class="btn btn-light">Borrow Book(s)</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include './partials/footer.extention.php' ?>
    <script>var access ="<?php echo $access; ?>"</script>
    <script src="pages/transaction.js"></script>
</body>
</html>