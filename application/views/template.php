<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">

<?php $this->load->view('includes/header_view'); ?>

<body>
	<div id=content>

		<?php 
			echo validation_errors('<div class=error_message>', '</div>');
			
			echo $this->session->flashdata('message');
			
			if (!empty($message)) echo '<div class=message>'.$message.'</div>';
			if (!empty($error_message)) echo '<div class=error_message>'.$error_message.'</div>';
			if (!empty($success_message)) echo '<div class=success_message>'.$success_message.'</div>';
		?>
		
	</div>
	
	<?php $this->load->view('pages/'.$page); ?>

<?php $this->load->view('includes/footer_view'); ?>

</body>
</html>