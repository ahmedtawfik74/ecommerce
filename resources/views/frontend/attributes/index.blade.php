<div>
                    	<table class="table table-striped mt-3">
                    		<thead>
                    		<tr>
                    			<th>#</th>
                    			<th>Sku</th>
                    			<th>Color</th>
                    			<th>Size</th>
                    			<th>price</th>
                    			<th>sale price</th>
                    			<th>stock</th>
                    			<th>action</th>
                    		</tr>
                    		</thead>
                  <tbody>
	        	@forelse( $attributes  as $key =>$attribute )
	        		<tr>
                    			<td>{{$key+1 }}</td>
                    			<td>{{ $attribute->sku }}</td>
                    			<td>{{ $attribute->options['color'] }}</td>
                    			<td>{{ $attribute->options['size'] }}</td>
                    			<td>{{ $attribute->price }}</td>
                    			<td> {{ $attribute->sale_price }}</td>
                    			<td>{{ $attribute->stock }}</td>
                    			<td><a class="btn btn-danger delete_attribute" data-id="{{$attribute->id}}" href="javascript:"><span class="fas fa-trash"></span></a>
                    			</td>
                    </tr>
	        	@empty
	        		<tr>
	        		<p>There is no attribute for this product yet.</p>
	        		</tr>
	        	@endforelse
	        	</tbody>
	        	</table>
                    </div>