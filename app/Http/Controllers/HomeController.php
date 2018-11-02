<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BookController;
use App\Http\Requests\SearchFilterBookRequest;

class HomeController extends Controller
{
    /**
     *
     * @var BookController
     */
    private $bookController;

    /**
     * 
     * @param BookController $bookController 
     */
    public function __construct(BookController $bookController)
    {
        $this->middleware('auth')->except('welcome');
        $this->bookController = $bookController;
    }

    /**
     * 
     * @param  SearchFilterBookRequest $request 
     * @return \Illuminate\Http\Response                           
     */
    public function welcome(SearchFilterBookRequest $request){
        //  Validate the data
        $valid = $request->validated();

        $searchString = $request->searchString;
        $refineCategory = $request->refineCategory;
        if($searchString != ''){
            $books = $this->bookController->searchBook($searchString);
        }elseif($refineCategory != ''){
            $books = $this->bookController->getListBooksByCategory($refineCategory);
        }else{
            $books = $this->bookController->getListBooksForHomePage();
        }
        return view('welcome', [
            'books' => $books, 
            'refineCategory' => $refineCategory,
            'searchString' => $searchString,
        ]);
    }

    /**
     * 
     * @param  SearchFilterBookRequest $request 
     * @return \Illuminate\Http\Response                           
     */
    public function index(SearchFilterBookRequest $request){
        //  Validate the data
        $valid = $request->validated();

        $searchString = $request->searchString;
        $refineCategory = $request->refineCategory;
        if($searchString != ''){
            $books = $this->bookController->searchBook($searchString);
        }elseif($refineCategory != ''){
            $books = $this->bookController->getListBooksByCategory($refineCategory);
        }else{
            $books = $this->bookController->getListBooksForHomePage();
        }
        return view('home', [
            'books' => $books, 
            'refineCategory' => $refineCategory,
            'searchString' => $searchString,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminHome()
    {
        return view('admin.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function managerHome()
    {
        return view('manager.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function locked()
    {
        return view('locked');
    }
}
