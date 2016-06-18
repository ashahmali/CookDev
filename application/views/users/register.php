<!--<h1>Create User</h1>
<p>Please enter the users information below.</p>

      <p>
            First Name: <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            Last Name: <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            Company Name: <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            Email: <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            Phone: <br />
            <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </p>

      <p>
            Password: <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            Confirm Password: <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', 'Create User');?></p> -->


<div class="container">
	<div class="inner_container">
<h1 class="text-center">Register User</h1><br />
 <?php echo validation_errors() ? '<div class="bg-danger text-center">' . validation_errors() . '</div>' : ''; ?>
 <?php echo !empty($error) ? '<div class="bg-danger text-center">' . $error . '</div>' : '';?>
<div id="bg-info"><?php echo isset($message) ? $message : ""; ?></div>

<?php echo form_open("users/register"); ?>
<div class="row">
	  <div class="form-group col-md-6">
	    <label for="">Username</label>
	    <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?=set_value('username')?>" autofocus>
	  </div>
	  <div class="form-group col-md-6">
	    <label for="">Email</label>
	    <input type="email" class="form-control" id="Email" name="email" value="<?=set_value('email')?>" placeholder="Email">
	  </div>
 </div>
 <div class="row">
	  <div class="form-group col-md-6">
	    <label for="password">Password</label>
	    <input type="password" class="form-control password" name="password" id="password" placeholder="Password">
	  </div>
	  <div class="form-group col-md-6">
	    <label for="password">Retype Password</label>
	    <input type="password" class="form-control password2" name="password2" id="password2" placeholder="Retype Password">
	  </div>
  </div>
  <div class="row">
	  <div class="form-group col-md-6">
	    <label for="first_name">First Name</label>
	    <input type="type" class="form-control fname" name="first_name" id="first_name" placeholder="First Name" value="<?=set_value('first_name')?>">
	  </div>
	  <div class="form-group col-md-6">
	    <label for="last_name">Last Name</label>
	    <input type="text" class="form-control" id="last_name" name="last_name" value="<?=set_value('last_name')?>" placeholder="Last Name">
	  </div>
  </div>
  <div class="row">
	  <div class="form-group col-md-6">
	    <label for="phone">Mobile Number</label>
	    <input type="tel" class="form-control phone" name="phone" value="<?=set_value('phone')?>" id="phone" placeholder="Mobile">
	  </div>
  </div>
    <div class="row">
	  <div class="form-group col-md-6"><br />
	  	<button type="submit" class="btn btn-primary">Register</button>
	  </div>
  </div>
<?php echo form_close(); ?>
</div>
</div>