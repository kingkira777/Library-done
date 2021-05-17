<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login</title>
    <?php include './partials/head.extention.php' ?>
</head>
<body class="bg-theme bg-theme1">
    <div class="wrapper">
    <div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										<img src="assets/images/logo-icon.png" width="50" alt="">
										<h4 class="mt-4 font-weight-bold">LAN - Library Mangement</h4>
										<h4>System For Gardner College Diliman</h4>
									</div>
									<div class="form-group mt-4">
										<label>Username</label>
										<input type="text" id="username" class="form-control" placeholder="Enter your username" />
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" id="password" class="form-control" placeholder="Enter your password" />
									</div>
									
									<div class="btn-group mt-3 w-100">
										<button type="button" id="btnLogin" class="btn btn-light btn-block">Log In <i class="lni lni-arrow-right"></i></button>
									
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<img src="assets/images/login-images/Login1.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>  
    </div>
    <?php include './partials/footer.extention.php' ?>
    <script src="pages/auth.js"></script>
</body>
</html>