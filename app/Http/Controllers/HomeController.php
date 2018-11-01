<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BookController;

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
     * @return \Illuminate\Http\Response
     */
    public function welcome(Request $request){
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
