<?php $this->load->view('template/header') ?>
<?php echo validation_errors(); ?>
<div class="well container-fluid account-login" id="content-container">
	<div class="col-lg-6">
		<form class="form-horizontal" action="">
			<fieldset>
				<legend>Create account</legend>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						<input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
					</div>
					<label for="inputEmail" class="col-lg-2 control-label">Username</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" id="inputEmail" placeholder="Username">
					</div>
					<label for="inputEmail" class="col-lg-2 control-label">Password</label>
					<div class="col-lg-10">
						<input name="password" type="password" class="form-control" id="inputEmail" placeholder="Password">
					</div>
					<label for="inputEmail" class="col-lg-2 control-label">Confirm Password</label>
					<div class="col-lg-10">
						<input name="cpassword" type="password" class="form-control" id="inputEmail" placeholder="Confirm Password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button type="submit" class="btn btn-primary">Register</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="col-lg-6">
		<form class="form-horizontal">
			<fieldset>
				<legend>Already have an account?</legend>
				<br>
				<br>
				<div class="form-group">
					<div class="col-lg-8 col-lg-offset-4">
						<button class="btn btn-primary">Account sign in</button>
						<button type="submit" class="btn btn-primary">Forgot Password</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	
</div>
<?php $this->load->view('template/footer') ?>