@extends('app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="container">
	<div class="row justify-content-center mt-5">
        <div class="col-md-8 ">
	        <div class="page-header "style="margin-top: 50px;">
	        	<h1>
					{{ $pageTitle }}
	    		</h1>
	        </div>
    		@include('frontend.partials.flash')
	        <div mt-3>
	        	<div class="card  mt-3">
                        <div class="card-header alert alert-primary" role="alert">
                                Product Info
                        </div>
                    <div class="card-body">
                           <div><label>product Name : </label>{{ $product->name}}</div>
                           <div><label>product Code  :</label>{{ $product->code }}</div>
                           <div><label>product Description  :</label>{{ $product->description }}</div>
                           <div><label> product Status :</label>
                           	@if($product->status == 1 )<span class="badge badge-success">Active</span>
                           	@else <span class="badge badge-secondary">not Active</span>
                           	@endif
                           </div>
                           <form action="{{route('attributes.store')}}" method="POST" >
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                           <div>
                             <div class="form-group">
                                <div class="field_wrapper">
                                <div >
                                  <a style="margin-left: 80%;"  href="javascript:void(0);" class="add_button btn btn-success" title="Add field">Add new Attr</a><hr/>
                                </div>

                                 @if (isset($errors) && count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <button id="btn_form_attr"  class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save attributes</button>
                           </div>
                         </form>
                    </div>
                    </div>
                    @include('frontend.attributes.index')
	        </div>
	    </div>
	</div>
</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.11.0/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#btn_form_attr').hide();
	$('.delete_attribute').click(function(){
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

			window.location.href="{{ config('app.url' )}}/product-attribute/"+id+"/delete";
		  }
		})
	});
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = `<div><input type="text" name="color[]" id="color" style="width: 100px;" placeholder=" color" required />
                                    <input type="text" name="size[]" id="size" style="width: 100px;" placeholder=" size" required />
                                    <input type="text" name="sku[]" id="sku" style="width: 100px;" placeholder=" sku" required />
                                    <input type="text" name="price[]" id="price" style="width: 100px;" placeholder=" price" required />
                                    <input type="text" name="sale_price[]" id="sale_price" style="width: 100px;" placeholder=" sale price" required />
                                    <input type="number" name="stock[]" id="stock" style="width: 100px;" placeholder=" stock" required /><a href="javascript:void(0);" class="remove_button"><span class="fas fa-trash btn btn-danger"></span></a><hr/></div>`; //New input field html
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function(){
        if(x >= 1)
        {
          $('#btn_form_attr').show();
        }
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

@endpush