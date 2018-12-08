@extends("manager.layouts.master")

@section("content")
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Add Book Details</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('manager.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('manager.book.index')}}">Book</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add Book</li>
                </ol>
            </div>
        </div>
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<div class="row">
	        <div class="col-sm-12">
	            <div class="card-box">
	                <div class="card-head">
	                    <header>Add Book</header>
	                    {{-- <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div> --}}
	                </div>
					<form action="{{route('manager.book.store')}}" method="post" enctype="multipart/form-data">
						@csrf

			            <div class="card-body row">
			                <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
			                    <label>{{__('validation.attributes.book.title')}}</label>
			                    <input class="mdl-textfield__input" type="text" name="title" value="{{old('title')}}" id="title">
			                </div>
			                <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
			                    <label>{{__('validation.attributes.book.author')}}</label>
			                    <input class="mdl-textfield__input" type="text" name="author" value="{{old('author')}}" id="author">
			                </div>
			                <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
			                    <label>{{__('validation.attributes.book.category')}}</label>
			                    <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="category">
			                        <option value="">{{__('messages.select-a-category')}}</option>
			                        @foreach ( config('book-category') as $category)
			                            <option value="{{$category}}"  {{ old('category') == $category ? 'selected' : '' }}>
											{{__('book-category.'.$category)}}
										</option>
			                        @endforeach
			                    </select>
			                </div>
			                <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
			                    <label>{{__('validation.attributes.book.saleprice')}}</label>
			                    <input class="mdl-textfield__input" type="number" name="saleprice" value="{{old('saleprice')}}" id="saleprice">
			                </div>
			                <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
			                    <label>{{__('validation.attributes.book.purchasePrice')}}</label>
			                    <input class="mdl-textfield__input" type="number" name="purchasePrice" value="{{old('purchasePrice')}}" id="purchase_price">
			                </div>
			                <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
			                    <label>State</label>
			                    <input class="mdl-textfield__input" type="number" name="state" value="{{old('state')}}" id="state">
			                </div>
			                <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
			                    <label>{{__('validation.attributes.book.cover')}}</label><br>
			                    <img src="" id="showCover"><br>
			                    <input type="file" name="cover" accept="image/*" id="cover" onchange="readURL(this)">
			                    
			                </div>
			                <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
			                    <label>{{__('validation.attributes.book.description')}}</label><br>
			                    <textarea class="mdl-textfield__input" rows="12" name="description">{{old('description')}}</textarea>
			                </div>
			                
			                <div class="col-lg-12 p-t-20 text-center">
			                    <input class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" name="addBook" value="{{__('btn.add-book')}}">
			                </div>
			            </div>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
	        <div class="col-sm-12">
	            <div class="card-box">
	                <div class="card-head">
	                    <header>Add Quantity</header>
	                </div>
	                
	                <form action="{{route('manager.book.add-quantity')}}" method="post">
						@csrf
						<div class="card-body row">
							<label>{{__('validation.attributes.book.bookId')}}:</label>
							<select name='bookId' id='bookId' class='form-control select2'>
								@if(isset($books) && count($books)>0)
						            @foreach($books as $book)
						            <option value="{{$book->id}}">{{$book->id.' - '.$book->title}}</option>
						            @endforeach
						        @else
						            <option value="">{{__('messages.no-book-found')}}</option>
						        @endif
					    	</select>
					        <br>
					        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
								<label>{{__('validation.attributes.book.addQuantity')}}:</label>
								<input class="mdl-textfield__input" type="number" name="addQuantity">
							</div>
							<br>
							<div class="col-lg-12 p-t-20 text-center">
								<input class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" name="addOldBook" value="{{__('btn.add-book')}}">
							</div>
						</div>
					</form>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<script type="text/javascript">
	function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showCover')
                    .attr('src', e.target.result)
                    .width(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script src="{{asset('js/select2.min.js')}}"></script>
	<script type="text/javascript">
		$(function () {
			$('#bookId').select2();
    	});
	</script>
@endsection