<?php require_once './config/auth.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>
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
                    <div class="card-deck flex-column flex-lg-row">
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <div class="widgets-icons mx-auto rounded-circle"><i class="bx bx-line-chart"></i>
                                </div>
                                <h4 class="mb-0 font-weight-bold mt-3 text-white" id="d_bbooks">0</h4>
                                <p class="mb-0 text-white">Total Borrowed Books</p>
                            </div>
                        </div>
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <div class="widgets-icons mx-auto rounded-circle"><i class="bx bx-line-chart"></i>
                                </div>
                                <h4 class="mb-0 font-weight-bold mt-3 text-white" id="d_rbooks">0</h4>
                                <p class="mb-0 text-white">Total Returned Books</p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card-deck flex-column flex-lg-row">
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <div class="widgets-icons mx-auto rounded-circle"><i class="bx bx-group"></i>
                                </div>
                                <h4 class="mb-0 font-weight-bold mt-3 text-white" id="d_students">0</h4>
                                <p class="mb-0 text-white">Total Students</p>
                            </div>
                        </div>
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <div class="widgets-icons mx-auto rounded-circle"><i class="bx bx-user"></i>
                                </div>
                                <h4 class="mb-0 font-weight-bold mt-3 text-white" id="d_users">0</h4>
                                <p class="mb-0 text-white">Total Users</p>
                            </div>
                        </div>
                    
                    </div>



                </div>
            </div>
        </div>


    </div>
    <?php include './partials/footer.extention.php' ?>
    <script src="pages/dashboard.js"></script>
</body>
</html>