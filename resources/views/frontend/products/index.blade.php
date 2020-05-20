@extends('app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="container">
	<div class="row justify-content-center mt-5">
        <div class="col-md-10 " style="margin-top: 50px;">
	        <div class="page-header">
	        	<h1>
					{{ $pageTitle }}
	    		</h1>
	        </div>
	        <div class="row">
		        <div class="col-md-4">
		        	<a class="btn btn-success" href="{{route('products.create')}}">Add New Product</a>
		        </div>
			    <div class="col-md-8">
			        <form action="{{ route('products.index') }}" method="get">
				        <div class="row">
				        <div class="col-md-7">
			                   <input type="text" class="form-control" name="search" placeholder="search ..." value="{{ request()->search }}">
			            </div>
			            <div class="col-md-1">
			                   <button class="btn btn-info"><i class="fa fa-search-plus"></i> Search..</button>
			            </div>
			        	</div>
		            </form>
	            </div>
            </div>
    		@include('frontend.partials.flash')
	        <div mt-3>
                    <div>
                    	<table class="table table-striped mt-3">
                    		<thead>
                    		<tr>
                    			<th>#</th>
                    			<th>Name</th>
                    			<th>code</th>
                    			<th>description</th>
                    			<th>status</th>
                    			<th>#No pro with attr</th>
                    			<th>action</th>
                    		</tr>
                    		</thead>
                  <tbody>
	        	@forelse( $products  as $key =>$product )
	        		<tr>
                    			<td>{{$key+1 }}</td>
                    			<td>{{ $product->name }}</td>
                    			<td>{{ $product->code }}</td>
                    			<td>{{ $product->description}}</td>
                    			<td>
                    				@if($product->status ==1 )<span class="badge badge-success">Active</span>
                    				@else
                    				<span class="badge badge-secondary">Not Active</span>
                    				@endif
                    			</td>
                    			<td>@if($product->attributesCount == 0 )
                    					<span> no attributes for this product</span>
                    				@else
                    					<span class="badge badge-success">{{ $product->attributesCount}}</span>
                    				@endif
                    				</td>
                    			<td>
                    				<a class="btn btn-info" href="{{route('product.show',['id'=>$product->id])}}"><span class="">details</span></a>

                    				<a class="btn btn-danger delete_product" data-id="{{$product->id}}" href="javascript:"><span class="fas fa-trash"></span></a>

                    				<a class=" btn btn-primary" href="{{route('product.edit',['id'=>$product->id])}}"><span class="fas fa-edit"></span></a>

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
	                <div class="mt-5">
	                	{{--{{ $attributes->links() }}--}}
	                </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.11.0/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.delete_product').click(function(){
		var id =$(this).data('id');
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		    Swal.fire(
		      	'Deleted!',
      			'Attribute has been deleted.',
      			'success'
		    )

			window.location.href="{{ config('app.url' )}}/products/"+id+"/delete";
		  }
		})
	})
});
</script>

@endpush