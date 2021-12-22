<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Migration
 * @package App\Models
 * @version December 5, 2021, 6:41 pm UTC
 *
 * @property string $migration
 * @property integer $batch
 */
class Migration extends Model
{


    public $table = 'migrations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'migration',
        'batch'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'migration' => 'string',
        'batch' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'migration' => 'required|string|max:255',
        'batch' => 'required|integer'
    ];

    
}
