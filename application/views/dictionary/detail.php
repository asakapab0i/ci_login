<?php $this->load->view('template/header') ?>

<h1>List of words</h1>

{result_array}
	{word}
	{definition}
	{definition_example}
	{username}
	{votes}
	{views}
{/result_array}

<?php $this->load->view('template/footer') ?>