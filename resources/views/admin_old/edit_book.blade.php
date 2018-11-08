@extends('admin/layouts/master')
@section('content')
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Edit Book</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Manager</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Edit Book</li>
                </ol>
            </div>
        </div>
         <div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Edit Book</header>
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
			            <div class="col-lg-6 p-t-20"> 
			              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
		                     <input class = "mdl-textfield__input" type = "text" value="Canh dong" id = "txtFirstName">
		                     <label class = "mdl-textfield__label">Title</label>
		                  </div>
			            </div>
			            <div class="col-lg-6 p-t-20"> 
			              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
		                     <input class = "mdl-textfield__input" type = "text" value="tien thien" id = "txtLasttName">
		                     <label class = "mdl-textfield__label" >Author</label>
		                  </div>
			            </div>
			             
			             <div class="col-lg-6 p-t-20"> 
			              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
					            <input class="mdl-textfield__input" type="text" id="sample1" value="Van hoc" readonly tabIndex="-1">
					            <label for="sample1" class="pull-right margin-0">
					                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
					            </label>
					            <label for="sample1" class="mdl-textfield__label">Category</label>
					            <ul data-mdl-for="sample1" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
					                <li class="mdl-menu__item" data-val="DE">Van hoc</li>
					                <li class="mdl-menu__item" data-val="BY">Kinh te</li>

					            </ul>
					        </div>
			            </div>
			            <div class="col-lg-6 p-t-20"> 
			              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
		                     <input class = "mdl-textfield__input" type = "text" value="..." id = "txtemail">
		                     <label class = "mdl-textfield__label" >Description</label>
		                      {{-- <span class = "mdl-textfield__error">Enter Valid Email Address!</span> --}}
		                  </div>
			            </div>
						<div class="col-lg-6 p-t-20">
			               <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
		                     <input class = "mdl-textfield__input" type = "text" value="100"
		                        pattern = "-?[0-9]*(\.[0-9]+)?" id = "text5">
		                     <label class = "mdl-textfield__label" for = "text5">Sale price</label>
		                     <span class = "mdl-textfield__error">Number required!</span>
		                  </div>
			            </div>
			            <div class="col-lg-6 p-t-20">
			               <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
		                     <input class = "mdl-textfield__input" type = "text" value="200"
		                        pattern = "-?[0-9]*(\.[0-9]+)?" id = "text5">
		                     <label class = "mdl-textfield__label" for = "text5">Purchase price</label>
		                     <span class = "mdl-textfield__error">Number required!</span>
		                  </div>
			            </div>
			            <div class="col-lg-6 p-t-20"> 
			              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
					            <input class="mdl-textfield__input" type="text" id="sample2" value="Con hang" readonly tabIndex="-1">
					            <label for="sample2" class="pull-right margin-0">
					                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
					            </label>
					            <label for="sample2" class="mdl-textfield__label">State</label>
					            <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
					                <li class="mdl-menu__item" data-val="DE">Con hang</li>
					                <li class="mdl-menu__item" data-val="BY">het hang</li>
									<li class="mdl-menu__item" data-val="K">ngung kinh doanh</li>
					            </ul>
					        </div>
			            </div>
			            <label class="control-label col-md-3">Upload Photo Cover</label>
			             <form id="id_dropzone" class="dropzone">
								<div class="dz-message">
									<div class="dropIcon">
										<i class="material-icons">cloud_upload</i>
									</div>
									<h3>Drop files here or click to upload.</h3>
									<em>(This is just a demo. Selected files are <strong>not</strong>
										actually uploaded.)
									</em>
								</div>
							</form>
                           </div>
                           <div class="col-lg-12 p-t-20"> 
			              <div class = "mdl-textfield mdl-js-textfield txt-full-width">
		                     <textarea class = "mdl-textfield__input" rows =  "4" 
		                        id = "education" >document submited</textarea>
		                     <label class = "mdl-textfield__label" for = "text7">Comment</label>
		                  </div>
				         </div>
				         <div class="col-lg-12 p-t-20 text-center"> 
			              	<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
							<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
			            </div>
					</div>
				</div>
			</div>
		</div> 
    </div>
</div>
<!-- end page content -->
@endsection