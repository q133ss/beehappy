<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class RoleHasPermission
 * @package App\Models
 * @version December 5, 2021, 6:45 pm UTC
 *
 * @property \App\Models\Permission $permission
 * @property \App\Models\Role $role
 * @property integer $role_id
 */
class RoleHasPermission extends Model
{


    public $table = 'role_has_permissions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'permission_id' => 'integer',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'role_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function permission()
    {
        return $this->belongsTo(\App\Models\Permission::class, 'permission_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }
}
