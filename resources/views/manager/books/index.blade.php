@extends('manager.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Books</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('manager.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('manager.book.index')}}">Book</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Books</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Books</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row p-b-20">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="{{route('manager.book.create')}}" id="addRow" class="btn btn-info">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group pull-right">
                                    <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-print"></i> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                        @if (isset($errorMessage))
					        <div class="alert alert-danger">
					            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Close') }}">
					                <span aria-hidden="true">&times;</span>
					            </button>
					            <ul>
					                <li>{{ $errorMessage }}</li>
					            </ul>
					        </div>
					    @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif 
                        <form class="row" action="{{route('manager.book.index')}}" method="get">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                <input type="text" class="form-control" name="searchId" value="{{ old('searchId') ?? $searchId ?? ''}}" placeholder="{{__('validation.attributes.book.id')}}">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <input type="text" class="form-control" name="searchTitle" value="{{ old('searchTitle') ?? $searchTitle ??''}}" placeholder="{{__('validation.attributes.book.title')}}">
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                <input type="text" class="form-control" name="searchAuthor" value="{{ old('searchAuthor') ?? $searchAuthor ?? ''}}" placeholder="{{__('validation.attributes.book.author')}}">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <select name='searchCategory' class="form-control">
                                    <option value="">{{__('messages.select-a-category')}}</option>
                                    @foreach ( config('book-category') as $category)
                                        <option value="{{$category}}" {{ old('searchCategory') == $category || (isset($searchCategory) && $searchCategory == $category) ? 'selected' : ''}}>
                                            {{__('book-category.'.$category)}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                <input type="submit" class="form-control label label-primary" name="search" value="{{__('btn.search')}}">
                            </div>
                        </form>
					    @if(isset($books))
                        <div class="table-scrollable">
                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                                <tr>
                                	<th class="center">@sortablelink('id', __('validation.attributes.book.id'))</th>
				    				<th class="center">@sortablelink('title', __('validation.attributes.book.title'))</th>
				    				<th class="center">@sortablelink('author', __('validation.attributes.book.author'))</th>
				    				<th class="center">@sortablelink('category', __('validation.attributes.book.category'))</th>
				    				<th class="center">@sortablelink('saleprice', __('validation.attributes.book.saleprice'))</th>
				    				<th class="center">@sortablelink('purchase_price', __('validation.attributes.book.purchasePrice'))</th>
				    				<th class="center">@sortablelink('state', __('validation.attributes.book.state'))</th>
				    				<th class="center"> <a href="#"> Action </a></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($books as $book)
									<tr>
										<td class="center">{{$book->id}}</td>
										<td class="center">{{$book->title}}</td>
										<td class="center">{{$book->author}}</td>
										<td class="center">{{__('book-category.'.$book->category)}}</td>
										<td class="center">{{__('word-and-statement.price', ['price' => number_format($book->saleprice, 0, '.', '.')])}}</td>
										<td class="center">{{__('word-and-statement.price', ['price' => number_format($book->purchase_price, 0, '.', '.')])}}</td>
										<td class="center">
											@if ($book->state > 0)
												<span class="label label-sm label-success">{{$book->state}}</span>
											@elseif ($book->state == 0 )
												<span class="label label-sm label-warning">{{$book->state}}</span>
											@else
												<span class="label label-sm label-danger">{{$book->state}}</span>
											@endif
										</td>
										<td class="center">
											<a href="{{route('manager.book.show',['bookId' => $book->id])}}">
												<span class="label label-sm lable-info"><i class="fa fa-info-circle"> Detail</i></span>
											</a>
                                            {{-- <a href="{{route('manager.book.edit', ['book' => $book])}}" class="btn btn-tbl-edit btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a> --}}
										</td>
									</tr>
						    	@endforeach				
							</tbody>
                        </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-sm-12 col-md-5"></div>
        	<div class="col-sm-12 col-md-7">{{ $books->links() }}</div>
        </div>
    </div>
</div>
@endsection