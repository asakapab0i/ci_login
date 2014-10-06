<?php $this->load->view('template/header') ?>

<div class="well container-fluid account-login" id="content-container">
	<div class="col-lg-6">
		<form class="form-horizontal" action="account/login" method="post">
		<?php echo validation_errors(); ?>
			<fieldset>
				<legend>Sign in</legend>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						<input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
					</div>
					<label for="inputEmail" class="col-lg-2 control-label">Password</label>
					<div class="col-lg-10">
						<input name="password" type="password" class="form-control" id="inputEmail" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button type="submit" class="btn btn-primary">Login</button>
						<button class="btn btn-primary">Forgot Password</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="col-lg-6">
		<form class="form-horizontal">
			<fieldset>
				<legend>Sign in using</legend>
				<br>
				<div class="form-group">
					<div class="col-lg-8 col-lg-offset-4">
						<button class="btn btn-primary">Facebook</button>
						<button class="btn btn-danger">Google</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	
</div>
<?php $this->load->view('template/footer') ?>