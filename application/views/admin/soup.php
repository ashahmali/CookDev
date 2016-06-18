


<div class="row">
 	<div class="col-sm-2">
 		<h3>Admin Menu</h3>
 		<ul>
 			<li><a href="<?=base_url('administration/addIngrdients')?>">Ingredients</a></li>
 			<li><a href="<?=base_url('administration/addSoup')?>">Soups</a></li>
 		</ul>
 		...
 	</div>
 	 <div class="col-sm-7">
	  	<?php
			if(isset($upload_error))
				dump($upload_error);
		?>
		<h3>Available Soups</h3>
		<div class="admin_ingredients">
 	 		<?php
 	 		if(!empty($soups)){
				foreach($soups as $ing){
					$src = site_url("assets/images/soups/")."/".$ing->id.'.png';
					$delete = site_url("/administration/deleteSoup")."/".$ing->id;
					$items = '<div class="">';
					$items .= "<img src=".$src." style='width:50%'/>";
					$items .= "<p>Soup Name: ".$ing->name."</p>";
					$items .= "<p>Price: ".$ing->price."</p>";
					$items .= "<a href=\"$delete\" class=\"button\">Delete</a>";
					$items .= '</div>';
					echo $items;
				}
			}else{
				echo "<div class=\"col-xs-12\"><p>There currently no soups saved</p></div>";
			}
 	 		?>
 	 	</div>
 	 	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
		  Add Soup
		</button>
		
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Add Soup</h4>
		      </div>
		      <div class="modal-body">
		        <div class="add_ingrdient_form">
			<?php echo form_open_multipart();?>
			    <label for="soup_name" class="sr-only">Friendly Name</label>
		        <input type="text" id="soup_name" name="soup_name" class="form-control email" placeholder="Soup Name" value="<?=set_value('soup_name')?>" required autofocus><br />
		        
		        <input type="text" id="price" name="price" class="form-control email" placeholder="Price" value="<?=set_value('price')?>" ><br />
		        <textarea type="text" id="description" name="description" class="form-control" placeholder="Caption" value="<?=set_value('description')?>" ></textarea><br />
		        <input type="file" name="userfile" size="20" class="form-contro" placeholder="Upload Soup Image" required /> &nbsp; <span>(Upload Soup Image)</span><br />
		        
		</div>
		      </div>
		      <div class="modal-footer">
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button><br />
		      </div>
		      <?php echo form_close();?>
		    </div>
		  </div>
		</div>
		
	  </div>
	  <div class="col-sm-3">
	  	<h3>Summary</h3>
	  	....
	  </div>
 </div>

