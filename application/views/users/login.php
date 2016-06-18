<!--<section class="comment">
	<h3 class="highlight">Please log in</h3>
	
	<?php echo validation_errors() ? '<div class="errors">' . validation_errors() . '</div>' : ''; ?>
	<?php echo !empty($error) ? '<div class="errors">' . $error . '</div>' : '';?>
	<?php echo form_open(); ?>
	<?php echo form_label('Email'); ?>
	<?php echo form_input('email'); ?>
	<?php echo form_label('Password'); ?>
	<?php echo form_password('password'); ?>
	<?php echo form_submit('submit', 'Log in'); ?>
	<?php echo form_close(); ?>
</section>-->

<div class="container">
	<div class="inner_container">
		<h1 class="text-center">Login User</h1><br />
        <?php echo validation_errors() ? '<div class="bg-danger text-center">' . validation_errors() . '</div>' : ''; ?>
		<?php echo !empty($error) ? '<div class="bg-danger text-center">' . $error . '</div>' : '';?>
		<?php $attributes = array('class' => 'form-signin',);
		echo form_open('', $attributes); ?>
		
        <label for="email" class="sr-only">Email address</label>
        <input type="email" id="email" name="email" class="form-control email" placeholder="Email address" value="<?=set_value('email')?>" required autofocus><br />
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control password" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="<?=set_value('remember_me')?>" name="remember_me"> Remember me  &nbsp;<?php echo anchor('users/forgot_password', 'Forgotten Password?', array('class'=>'forgotten_password')); ?>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br />
        <p class="">Don't have an account? <?php echo anchor('users/register', 'Sign up'); ?></p>
				
		<?php echo form_close(); ?>
      </div>
      </div>