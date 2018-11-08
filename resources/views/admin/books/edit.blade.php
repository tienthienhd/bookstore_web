@extends('admin.layouts.master')

@section('content')
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
                        <header>Book Detail: <q> {{ $book->title }} </q></header>
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
                        <div class="col-lg-12 p-t-20"> 
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class = "mdl-textfield__input" type = "text" value="{{ $book->title }}" id = "txtTitle">
                                <label class = "mdl-textfield__label">Title</label>
                          </div>
                        </div>
                        <div class="col-lg-6 p-t-20"> 
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class = "mdl-textfield__input" type = "text" value="{{ $book->author }}" id = "txtAuthor">
                                <label class = "mdl-textfield__label" >Author</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                <input class="mdl-textfield__input" type="text" id="list_category" value="{{ $book->category }}" readonly tabIndex="-1">
                                <label for="list_category" class="pull-right margin-0">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                </label>
                                <label for="list_category" class="mdl-textfield__label">Catogory</label>
                                <ul data-mdl-for="list_category" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li class="mdl-menu__item" data-val="1">Toán học</li>
                                    <li class="mdl-menu__item" data-val="2">Tiểu Thuyết</li>
                                    <li class="mdl-menu__item" data-val="3">Kỹ năng sống</li>
                                    <li class="mdl-menu__item" data-val="4">Ngoại ngữ</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class = "mdl-textfield__input" type = "text" value="{{ $book->saleprice}}"
                                pattern = "-?[0-9]*(\.[0-9]+)?" id = "saleprice">
                                <label class = "mdl-textfield__label" for = "saleprice">Sale price (vnđ)</label>
                                <span class = "mdl-textfield__error">Number required!</span>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class = "mdl-textfield__input" type = "text" value="{{ $book->purchase_price}}"
                                    pattern = "-?[0-9]*(\.[0-9]+)?" id = "purchase_price">
                                <label class = "mdl-textfield__label" for = "purchase_price">Purchase price (vnđ)</label>
                                <span class = "mdl-textfield__error">Number required!</span>
                            </div>
                        </div>                                    
                        <div class="col-lg-12 p-t-20"> 
                            <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                                <textarea class = "mdl-textfield__input" rows =  "5" 
                                id = "description" >{{ $book->description }}</textarea>
                                <label class = "mdl-textfield__label" for = "description">Description</label>
                            </div>
                        </div>
                        <div class="col-lg-12 p-t-20">
                            <label class="control-label col-md-3">Upload Photo</label>
                            <form id="id_dropzone" class="dropzone">
                                <div class="dz-message">
                                    <div class="dropIcon">
                                        <i class="material-icons">cloud_upload</i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>
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
@endsection