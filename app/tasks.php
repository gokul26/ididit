<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    //
    public function users()
    {
        return $this->belongsTo('App\Users');
    }
}
