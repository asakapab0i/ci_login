<?php $this->load->view('template/header') ?>

<h1>Account</h1>
<?php echo validation_errors(); ?>
<form action="" method="post" accept-charset="utf-8">
	<input type="email" name="email" value="" placeholder="email">
	<input type="text" name="username" value="" placeholder="username">
	<input type="password" name="password" value="" placeholder="password">
	<input type="password" name="cpassword" value="" placeholder="password">
	<input type="submit" name="" value="Login" placeholder="">
</form>

<?php $this->load->view('template/footer') ?>