<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{
    use Sortable;
    /**
     * @var string
     */
    protected $table = "books";

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'author',
        'category',
        'cover',
        'description',
        'saleprice',
        'purchase_price',
        'state'
    ];

     /**
     * @var array
     */
    protected $sortable = [
        'id',
        'title',
        'author',
        'category',
        'cover',
        'description',
        'saleprice',
        'purchase_price',
        'state'
    ];

    /**
     * @var int
     */
    protected $perPage = 12;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts(){
    	return $this->hasMany('App\Models\Cart','book_id','id'); 
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
    	return $this->hasMany('App\Models\Comment','book_id','id'); 
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderDetail(){
    	return $this->belongsTo('App\Models\OrderDetail','book_id'); 
    }
}
