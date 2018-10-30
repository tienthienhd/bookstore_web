<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    /**
     * @var string
     */
    protected $table = "role_permissions";

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['role_id', 'permission_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(){      
    	return $this->belongsTo('App\Models\Role','role_id','id');    
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission(){      
    	return $this->belongsTo('App\Models\Permission','permission_id','id');    
    } 
}
