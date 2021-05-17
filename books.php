<?php require_once './config/auth.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Books</title>
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
                            <h4>Books</h4>
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-book-modal">
                                        <i class="feather feather-file-plus"></i>
                                        ADD BOOK
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
							<div class="table-responsive">
                                <table id="table-books" class="table table-striped table-bordered" style="width:100%"></table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="add-book-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add/Update Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-book">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body"> 
                                            <h5>Book Information</h5>
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title">
                                            <label>Category</label>
                                            <select class="form-control" name="category" id="category"></select>
                                            <label>Date Published</label>
                                            <input type="date" class="form-control" name="datepub">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" name="qty">
                                            <label>Place Of Published</label>
                                            <input type="text" class="form-control" name="published">
                                            <label>Price</label>
                                            <input type="number" class="form-control" name="price">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="description">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body"> 
                                            <h5>Local and Other Information</h5>
                                            <label>Classification</label>
                                            <select class="form-control" name="classification" id="classification"></select>
                                            <label>Division</label>
                                            <select class="form-control" name="division" id="division"></select>
                                            <label>Section Name</label>
                                            <select class="form-control" name="section" id="section"></select>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Year</label>
                                                    <select class="form-control" name="year" id="year"></select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Language</label>
                                                    <select class="form-control" name="language" id="language"></select>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Main Author</label>
                                                    <input type="text" class="form-control" name="author">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Subject</label>
                                                    <select class="form-control" name="subject" id="subject"></select>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Shelf</label>
                                                    <input type="text" class="form-control" name="shelf">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Type</label>
                                                    <input type="text" class="form-control" name="typeof">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Genre</label>
                                                    <select class="form-control" name="genre" id="genre"></select>
                                                </div>
                                            </div>
                                            

                                        </div>
                                    </div>
                                </div>

                            </div>
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
    <script src="pages/books.js"></script>
</body>
</html>