<div class="row">
	<div class="col-md-7">
		<img src="<?php echo site_url("assets/images/soups/")."/".$soup->id; ?>.png" class="img-responsive"/>
	</div>

	<div class="col-md-5 checkout_summary">
		<?php $html = "";
				$html .= '<div class="row">';
				$html .= '<div class="col-xs-3">';
				$html .= '<img width="50" height="50" src="'.site_url("assets/images/soups/")."/".$soup->id.'.png">';
				$html .= '</div>';
				$html .= '<div class="col-xs-7">';
				$html .= $soup->name;
				$html .= '</div>';
				$html .= '<div class="col-xs-2">';
				$html .= '&pound;'.$soup->price;
				$html .= '</div>';
				$html .= '</div>';
				echo $html;?>
			<?php $html = ""; foreach ($ingredients as $ing) {
				$html .= '<div class="row">';
				$html .= '<div class="col-xs-3">';
				$html .= '<img width="50" height="50" src="'.site_url("assets/images/ingredients/")."/".$ing->id.'.png">';
				$html .= '</div>';
				$html .= '<div class="col-xs-7">';
				$html .= $ing->friendly_name;
				$html .= '</div>';
				$html .= '<div class="col-xs-2">';
				$html .= '&pound;'.$ing->price;
				$html .= '</div>';
				$html .= '</div>';
				
			}echo $html;?>
	</div>

	<div class="col-md-12 text-center">
		<button class="btn btn-primary btn-lg cookaway" onclick="goBack(event)">
			Back to Kitchen
		</button>
		
		<button class="btn btn-primary btn-lg cookaway">
			Continue
		</button>
	</div>
</div>
<script>
	function goBack(e){
		e.preventDefault();
		alert("Going back to kitchen ...");
		location.href="index";
	}
</script>