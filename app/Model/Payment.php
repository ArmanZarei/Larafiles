<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

    const METHOD_ONLINE = 1;
    const METHOD_WALLET = 2;

    const STATUS_PENDING = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_FAILED = 3;

    private const METHODS = [
        self::METHOD_ONLINE => 'Online',
        self::METHOD_WALLET => 'Wallet'
    ];

    private const STATUSES = [
        self::STATUS_PENDING => 'Pending',
        self::STATUS_SUCCESS => 'Success',
        self::STATUS_FAILED => 'Failed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getMethodAttribute()
    {
        $method_id = $this->attributes['method'];
        if (!array_key_exists($method_id,self::METHODS))
            return 'Unknown';
        return self::METHODS[$method_id];
    }

    public function getStatusAttribute()
    {
        $status_id = $this->attributes['status'];
        if (!array_key_exists($status_id,self::STATUSES))
            return 'Unknown';
        return self::STATUSES[$status_id];
    }
}
