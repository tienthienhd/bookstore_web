<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Requests\CommentRequest;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCommentsOfBook(int $bookId)
    {

    	$comments = Comment::where('book_id',$bookId)->orderBy('created_at')->paginate();
    	return view('books.comment', ['cmt'=>$comments]);
    }

    public function getListWaitForComment(){
    	

    	
    	$bookwaitcmt = OrderDetail::WhereIn('order_id', function($q){
    		$q->select('id')->from('orders')->where('user_id','=',auth()->user()->id);
    	})->whereNotIn('book_id', function($x){
    		$x->select('book_id')->from('comments')->where('user_id','=',auth()->user()->id);
    	})->get();
    	
    
    	
    	
		return view('customer.comment.ListWaitForComment', ['bookwaitcmt'=>$bookwaitcmt]);

    }

    public function getListCommented(){
    	
    	$bookcmted = Comment::where('user_id','=',auth()->user()->id)->get(); // Tìm ra tất cả các comment của người dùng
    	return $bookcmted;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addComment(CommentRequest $request)
    {
        //Validate the data
        $valid = $request->validated();


        //Save comment infor
        $comment = new Comment;
        $comment->title = $request->title;
        $comment->user_id =  auth()->user()->id;
        $comment->book_id = $request->book_id;
        $comment->description = $request->description;
        $comment->star = $request->star;

        $comment->save();
       return redirect()->route('customer.waitcommentlist')
            ->with(
                'status',
                 __(
                    'messages.add-new-comment-successfully',
                    ['id' => $comment->id]
                )
             );

    }

    public function getListCommentsOfMember(){

    	$bookcmted = Comment::where('user_id','=',auth()->user()->id)->get(); // Tìm ra tất cả các comment của người dùng
    	return view('customer.comment.CommentListMember', ['bookcmted'=> $bookcmted]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function getCommentDetail(int $commentId)
    {
        $comment = Comment::where('id',$commentId)->get();
        return view('customer.comment.CommentDetailMember', ['comment'=> $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function updateComment(CommentRequest $request, Comment $comment)
    {
        //Validate the data
        $valid = $request->validated();


        //Save comment infor
       
        $comment->title = $request->title;
         $comment->user_id = auth()->user()->id;
          $comment->book_id =$request->book_id;

        $comment->description = $request->description;
        $comment->star = $request->star;

        $comment->save();
       return redirect()->route('customer.comment.index')
            ->with(
                'status',
                 __(
                    'messages.update-comment-successfully',
                    ['id' => $comment->id]
                )
             );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function deleteComment(int $commentId)
    {
        Comment::destroy($commentId);
       return redirect()->route('customer.comment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddCommentForm( int $bookId)
    {
       
        return view('customer.comment.add', [ 'book_id' => $bookId]);
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function showEditForm(Comment $comment)
    {
        return view('customer.comment.edit', [ 'comment' => $comment]);
    }
}
