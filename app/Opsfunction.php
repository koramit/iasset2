<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Opsfunction extends Model
{
    // use Searchable;
    protected $fillable = [
        'id',
        'name',
    ];

    public function OpsFunctionClient ()
    {
        return $this->hasMany(Client::class,'function_id');
    }
}
