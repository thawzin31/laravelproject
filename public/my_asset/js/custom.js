$(document).ready(function(){
	count();
	showdata();

	$('.add_to_cart').click(function(){
			//alert('ok');
		
		var id=$(this).data('id');
		console.log(id);
		var codeno=$(this).data('codeno');
		console.log(codeno);
		var name=$(this).data('name');
		console.log(name);
		var photo=$(this).data('photo');
		console.log(photo);
		var price=$(this).data('price');
		console.log(price);
		var discount=$(this).data('discount');
		console.log(discount);
		var description=$(this).data('description');
		console.log(description);

		var qty=1;
			
			var item={
				id:id,
				codeno:codeno,
				name:name,
				photo:photo,
				price:price,
				discount:discount,
				description:description,
				qty:qty
			}

		var itemlist=localStorage.getItem('item');
			//console.log(itemlist);

		var itemArray;
			if (itemlist==null) 
			{
				itemArray=[]
			}
			else
			{
				itemArray=JSON.parse(itemlist);
			}

		var status=false;
		$.each(itemArray,function(i,v){
			if (id==v.id) 
			{
				v.qty++;
				status=true;	
			}

		})

		if (!status) 
		{
			itemArray.push(item);
		}
		var itemstring=JSON.stringify(itemArray);
		console.log(itemstring);
		localStorage.setItem("item",itemstring);
		count();
		showdata();
	})

	function count(){
		var noti=0;
		var itemlist=localStorage.getItem('item');
		if(itemlist){
			itemArray=JSON.parse(itemlist);
			//noti=itemArray.length;
			//console.log(noti);
			$.each(itemArray,function(i,v){
				noti+=v.qty;
			})

			$("#cart").html(noti);

		}
	}

	function showdata(){
		var itemlist=localStorage.getItem('item');
		if (itemlist)
		{
			var itemArray=JSON.parse(itemlist);

			
				var html="";
				var mytfoot="";
				var total=0;
				var no=1;
				var text="";
				$.each(itemArray,function(i,v){
					if(v)
					{
						var id=v.id;
						var codeno=v.codeno;
						var name=v.name;
						var price=v.price;
						var discount=v.discount;
						var photo=v.photo;
						var qty=v.qty;
						

						if (discount) 
						{
							var unit=discount;
						}

						else
						{
							var unit=price;
						}
					
						var subtotal=unit*qty;
							//console.log(subtotal);

						html+=`<tr>
								<td>
									${no++}
								</td>
								<td>
									<img src="${photo}" class="img-fluid" style="width:50px; height:50px;">
								</td>
								<td>
									<p>Name: ${name} </p>
									<p>Codeno: ${codeno}</p>
								</td>
								<td>
									<button class="btn btn-outline-secondary plus_btn" data-id="${i}">+</button>
								
									 ${qty}
								
									<button class="btn btn-outline-secondary minus_btn" data-id="${i}">-</button>
								</td>`;
								if(discount>0)
								{
									html+=`<p class="text-danger"> 
												${discount} ks
											</p>
											<p class="font-weight-lighter"> 
												<del> ${price} ks</del> </p>`;
								}else{
										html+=`<p class="text-danger"> ${price} ks</p>`;
									}
							
								html+=`</td>

								<td>
									<p>${subtotal}</p>
								</td>

							</tr>`;
							$('#cart_body').html(html);
					}

					total+=subtotal++;

				})

				mytfoot+=`<tr>
							<td colspan="4">
								<h3 class="text-right"> Total : </h3>
							</td>
							<td> ${total}</td>
						</tr>`

					$('#cart_tfoot').html(mytfoot);

		}

			// text+=`<div class="col-lg-8">
			// 			<textarea class="form-control " id="notes" placeholder="Any Request..."></textarea>
			// 		</div>
			// 		<div class="col-lg-4">
			// 			<button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn" data-total=${total}> 
			// 				Check Out 
			// 			</button>
			// 		</div>`

			// 		$('.text').html(text);
							 
								
							
	}

	$("tbody").on("click",".plus_btn",function(){
		//alert('ok');

		var id=$(this).data("id");
				
		var itemlist=localStorage.getItem("item");
		var itemArray=JSON.parse(itemlist);
		
		$.each(itemArray,function(i,v){
			if(i==id){
				v.qty++;
			}
		})
			var itemstring=JSON.stringify(itemArray);
			localStorage.setItem("item",itemstring);
			showdata();
			count();
	})

	$("tbody").on("click",".minus_btn",function(){
		//alert('ok');
				
		var id=$(this).data("id");
				
		var itemlist=localStorage.getItem("item");
		var itemArray=JSON.parse(itemlist);
				

		$.each(itemArray,function(i,v){
			if(i==id){
				v.qty--;
				if(v.qty<=0)
				{
					itemArray.splice(id,1);
				}
			}
		})
			var itemstring=JSON.stringify(itemArray);
			localStorage.setItem("item",itemstring);
			showdata();
			count();
	})

})