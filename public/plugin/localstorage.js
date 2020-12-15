$(document).ready(function(){
	
	cartnoti();
	showdata();   

	$('.unauth').click(function(){
	    alert("Please login to success this process!");
	  })

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	// add to cart from html
	$('.addtocart').click(function() {
		var id = $(this).data('id');
		var course_title = $(this).data('course_title');
		var instructor = $(this).data('instructor');
		var image = $(this).data('image');
		var price = $(this).data('price');
		var wishlist = $(this).data('wishlist');
		var user_id = $(this).data('user_id');

		data_add(id,course_title,instructor,image,price,wishlist,user_id);
	});

	// add to cart from jq
	$('.searchcourseshow').on('click','.cart',function(){
		var id = $(this).data('id');
		var course_title = $(this).data('course_title');
		var instructor = $(this).data('instructor');
		var image = $(this).data('image');
		var price = $(this).data('price');
		var wishlist = $(this).data('wishlist');
		var user_id = $(this).data('user_id');

		data_add(id,course_title,instructor,image,price,wishlist,user_id);
	})


	function data_add(id,course_title,instructor,image,price,wishlist,user_id) {
		var localstorage = localStorage.getItem('course_buy');
		if(!localstorage){
			var localstorage_arr = new Array(); 
		}else{
			var localstorage_arr = JSON.parse(localstorage);
		}
		if(!wishlist){
			wishlist = 'unsave';
		}
		var hasid = false;
		var courses = {
						id : id,
						course_title : course_title,
						instructor : instructor,
						image : image,
						price : price,
						wishlist : wishlist,
						user_id : user_id,
						qty : 1,
					   }
		$.each(localstorage_arr,function(i,v){

			if(v.id == id && v.user_id == user_id){
				hasid = true;
				alert('Already added!');
			}
		})
		if(!hasid){
			localstorage_arr.push(courses);
			alert("Thank you for your buying!");
		}

		var localstorage_str = JSON.stringify(localstorage_arr);
		localStorage.setItem('course_buy',localstorage_str);

		cartnoti();
	
	}

	function showdata() {
		var user_id = $('.user_id').data('user_id');
		var localstorage = localStorage.getItem('course_buy');
		var localstorage_arr = JSON.parse(localstorage);
		if(localstorage_arr){
		console.log(localstorage);
		if(localstorage)
		{
			if(localstorage_arr.length > 0){
				if ($('#shoppingcartDiv').hasClass( "d-none")) {
			    	$('#shoppingcartDiv').removeClass("d-none")
			  	}

			  	if (!$('#emptyshoppingcartDiv').hasClass( "d-none" ) ) {
			    	$('#emptyshoppingcartDiv').addClass("d-none")
			  	}

		   		if (!$('#ordersuccessDiv').hasClass( "d-none" ) ) {
			    	$('#ordersuccessDiv').addClass("d-none")
			  	}

				var html = "";
				var total = 0;
				var course_count = 0;
				// total course in my cart

				$.each(localstorage_arr,function(i,v){
					if(v.user_id == user_id){
					course_count += v.qty;
					total += v.price;
					html += `

							<div class="card rounded-0 ">
								<div class="row g-0 ">

									<div class="col-md-4">
								      	<img src="${v.image}"  alt="..." class="img-fluid">
								    </div>



								    <div class="col-md-8 ">
										<div class="card-body ">
									    	<p class="fw-bolder fontbold fs-5"> ${v.course_title} </p>

									    	<a href="javascript:void(0)" class="fs-3 float-right"> 
									    		<i class='bx bx-x text-danger removeBtn' data-id = '${v.id}' data-user_id = "${v.user_id}"></i>
									    	</a>

									    	<p class="fst-italic"> By ${v.instructor} </p>

									    	<p>
									    		<span class="text-danger"> ${v.price} Ks  </span> 

									    		<i class='bx bxs-purchase-tag text-danger' ></i>
									    	</p>

									    	<a class="favouriteBtn one `;
									    	if(v.wishlist == 'save'){
									    		html+= `active`;
									    	} 
									    	html+=` mobile button--secondary wishlists" data-course_id = "${v.id}">
											    <div class="btn__effect">
											      	<svg width="515.99" height="480.73" class="heart-stroke icon-svg icon-svg--size-4 icon-svg--color-silver" viewBox="20 18 29 28" aria-hidden="true" focusable="false"><path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path></svg>
											      	<svg class="heart-full icon-svg icon-svg--size-4 icon-svg--color-blue" viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"><path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path></svg>
											      	<svg class="broken-heart" xmlns="http://www.w3.org/2000/svg" width="48" height="16" viewBox="5.707 17 48 16"><g fill="#F48FB1">
											  		<path class="broken-heart--left" d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z"/>
											  		<path class="broken-heart--right" d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z"/></g>
											  		<path class="broken-heart--crack" fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"/></svg>
											      	<div class="effect-group">
											        	<span class="effect"></span>
											        	<span class="effect"></span>
											        	<span class="effect"></span>
											        	<span class="effect"></span>
											        	<span class="effect"></span>
											      	</div>
											    </div>
											</a>


									  	</div>
									</div>
								</div>
							</div>`
							};
				})
				$('.showcart').html(html);
				$('.course_count').html(course_count);
				$('.total').html(total+' Ks');
			}else{
				if ($('#emptyshoppingcartDiv').hasClass( "d-none" ) ) {
			    	$('#emptyshoppingcartDiv').removeClass("d-none")
			  	}
				if (!$('#shoppingcartDiv').hasClass( "d-none")) {
			    	$('#shoppingcartDiv').addClass("d-none")
			  	}

		   		if (!$('#ordersuccessDiv').hasClass( "d-none" ) ) {
			    	$('#ordersuccessDiv').addClass("d-none")
			  	}

				var html = "";
				var course_count = 0;
				var total = 0;
				$('.checkout').prop('disabled',true);
				$('.showcart').html(html);
				$('.course_count').html(course_count);
				$('.total').html(total+' Ks');
			}
		}
		else{
			if ($('#emptyshoppingcartDiv').hasClass( "d-none" ) ) {
			    	$('#emptyshoppingcartDiv').removeClass("d-none")
			  	}
				if (!$('#shoppingcartDiv').hasClass( "d-none")) {
			    	$('#shoppingcartDiv').addClass("d-none")
			  	}

		   		if (!$('#ordersuccessDiv').hasClass( "d-none" ) ) {
			    	$('#ordersuccessDiv').addClass("d-none")
			  	}
		}
		}
	}

	// noti

	function cartnoti(){
		var user_id = $('.user_id').data('user_id');
		// alert(user_id);
		var localstorage = localStorage.getItem('course_buy');
		var noti = 0;
		if(localstorage){
			var localstorage_arr = JSON.parse(localstorage);
			$.each(localstorage_arr,function(i,v){
				if(v.user_id == user_id){
					noti  += v.qty;
					
				}
			})

			$('.count').html(noti);
			
		}else{
			$('.count').html(noti);
		}
	}



	$('.removewishlist').click(function(){
		var id = $(this).data('course_id');
		removesavelist(id);
		showdata();
	})



	// save from show cart
	$('.showcart').on('click','.wishlists',function(){
		var id = $(this).data('course_id');
		removesavelist(id);
		showdata();
	})


	function removesavelist(id){
		$.post('wishlist_save',{id:id},function(res){
			if(res == "delete"){
				var localstorage = localStorage.getItem('course_buy');
				if(localstorage){

					var localstorage_arr = JSON.parse(localstorage);
					$.each(localstorage_arr,function(i,v){
						if(v.id == id){
							
							v.wishlist = 'unsave';
						}
					})
					console.log(localstorage_arr);
					var localstorage_str = JSON.stringify(localstorage_arr);
					localStorage.setItem('course_buy',localstorage_str);
					showdata();

				}
			}else{
				var localstorage = localStorage.getItem('course_buy');
				if(localstorage){

					var localstorage_arr = JSON.parse(localstorage);
					$.each(localstorage_arr,function(i,v){
						if(v.id == id){
							

							v.wishlist = 'save';
						}
					})

					var localstorage_str = JSON.stringify(localstorage_arr);
					localStorage.setItem('course_buy',localstorage_str);
					showdata()

				}
				

			}
		})
	}
	// save from show cart end

	$('.showcart').on('click','.removeBtn',function(){

		var id = $(this).data('id');
		var user_id = $(this).data('user_id');
		var localstorage = localStorage.getItem('course_buy');
		var array = new Array();

		if(localstorage){
			var localstorage_arr = JSON.parse(localstorage);
			

			$.each(localstorage_arr,function(i,v){

				if(v.id == id && v.user_id == user_id){
					var ans = confirm("Are you sure to remove this course from your cart?");
					
						
						array.push(i);
					
					
				}
			})

					$.each(array,function(a,b){
						localstorage_arr.splice(b,1);
					})

			var localstorage_str = JSON.stringify(localstorage_arr);
			localStorage.setItem('course_buy',localstorage_str);
			showdata();
			cartnoti();
		}
	})


	$('.checkout').click(function(){
		var user_id = $('.user_id').data('user_id');
		var localstorage = localStorage.getItem('course_buy');
		var count_data = 0;
		var array = new Array();
		if(localstorage){
			var localstorage_arr = JSON.parse(localstorage);
			alert('Your buying is success');
			$.post('course_sale',{data:localstorage_arr},function(res){
				
				if(res){
					$.each(localstorage_arr,function(i,v){
						
						if( res == v.user_id ){	
							array.push(i);
						}
					})

					$.each(array,function(a,b){
						var count = array.length;
						localstorage_arr.splice(b,count);
					})

					var localstorage_str = JSON.stringify(localstorage_arr);
					localStorage.setItem('course_buy',localstorage_str);
					// showdata();
					cartnoti();

					$('#shoppingcartDiv').hide();
			   		$('#emptyshoppingcartDiv').hide();

				    $('#ordersuccessDiv').show();

				    if (!$('#emptyshoppingcartDiv').hasClass( "d-none" ) ) {
				    	$('#emptyshoppingcartDiv').addClass("d-none")
				  	}
					if (!$('#shoppingcartDiv').hasClass( "d-none")) {
				    	$('#shoppingcartDiv').addClass("d-none")
				  	}

			   		if ($('#ordersuccessDiv').hasClass( "d-none" ) ) {
				    	$('#ordersuccessDiv').removeClass("d-none")
				  	}

				}
			})
		}
	})



	




})