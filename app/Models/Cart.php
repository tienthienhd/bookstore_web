<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * @var string
     */
	protected $table = "carts";

    /**
     * @var array
     */
    protected $fillable = ['book_id', 'user_id', 'quantity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
    	return $this->belongsTo('App\User','user_id','id'); 
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book(){
    	return $this->belongsTo('App\Models\Book','book_id','id'); 
    }
}
