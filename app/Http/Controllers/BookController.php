<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\OldBookRequest;
use App\Http\Requests\EditBookRequest;
use App\Http\Requests\SearchBookRequest;
use DateTime;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\CommentController;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('add-new-book-staff')->only(['addNewBook','updateBook', 'stopSaleBook']);
        $this->middleware('add-old-book-staff')->only('addOldBook');
    }

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
    public function getBookDetailManage(Book $book){
        return view('manager.books.show', ['book' => $book]);

    }

    /**
     * @param Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBookDetail(Book $book){
        $star = $book->comments()->avg('star');
        $countComment = $book->comments()->count();
        $commentController = new CommentController;
        $comments = $commentController->getCommentsOfBook($book->id);
        return view('books.show', 
            [
                'book' => $book,
                'star' => $star, 
                'countComment' => $countComment,
                'comments' => $comments,
             ]);

    }

    /**
     * @param SearchBookRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBookListManage(SearchBookRequest $request){
        //  Validate the data
        $valid = $request->validated();
        
        $searchId = $request->searchId;
        $searchTitle = $request->searchTitle;
        $searchAuthor = $request->searchAuthor;
        $searchCategory = $request->searchCategory;

        $books = Book::sortable();

        if ($searchId != '') {
            $books = $books->where('id', $searchId);
        }
        if ($searchTitle != '') {
            $books= $books->where('title', 'like', '%' . $searchTitle . '%');
        }
        if ($searchAuthor != '') {
            $books = $books->where('author', 'like', '%' . $searchAuthor . '%');
        }
        if ($searchCategory != '') {
            $books = $books->where('category', $searchCategory);
        }

        $books = $books->paginate();

        return view('manager.books.index')->with([
            'books' => $books,
            'searchId' => $searchId,
            'searchTitle' => $searchTitle,
            'searchAuthor' => $searchAuthor,
            'searchCategory' => $searchCategory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddBookForm()
    {
        $books = Book::all();
        return view('manager.books.add', ['books' => $books]);
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
        $cover = ((new DateTime)->getTimestamp())
            .'_'.rand().'.'.$coverFile->getClientOriginalExtension();
        $destinationPath = storage_path('app/public/img/covers');

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

        return redirect()->route('manager.book.index')
            ->with(
                'status',
                 __(
                    'messages.add-new-book-successfully',
                    ['id' => $book->id]
                )
             );
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

        //  If book had been stopped salling
        if($book->state < 0){
            $book->state = $book->state - $request->addQuantity;
        }else{
            $book->state = $book->state + $request->addQuantity;
        }

        $book->save();

        return redirect()->route('manager.book.index')
            ->with(
                'status', 
                __(
                    'messages.add-old-book-successfully',
                    [
                        'id' => $book->id, 
                        'quantity' => $request->addQuantity
                    ]
                )
            );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditBookForm(Book $book)
    {
        return view('manager.books.edit', ['book' => $book]);
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
            $cover = ((new DateTime)->getTimestamp())
                .'_'.rand().'.'.$coverFile->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/img/covers');

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

        return redirect()->route('manager.book.show', ['book' => $book])
            ->with(
                'status',
                 __(
                    'messages.update-book-successfully',
                    ['id' => $book->id]
                )
             );
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
        $book->state = -$book->state -1;
        /*
        *   If have 0 book, stop sale -> -1
        *   If have 10 books, stop sale -> -11
        *   And then when to sale again, $book->state = -$book->state -1
        */
        $book->save();

        //  Stop sale book
        if($book->state < 0){
            return redirect()->back()
                ->with(
                    'status',
                     __(
                        'messages.stop-sale-book-successfully',
                        ['id' => $book->id]
                    )
                 );    
        }

        //  Resale book
        return redirect()->back()
            ->with(
                'status',
                 __(
                    'messages.re-stop-sale-book-successfully',
                    ['id' => $book->id]
                )
             );
    }

    public function getHotBooks(){
        $orderDetailController = new OrderDetailController;
        $hotBooks = $orderDetailController->getHotBooks();
        return $hotBooks;
        // foreach ($hotBooks as $hotBook) {
        //     print_r($hotBook->book->title);
        //     print_r($hotBook->sum);
        //}
    }

}
