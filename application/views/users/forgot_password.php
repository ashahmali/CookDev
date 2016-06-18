<div class="container">
	<div class="inner_container">
		<h1 class="text-center">Password Reset</h1><br />
        <?php echo validation_errors() ? '<div class="bg-danger text-center">' . validation_errors() . '</div>' : ''; ?>
		<?php echo !empty($error) ? '<div class="bg-danger text-center">' . $error . '</div>' : '';?>
		<?php $attributes = array('class' => 'form-signin',);
		echo form_open('', $attributes); ?>
		
        <label for="email" class="sr-only">Email address</label>
        <input type="email" id="email" name="email" class="form-control email" placeholder="Email address" value="<?=set_value('email')?>" required autofocus><br />
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br />
        <p class="text-center">Don't have an account? <?php echo anchor('users/forgot_password', 'Reset'); ?></p>
				
		<?php echo form_close(); ?>
     </div>
</div>