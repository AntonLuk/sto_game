<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function prize() {
        return $this->belongsTo(Prize::class, 'prize_id');
    }

}
