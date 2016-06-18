<div class="container">
	<div class="inner_container">
		<h1 class="text-center">Password Reset</h1><br />
        <?php echo validation_errors() ? '<div class="bg-danger text-center">' . validation_errors() . '</div>' : ''; ?>
		<?php echo !empty($error) ? '<div class="bg-danger text-center">' . $error . '</div>' : '';?>
		<?php $attributes = array('class' => 'form-signin',);
		echo form_open('', $attributes); ?>
		
        <label for="new_password" class="sr-only">Password</label>
        <input type="password" id="new_password" name="new_password" class="form-control password" placeholder="New Password" value="<?=set_value('new_password')?>" required autofocus><br />
        <label for="new_confirm" class="sr-only">Confirm Password</label>
        <input type="password" id="new_confirm" name="new_confirm" class="form-control password" placeholder="Confirm Password" required><br />        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button><br />				
		<?php echo form_close(); ?>
      </div>
   </div>