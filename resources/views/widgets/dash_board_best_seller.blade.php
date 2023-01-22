
<ul  class="beslsellerul">
	<li >
		Best Seller
	</li>
	@foreach($bestsellers as $key => $bestseller)
		<li >
		<span class="p_name">{{ $bestseller->product_name }} </span>- <span class="p_qtys">{{ $bestseller->QTY }}</span><span> Item</span>
		</li>
	@endforeach
</ul>