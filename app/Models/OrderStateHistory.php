<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStateHistory extends Model
{
    /**
     * @var string
     */
    protected $table = "order_state_histories";

    /**
     * @var array
     */
    protected $fillable = ['order_id', 'state', 'title', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(){
    	return $this->belongsTo('App\Models\Order','order_id','id'); 
    }
}
