<html>
	<head>
		<title>Forgot Password</title>
		<link
			rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	</head>
	<style>
		.box {
			width: 100%;
			max-width: 600px;
			background-color: #f9f9f9;
			border: 1px solid #ccc;
			border-radius: 5px;
			padding: 16px;
			margin: 0 auto;
		}
		input.parsley-success,
		select.parsley-success,
		textarea.parsley-success {
			color: #468847;
			background-color: #dff0d8;
			border: 1px solid #d6e9c6;
		}

		input.parsley-error,
		select.parsley-error,
		textarea.parsley-error {
			color: #b94a48;
			background-color: #f2dede;
			border: 1px solid #eed3d7;
		}

		.parsley-errors-list {
			margin: 2px 0 3px;
			padding: 0;
			list-style-type: none;
			font-size: 0.9em;
			line-height: 0.9em;
			opacity: 0;

			transition: all 0.3s ease-in;
			-o-transition: all 0.3s ease-in;
			-moz-transition: all 0.3s ease-in;
			-webkit-transition: all 0.3s ease-in;
		}

		.parsley-errors-list.filled {
			opacity: 1;
		}

		.parsley-type,
		.parsley-required,
		.parsley-equalto {
			color: #ff0000;
		}
		.error {
			color: red;
			font-weight: 700;
		}
		.btn{
			padding: 10px 15px;
			border: 0;
			color: #fff;
			background-color: #33f;
		}
	</style>
	
	<body>
		<div class="container">
			<div class="table-responsive">
				<h3 text-align="center">Forgot Password</h3>
				<br />
				<div class="box">
					<form id="validate_form" method="post" action="forgotpassword.php">
						<div class="form-group">
							<label for="email">Registration Number</label>
							<input
								type="text"
								name="regnum"
								id="regnum"
								placeholder="Enter Registration Number"
								required
								data-parsley-type="regnum"
								data-parsley-trigg
								er="keyup"
								class="form-control" />
							</div>
						<div class="form-group">
							<label for="email">New Password</label>
							<input
								type="password"
								name="password"
								id="password"
								placeholder="Enter New Password"
								required
								data-parsley-type="password"
								data-parsley-trigg
								er="keyup"
								class="form-control" />
							</div>
							
						<div class="form-group">
							<button
								type="submit"
								id="login"
								name="send-reset-link"
								value="Send Password Reset Link"
								class="btn btn-success"> Submit</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</body>
</html>
