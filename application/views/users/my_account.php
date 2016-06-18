<?php $user = $this->ion_auth->user()->row();?>

<div class="container">
	<div class="row">
		<div class="col-md-8"><br />
			<h2>Personal Details</h2>
			<p>Name: <?=$user->first_name?> <?=$user->last_name?></p>
			<p>Email: <?=$user->email?></p>
			<p>Mobile: <?=$user->phone?></p>
			<br />
			<h2>Delivery Address</h2>
			<p><?=$address->address1;?></p>
			<p><?=($address->address2)?$address->address2:"";?></p>
			<p><?=($address->address3)?$address->address3:"";?></p>
			<p><?=$address->postcode;?></p>
			<p><?=$address->city;?></p>
			<br />
		</div>
		
		<div class="col-md-4"><br />
			<h2>Recent Orders</h2>
			....
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h2>Order History</h2>
			.....
		</div>
	</div>
</div>