<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'name',
        'order',
        'commission',
        'min_balance',
        'valid_days',
        'description',
        'image',
        'video',
        'withdraw_per_day'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
