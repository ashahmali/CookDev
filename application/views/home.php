   <div class="row">
	  <div id="ingredients" class="cookingingredients col-xs-12" style="display:none">
	      <ul>
	        <?php
 	 		if(isset($ingredients)){
				$img = "";
				foreach($ingredients as $ing){
					$src = site_url("assets/images/ingredients/")."/".$ing->id.'.png';
					$delete = site_url("/administration/deleteIngredient")."/".$ing->id;
					$img .= '<li';
					$img .= " data-id = \"".$ing->id."\"";
					$img .= " data-name = \"".$ing->name."\">";
					$img .= "<img src=".$src;
					$img .= " title = \"".$ing->name."\"";
					$img .= " />";
					//$items .= "<p>Friendly Name: ".$ing->friendly_name."</p>";
					//$items .= "<p>Name: ".$ing->name."</p>";
					//$items .= "<p>Price: ".$ing->price."</p>";
					//$items .= "<a href=\"$delete\" class=\"button\">Delete</a>";
					$img .= "</li>";
					
				}
				echo $img;
			}
 	 		?>
	      </ul>
	  </div>
  </div><br /><br />
 <div class="row">
 	<div class="col-md-3 soups">
 		<!-- <?= img(array('src'=>'assets/images/egusisoupsmall.png', 'class'=>'img-rounded', 'title'=>'Ogbono Soup', 'data-large'=>'assets/images/egusisouplarge.png')); ?> -->
 		<?php
 	 		if(!empty($soups)){
				foreach($soups as $ing){
					$img = "";
					$src = site_url("assets/images/soups/")."/".$ing->id.'.png';
					$delete = site_url("/administration/deleteIngredient")."/".$ing->id;
					$img .= "<img src=".$src;
					$img .= " class=\"img-rounded\"";
					$img .= " data-id=\"".$ing->id."\"";
					$img .= " title=\" ".$ing->name."\"";
					$img .= " data-large = ".site_url("assets/images/soups/")."/".$ing->id.'.png';
					$img .= " style=\"width:70%\"";
					//$img .= " data-name = \"".$ing->name."\">";
					
					$img .= " />";
					//$items .= "<p>Friendly Name: ".$ing->friendly_name."</p>";
					//$items .= "<p>Name: ".$ing->name."</p>";
					//$items .= "<p>Price: ".$ing->price."</p>";
					//$items .= "<a href=\"$delete\" class=\"button\">Delete</a>";
					
					echo $img;
				}
				
			}else{
				echo "<p>No Soups configured</p>";
			}
 	 		?>
 		
 	</div>
 	 <div class="cookingarea text-center col-md-6">
	  	<div><?= img(array('src'=>'assets/images/emptysouppot.gif', 'class'=>'img-responsive')); ?></div>
	  	<span class="callout" style="display:none">oya select your menu</span>
	  </div>
	  <div class="col-md-3 summary_block">
	  	<h3>Summary</h3>
	  	<ul class="order_details"></ul>
	  	<button type="button" class="btn btn-primary btn-lg cookaway" style="display:none">Cook Away</button>
	  </div>
 </div>