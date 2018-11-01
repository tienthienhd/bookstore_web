<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\OldBookRequest;
use App\Http\Requests\EditBookRequest;
use DateTime;

class BookController extends Controller
{
    /**
     * 
     * @return mix
     */
    public function getListBooksForHomePage()
    {
        $books = Book::orderBy('created_at', 'ASC')->paginate();
        return $books;
    }

    /**
     * @param String $category
     * @return mix
     */
    public function getListBooksByCategory($category){
        $books = Book::where('category', $category)->orderBy('created_at')->paginate();
        return $books;
    }

    /**
     * @param String $searchString
     * @return  mix
     */
    public function searchBook($searchString){
        $books = Book::where('title', 'like', '%' . $searchString . '%')
        ->orWhere('author', 'like', '%' . $searchString . '%')
        ->paginate();
        return $books;
    }

    /**
     * @param Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBookDetail(Book $book){
        // Todo
        //if manage để nguyên return về books.manage.show
        //ngược lại bỏ bớt return về books.show
        return view('books.manager.show', ['book' => $book]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBookListManage(){
        $books = Book::sortable()->paginate();
        return view('books.manager.index')->with(['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddBookForm()
    {
        $books = Book::all();
        return view('books.manager.add', ['books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addNewBook(BookRequest $request)
    {
        //  Validate the data
        $valid = $request->validated();

        //  Prepare cover image to save
        $coverFile = $request->cover;
        $cover = ((new DateTime)->getTimestamp()).'_'.rand().'.'.$coverFile->getClientOriginalExtension();
        $destinationPath = public_path('/img/covers');

        //  Save cover image
        $coverFile->move($destinationPath, $cover);

        //  Save book infor
        $book = new Book;

        $book->title = $request->title;
        $book->author = $request->author;
        $book->category = $request->category;
        $book->cover = $cover;
        $book->description = $request->description;
        $book->saleprice = $request->saleprice;
        $book->purchase_price = $request->purchasePrice;
        $book->state = $request->state;

        $book->save();

        return redirect()->back()->with('status', 'Store successfully!');
    }

    /**
     * Update a created resource in storage.
     *
     * @param OldBookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addOldBook(OldBookRequest $request)
    {
        //  Validate the data
        $valid = $request->validated();

        //  Find book by id and update it's state
        $book = Book::find($request->bookId);
        $book->state = $book->state + $request->addQuantity;

        $book->save();

        return redirect()->back()->with('status', 'Update successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditBookForm(Book $book)
    {
        return view('books.manager.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditBookRequest $request
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateBook(EditBookRequest $request, Book $book)
    {
        //  Validate the data
        $valid = $request->validated();

        //  Prepare image file
        if($request->hasFile('cover')){
            /*
            *   If wanna delete old cover
            */
            // $currentPath = getcwd();
            // $url = $currentPath."\\img\\covers\\".$book->cover;
            // @unlink($url); //put @ for surpress any error
        
            //  Prepare cover image to save
            $coverFile = $request->cover;
            $cover = ((new DateTime)->getTimestamp()).'_'.rand().'.'.$coverFile->getClientOriginalExtension();
            $destinationPath = public_path('/img/covers');

            //  Save cover image
            $coverFile->move($destinationPath, $cover);
            $book->cover = $cover;
        }      

        $book->title = $request->title;
        $book->author = $request->author;
        $book->category = $request->category;
        $book->saleprice = $request->saleprice;
        $book->purchase_price = $request->purchasePrice;
        $book->description = $request->description;

        $book->save();

        return redirect()->route('book.show', ['book' => $book])->with('status', 'Update book successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function stopSaleBook(Request $request, Book $book)
    {
        $book->state = -1;
        $book->save();
        return redirect()->back()->with('status', 'Update state of book successfully!');
    }
}
