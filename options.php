<?php require_once './config/auth.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Options</title>
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
                                    <h4>Category List</h4>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-category-modal">
                                                <i class="feather feather-file-plus"></i>
                                                ADD CATEGORY
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-category" class="table table-striped table-bordered" style="width:100%"></table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card radius-15">
                                <div class="card-header">
                                    <h4>Year List</h4>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-year-modal">
                                                <i class="feather feather-file-plus"></i>
                                                ADD YEAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-years" class="table table-striped table-bordered" style="width:100%"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card radius-15">
                                <div class="card-header">
                                    <h4>Section List</h4>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-section-modal">
                                                <i class="feather feather-file-plus"></i>
                                                ADD SECTION
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-sections" class="table table-striped table-bordered" style="width:100%"></table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card radius-15">
                                <div class="card-header">
                                    <h4>Gradelevel List</h4>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-gradelevel-modal">
                                                <i class="feather feather-file-plus"></i>
                                                ADD GRADELEVEL
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-gradelevel" class="table table-striped table-bordered" style="width:100%"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-6">
                            <div class="card radius-15">
                                <div class="card-header">
                                    <h4>Division List</h4>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-division-modal">
                                                <i class="feather feather-file-plus"></i>
                                                ADD DIVISION
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-division" class="table table-striped table-bordered" style="width:100%"></table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card radius-15">
                                <div class="card-header">
                                    <h4>Genre List</h4>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-genre-modal">
                                                <i class="feather feather-file-plus"></i>
                                                ADD GENRE
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-genre" class="table table-striped table-bordered" style="width:100%"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card radius-15">
                                <div class="card-header">
                                    <h4>Language List</h4>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-lang-modal">
                                                <i class="feather feather-file-plus"></i>
                                                ADD LANGUAGE
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-language" class="table table-striped table-bordered" style="width:100%"></table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card radius-15">
                                <div class="card-header">
                                    <h4>Classification List</h4>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-class-modal">
                                                <i class="feather feather-file-plus"></i>
                                                ADD CLASSIFICATION
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-class" class="table table-striped table-bordered" style="width:100%"></table>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="card radius-15">
                                <div class="card-header">
                                    <h4>Subject List</h4>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-subject-modal">
                                                <i class="feather feather-file-plus"></i>
                                                ADD SUBJECT
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-subject" class="table table-striped table-bordered" style="width:100%"></table>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    </div>


                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="add-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-category">
                            <label>Cateogry</label>
                            <input type="text" class="form-control" name="category">
                            <hr />
                            <button type="submit" class="btn btn-light">Save/Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- YEAR -->
        <div class="modal fade" id="add-year-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Year</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-year">
                            <label>Year</label>
                            <input type="number" class="form-control" id="year">
                            <hr />
                            <button type="submit" class="btn btn-light">Save/Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- SECTION -->
        <div class="modal fade" id="add-section-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Section</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-section">
                            <label>Section</label>
                            <input type="text" class="form-control" id="section">
                            <hr />
                            <button type="submit" class="btn btn-light">Save/Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- GRADE LEVE -->
        <div class="modal fade" id="add-gradelevel-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Gradelevel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-gradelevel">
                            <label>Grade Level</label>
                            <input type="text" class="form-control" id="gradelevel">
                            <hr />
                            <button type="submit" class="btn btn-light">Save/Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- DIVISION -->
        <div class="modal fade" id="add-division-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Division</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-division">
                            <label>Grade Level</label>
                            <input type="text" class="form-control" id="division">
                            <hr />
                            <button type="submit" class="btn btn-light">Save/Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- GENRE -->
        <div class="modal fade" id="add-genre-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Genre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-genre">
                            <label>Genre</label>
                            <input type="text" class="form-control" id="genre">
                            <hr />
                            <button type="submit" class="btn btn-light">Save/Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


         <!-- LANGUAGE -->
         <div class="modal fade" id="add-lang-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Language</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-lang">
                            <label>Language</label>
                            <input type="text" class="form-control" id="lang">
                            <hr />
                            <button type="submit" class="btn btn-light">Save/Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Classifications -->
        <div class="modal fade" id="add-class-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Classification</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-class">
                            <label>Classification</label>
                            <input type="text" class="form-control" id="class">
                            <hr />
                            <button type="submit" class="btn btn-light">Save/Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subject -->
        <div class="modal fade" id="add-subject-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-subject">
                            <label>Subject</label>
                            <input type="text" class="form-control" id="subject">
                            <hr />
                            <button type="submit" class="btn btn-light">Save/Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php include './partials/footer.extention.php' ?>
    <script src="pages/options.js"></script>
</body>
</html>