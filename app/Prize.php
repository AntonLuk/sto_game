<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    public function type(){
        return $this->belongsTo(PrizeType::class,'type_id');
    }
}
