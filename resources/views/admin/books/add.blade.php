@extends("admin.layouts.master")

@section("content")
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Add Book Details</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('manager.book.index')}}">Manager</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add Book</li>
                </ol>
            </div>
        </div>
         <div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add Book Details</header>
						<button id = "panel-button" 
                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
                           data-upgraded = ",MaterialButton">
                           <i class = "material-icons">more_vert</i>
                        </button>
                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                           data-mdl-for = "panel-button">
                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
                        </ul>
					</div>
					<div class="card-body row">
						<form class="row" action="{{route('manager.book.store')}}" method="post" enctype="multipart/form-data">
							@csrf
				            <div class="col-lg-6 p-t-20"> 
				              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
			                     <input class = "mdl-textfield__input" type = "text" id = "txtTitle" value="{{old('title')}}" name="title">
			                     <label class = "mdl-textfield__label">{{__('validation.attributes.book.title')}}</label>
			                  </div>
				            </div>
				            <div class="col-lg-6 p-t-20"> 
				              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
			                     <input class = "mdl-textfield__input" type = "text" id = "txtAuthor" value="{{old('author')}}" name="author">
			                     <label class = "mdl-textfield__label">{{__('validation.attributes.book.author')}}</label>
			                  </div>
				            </div>
				            <div class="col-lg-6 p-t-20"> 
				              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
						            <input class="mdl-textfield__input" type="text" id="listCategory" value="{{__('messages.select-a-category')}}" readonly tabIndex="-1" name="category">
						            <label for="listCategory" class="pull-right margin-0">
						                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
						            </label>
						            <label for="listCategory" class="mdl-textfield__label">{{__('validation.attributes.book.category')}}</label>
						            <ul data-mdl-for="listCategory" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
						            	@foreach( config('book-category') as $category)
						            		<li class="mdl-menu__item" data-val="{{__('book-category.'.$category)}}">{{__('book-category.'.$category)}}</li>
						            	@endforeach
						            </ul>
						        </div>
				           	</div>
				           	<div class="col-lg-6 p-t-20">
				               <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
			                     <input class = "mdl-textfield__input" type = "text" 
			                        pattern = "-?[0-9]*(\.[0-9]+)?" id = "saleprice" value="{{old('saleprice')}}" name="saleprice">
			                     <label class = "mdl-textfield__label" for = "saleprice">{{__('validation.attributes.book.saleprice')}}</label>
			                     <span class = "mdl-textfield__error">Number required!</span>
			                  </div>
				            </div>
				            <div class="col-lg-6 p-t-20">
				               <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
			                     <input class = "mdl-textfield__input" type = "text" 
			                        pattern = "-?[0-9]*(\.[0-9]+)?" id = "saleprice" value="{{old('purchasePrice')}}" name="purchasePrice">
			                     <label class = "mdl-textfield__label" for = "purchasePrice">{{__('validation.attributes.book.purchasePrice')}}</label>
			                     <span class = "mdl-textfield__error">Number required!</span>
			                  </div>
				            </div>
				            <div class="col-lg-6 p-t-20">
				               <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
			                     <input class = "mdl-textfield__input" type = "text" 
			                        pattern = "-?[0-9]*(\.[0-9]+)?" id = "state" value="{{old('state')}}" name="state">
			                     <label class = "mdl-textfield__label" for = "state">{{__('validation.attributes.book.state')}}</label>
			                     <span class = "mdl-textfield__error">Number required!</span>
			                  </div>
				            </div>
				            <div class="col-lg-12 p-t-20"> 
				                <div class = "mdl-textfield mdl-js-textfield txt-full-width">
			                        <textarea class = "mdl-textfield__input" rows =  "4" 
			                        id = "description" name="description">{{old('description')}}</textarea>
			                        <label class = "mdl-textfield__label" for = "description">{{__('validation.attributes.book.description')}}</label>
			                    </div>
					        </div>
				            <div class="col-lg-12 p-t-20">
				            <label class="control-label col-md-3">Upload Cover Photos</label>
				            	<input type="file" name="cover" accept="image/*"><br>
					            {{-- <form id="id_dropzone" class="dropzone">
									<div class="dz-message">
										<div class="dropIcon">
											<i class="material-icons">cloud_upload</i>
										</div>
										<h3>Drop files here or click to upload.</h3>
										<em>(This is just a demo. Selected files are <strong>not</strong>
											actually uploaded.)
										</em>
									</div>
								</form> --}}
	                        </div>
	                        <div class="col-lg-12 p-t-20"> 
				            {{-- <div class = "mdl-textfield mdl-js-textfield txt-full-width">
			                    <textarea class = "mdl-textfield__input" rows =  "4" 
			                        id = "education" ></textarea>
			                    <label class = "mdl-textfield__label" for = "text7">Room Details</label>
			                </div> --}}
					        </div>
					        <div class="col-lg-12 p-t-20 text-center"> 
				              	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="addBook" value="{{__('btn.add-book')}}">Submit</button>
								{{-- <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button> --}}
				            </div>
				        </form>
					</div>
				</div>
			</div>
		</div> 
    </div>
</div>

@endsection