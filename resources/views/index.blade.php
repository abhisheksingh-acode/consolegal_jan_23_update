@extends('layouts.master')

@section("title","add form page")


<!-- section Start -->
<section class="account">
	<div class="container">
		<div class="row">

			<div class="col-md-3">
				<div class="leftcol">

				</div>
			</div>

			<div class="col-md-9">
				<form class="login-form">
					<div class="row rightcol">

						<!-- name -->
						<div class="col-md-4">
							<p class="rtext">Personal Information</p>
						</div>
						<div class="col-md-6"><a href="#">Edit</a></div>

						<div class="col-md-12">
							<div class="form-group position-relative">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="FullName" name="name" required="">
							</div>
						</div>

						<!-- email -->
						<div class="col-md-4">
							<p class="rtext">Email Address</p>
						</div>
						<div class="col-md-1"><a href="#">Edit</a></div>
						<div class="col-md-7"><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Forgot Password</button></div>





						<div id="id01" class="modal">
							<form class="modal-content animate" action="/action_page.php" method="post">

								<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>



								<div class="container">
									<p>Change Password</p><a href="#">Resend OTP</a>
									<div class="row">

										<div class="col-lg-12">
											<div class="form-group">
												<input type="text" placeholder="Type New Password" name="ph" required>

											</div>
										</div>

										<div class="col-lg-12">
											<div class="form-group">
												<input type="text" placeholder="Retype New Password" name="ph" required>
											</div>
										</div>


										<div class="col-lg-12">
											<button type="submit">Retrieve Password</button>
										</div>
									</div>
								</div>


							</form>
						</div>












						<div class="col-md-12">
							<div class="form-group position-relative">
								<input type="email" class="form-control" placeholder="EmailAddress" name="email" required="">
							</div>
						</div>

						<!-- mobile -->
						<div class="col-md-4">
							<p class="rtext">Mobile Number</p>
						</div>
						<div class="col-md-3"><a href="#">Edit</a></div>

						<div class="col-md-12">
							<div class="form-group position-relative">
								<input type="text" class="form-control" placeholder="Phone" name="Phone" required="">
							</div>
						</div>

						<!-- company -->
						<div class="col-md-4">
							<p class="rtext">Company Name</p>
						</div>
						<div class="col-md-3"><a href="#">Edit</a></div>
						<div class="col-md-12">
							<div class="form-group position-relative">

								<input type="text" class="form-control" placeholder="company" name="company" required="">
							</div>
						</div>



					</div>
				</form>
			</div>


		</div>
	</div>
</section>









<script>
	// Get the modal
	var modal = document.getElementById('id01');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>