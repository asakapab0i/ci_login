<?php $this->load->view('template/header') ?>

<h1>{head}</h1>
<?php echo validation_errors(); ?>
<form action="" method="post" accept-charset="utf-8">
	<input type="text" name="word" value="" placeholder="word">
	<textarea name="definition" placeholder="definition"></textarea>
	<textarea name="example" placeholder="example"></textarea>
	<input type="email" name="email" value="" placeholder="email">
	<input type="submit" name="" value="Login" placeholder="">
</form>

<?php $this->load->view('template/footer') ?>