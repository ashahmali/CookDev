
// order class
   
$(function(){ //DOM Ready
	
	 var orderClass = function(id){
    	this.id=id;
    	this.name="";
    	this.friend_name="";
    	this.price=0;
    	this.id_add_url="http://cookdev.dev/order/getIngrdients/"+this.id;
    	this.id_remove_url="http://cookdev.dev/order/removeIngrdient/"+this.id;
    	this.load_url="http://cookdev.dev/order/";
    	this.load_soup_url="http://cookdev.dev/order/loadSoup";
    	//this.item_details = "";
    	
    	this.peekItem = function(){
    		$.get( this.id_add_url, function( data ) {
			  var item_details = JSON.parse(data);
			  if(typeof item_details !== 'object')
    				return;
    		  // add to list
    		  addToList(item_details);
    		  //console.log(html);
    		 $('.del_item').unbind().click(function(){
				if (confirm("Definitely remove?") == true) {
				   deleteItem($(this).parent().data('id'), $(this).parent());
				}
    		   });
    		  
    		  // delete soup bruv.. 
    		  $('.del_soup').unbind().click(function(){
    		  	if (confirm("Removing the soup will remove everything else\r\n Continue?") == true) {
				   deleteItem("soup", $(this).parent());
				   location.reload();
				}
    		  });  
    		  
			  
			}).fail(function(){
			  console.log("Request Failed");
			});
    	};
    	
    	var deleteItem = function(id, element){
    		$.get("http://cookdev.dev/order/removeIngrdient/"+id, function(dt){
    		   $('span.summary_cost').text(dt);
    		   if(id!=="soup")
    		   	element.remove();
    		 }).fail(function(){
			  console.log("Request Failed");
			});
			
    	};
    	
    	// adds items to the list..
    	var addToList = function(item_details){
    		var html="";
    		html+="<li data-id='"+item_details.item.id+"' data-price='"+item_details.item.price+"'>"+item_details.item.friendly_name+"&nbsp;&nbsp&nbsp;&pound;"+item_details.item.price+" &nbsp;&nbsp&nbsp;<button class='del_item'>X</button></li>";
    		  $('ul.order_details').append(html);
    		  $('span.summary_cost').text(item_details.total_cost);
    		  callout(item_details.item.description);
    		  $('button.cookaway').show();
    	};
    	
    	
    	// checks session to see if there is any thing there and loads them
    	this.loadFromSession = function(){
    		var html="";
    		$.get( this.load_url, function( data ) {
			  var item_details = JSON.parse(data);
			  if(typeof item_details !== 'object')
    				return;
    		
    		if(typeof item_details.soup == 'object' && item_details.soup != undefined && item_details.soup != null){
    			html+="<li data-id='"+item_details.soup.id+"'>"+item_details.soup.name+"&nbsp;&nbsp&nbsp;&pound;"+item_details.soup.price+" &nbsp;&nbsp&nbsp;<button class='del_soup'>X</button></li>";
    		var soupImg = '<img src="../assets/images/soups/'+item_details.soup.id+'.png" class="img-responsive text-center" style="width:100%;" />';
    			$('div.soups').hide('fast');
    			$('div.cookingingredients').slideDown('fast');
    			$('div.cookingarea div').html(soupImg);
    			$('button.cookaway').show();
    		
    		}
    		  $.each(item_details.items, function(k,v){
    		  	html+="<li data-id='"+v.id+"'>"+v.friendly_name+"&nbsp;&nbsp&nbsp;&pound;"+v.price+" &nbsp;&nbsp&nbsp;<button class='del_item'>X</button></li>";
    		  });
    		  $('ul.order_details').append(html);
    		  $('span.summary_cost').text(item_details.total_cost);	
    		  //console.log(html);
    		  
    		  $('.del_item').unbind().click(function(){
    		  	if (confirm("Definitely remove?") == true) {
				   deleteItem($(this).parent().data('id'), $(this).parent());
				}
    		  });
    		  
    		  $('.del_soup').unbind().click(function(){
    		  	if (confirm("Removing the soup will remove everything else\r\n Continue?") == true) {
				   deleteItem("soup", $(this).parent());
				   location.reload();
				}
    		  });
			  
			}).fail(function(){
			  console.log("Request Failed");
			});
    	};
    	
    	
    	this.loadCostSummary = function(){
    		var html="";
    		$.get( this.load_url, function( data ) {
			  var item_details = JSON.parse(data);
			  if(typeof item_details !== 'object')
    				return;
    		  $('span.summary_cost').text(item_details.total_cost);
    		});
    	};
    	
    	this.loadSoup = function(img, id){
    		$.get( this.load_soup_url+'/'+id, function(data) {
    			var html = '<img src="'+img+'" class="img-responsive" style="width:100%;" />';
    			$('div.soups').hide('fast');
    			$('div.cookingingredients').slideDown('fast');
    			$('div.cookingarea div').html(html);
    			var dt = JSON.parse(data);
    		  	html="<li data-id='"+dt.id+"'>"+dt.name+"&nbsp;&nbsp&nbsp;&pound;"+dt.price+" &nbsp;&nbsp&nbsp;<button class='del_soup'>X</button></li>";
    		 	$('ul.order_details').append(html);
    		  	$('span.summary_cost').text(dt.price);
    			callout(dt.description);
    			$('button.cookaway').show();
    			
    			 $('.del_soup').unbind().click(function(){
	    		  	if (confirm("Removing the soup will remove everything else\r\n Continue?") == true) {
					   deleteItem("soup", $(this).parent());
					   location.reload();
					}
	    		  });
    			
    			console.log(dt);			  
			}).fail(function(){
			  console.log("Request Failed");
			});
    	};
    	
    	this.checkout = function(){
    		window.location.href = "checkout";
    	};
    	
    	var callout = function(msg){
    		// animate callout to show.
    		$('span.callout').css({'top':0,'right':0});
    		$('span.callout').text(msg).show();
    		setTimeout(function(){
    			$('span.callout').hide();
    		}, 3000);
    		$( 'span.callout' ).animate({
			    right: "-15",
			    top:"-50"
			  }, 2000, function() {
			    // Animation complete.
			  });
    	};
    	
    };// end of order class
    
    $( "#ingredients li" ).draggable({
      cursor: "move",
      cursorAt: { top: 50, left: 50 },
      helper: "clone",
      zIndex: 100
      //stack: ".cookingarea img",
    });
    
    $(".cookingarea").droppable({
      activeClass: "ui-state-default",
      //hoverClass: "ui-state-hover",
      //accept: ":not(.ui-sortable-helper)",
      drop: function( event, ui) {
      	//console.log(ui.draggable.data('id'));
      	var item = new orderClass(ui.draggable.data('id'));
      	item.peekItem();
        //$( this ).find( ".placeholder" ).remove();
        //console.log("Dropped");
        //$( this ).find( ".placeholder" ).remove();
        //$( "<li></li>" ).text( ui.draggable.text() ).appendTo( this );
        
      },
    });
    
    // calling this function initially with 1 but not used..
    var it = new orderClass(1);
    it.loadFromSession();
    
    
    // event handlers for soup selection
    $(document).on('click', 'div.soups img', function(){
    	it.loadSoup($(this).data('large'),$(this).data('id'));
    });
    
    $(document).on('click', 'button.cookaway', function(){
    	it.checkout();
    });
    
    
   
});

/*
 function( event ) {
      	console.log($(this));
        return $( "<div class='ui-widget-header'>"+$(this).html()+"</div>" );
      }
 * */