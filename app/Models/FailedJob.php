<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class FailedJob
 * @package App\Models
 * @version December 5, 2021, 6:41 pm UTC
 *
 * @property string $uuid
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property string|\Carbon\Carbon $failed_at
 */
class FailedJob extends Model
{


    public $table = 'failed_jobs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'connection' => 'string',
        'queue' => 'string',
        'payload' => 'string',
        'exception' => 'string',
        'failed_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uuid' => 'required|string|max:255',
        'connection' => 'required|string',
        'queue' => 'required|string',
        'payload' => 'required|string',
        'exception' => 'required|string',
        'failed_at' => 'required'
    ];

    
}
