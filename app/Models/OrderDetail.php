<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    /**
     * @var string
     */
    protected $table = "order_details";

    /**
     * @var array
     */
    protected $fillable = ['book_id', 'order_id', 'quantity', 'dead_price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(){
    	return $this->belongsTo('App\Models\Order','order_id','id'); 
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book(){
          return $this->hasOne('App\Models\Book','id','book_id'); 
    }
}
