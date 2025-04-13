<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function job()
{
    // return $this->belongsTo(Job::class);
    return $this->belongsTo(Job::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
}
