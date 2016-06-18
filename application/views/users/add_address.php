<div class="container">
	<div class="inner_container">
<h1 class="text-center">Delivery Address</h1><br />
 <?php echo validation_errors() ? '<div class="bg-danger text-center">' . validation_errors() . '</div>' : ''; ?>
 <?php echo !empty($error) ? '<div class="bg-danger text-center">' . $error . '</div>' : '';?>
 <div id="bg-danger"><?php echo isset($message) ? $message : ""; ?></div>
 <div class="bg-info"><?= $this->session->flashdata('message')?$this->session->flashdata('message'):"";?></div>

<?php echo form_open("users/activate/".$this->uri->segment(3)."/".$this->uri->segment(4)); ?>
<div class="row">
	  <div class="form-group col-md-12">
	    <label for="address1">Address Line 1</label>
	    <input type="text" class="form-control" id="address1" name="address1" value="<?=set_value('address1')?>" placeholder="House Name or Number">
	  </div>
 </div>
 <div class="row">
	  <div class="form-group col-md-12">
	    <label for="address1">Address Line 2</label>
	    <input type="text" class="form-control" id="address2" name="address2" value="<?=set_value('address2')?>" placeholder="Street Address">
	  </div>
  </div>
  <div class="row">
	  <div class="form-group col-md-12">
	    <label for="address3">Address Line 3</label>
	    <input type="text" class="form-control address3" id="address3" name="address3" value="<?=set_value('address3')?>" placeholder="Optional">
	  </div>
  </div>
  <div class="row">
	  <div class="form-group col-md-4">
	    <label for="postcode">Post Code</label>
	    <input type="text" class="form-control postcode" name="postcode" value="<?=set_value('postcode')?>" id="postcode" placeholder="Post Code">
	  </div>
	  <div class="form-group col-md-8">
	    <label for="city">City</label>
	    <input type="text" class="form-control city" name="city" value="<?=set_value('city')?>" id="city" placeholder="City">
	  </div>
  </div>
    <div class="row">
	  <div class="form-group col-md-6"><br />
	  	<button type="submit" class="btn btn-primary btn-lg">Register</button>
	  </div>
  </div>
<?php echo form_close(); ?>
</div>
</div>