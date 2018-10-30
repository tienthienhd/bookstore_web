<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var string
     */
	protected $table = "orders";

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'total', 'delivery', 'state'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
    	return $this->belongsTo('App\User','user_id','id'); 
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails(){
    	return $this->hasMany('App\Models\OrderDetail','order_id','id'); 
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderStateHistories(){
    	return $this->hasMany('App\Models\OrderStateHistory','order_id','id'); 
    }
}
