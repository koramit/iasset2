<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Networkedstoragetype extends Model
{
    // use Searchable;
    protected $fillable = [
        'id',
        'name',
    ];
    public function TypeNetworkedStorage ()
    {
        return $this->hasMany(Networkedstorage::class,'storage_type_id');
    }
}
