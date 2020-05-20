@extends('app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="container ">
    <div class="row mt-5">
        <div class="col-md-10 col-md-offset-1">
    <div class="app-title" style="margin-top: 50px;">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
        </div>
    </div>
    @include('frontend.partials.flash')
    <div class="row user">
        <div class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form id="form" action="{{ route('products.store') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Add Product Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Name</label>
                                    <input
                                        class="form-control @error('code') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter attribute name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="code">Code</label>
                                            <input
                                                class="form-control @error('code') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter product code"
                                                id="code"
                                                name="code"
                                                value="{{ old('code') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('code') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Description</label>
                                    <textarea name="description" id="description" rows="8" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="status"
                                                    name="status"
                                                />Status
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                            <h3 class="tile-title">Add Product Attributes</h3>
                            <hr>

                            <div class="form-group">
                                <div class="field_wrapper">
                                <div>
                                    <input type="text" name="color[]" id="color" style="width: 120px;" placeholder=" color" required />
                                    <input type="text" name="size[]" id="size" style="width: 120px;" placeholder=" size" required/>
                                    <input type="text" name="sku[]" id="sku" style="width: 120px;" placeholder=" sku" required />
                                    <input type="text" name="price[]" id="price" style="width: 120px;" placeholder=" price" required />
                                    <input type="text" name="sale_price[]" id="sale_price" style="width: 120px;" placeholder=" sale price" required />
                                    <input type="number" name="stock[]" id="stock" style="width: 120px;" placeholder=" stock" required />
                                    <a  href="javascript:void(0);" class="add_button btn btn-success" title="Add field">Add new Attr</a><hr/>
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
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2 mb-5">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Product</button>
                                        <a class="btn btn-danger" href="{{ route('products.index')}}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = `<div><input type="text" name="color[]" id="color" style="width: 120px;" placeholder=" color" required />
                                    <input type="text" name="size[]" id="size" style="width: 120px;" placeholder=" size" required />
                                    <input type="text" name="sku[]" id="sku" style="width: 120px;" placeholder=" sku" required />
                                    <input type="text" name="price[]" id="price" style="width: 120px;" placeholder=" price" required />
                                    <input type="text" name="sale_price[]" id="sale_price" style="width: 120px;" placeholder=" sale price" required />
                                    <input type="number" name="stock[]" id="stock" style="width: 120px;" placeholder=" stock" required /><a href="javascript:void(0);" class="remove_button"><span class="fas fa-trash btn btn-danger"></span></a><hr/></div>`; //New input field html
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function(){
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

    $('#form').validate({ // initialize the plugin
        rules: {
            name: {
                required: true,
            },
            code :{
                required: true,
            }

        }
    });
});
</script>


@endpush
