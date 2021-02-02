<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Formfactor extends Model
{
    // use Searchable;
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Servers
    public function FormFactorServer ()
    {
        return $this->hasMany(Servers::class,'form_factor_id');
    }
    //แสดงความสัมพันธ์กับตาราง Upses
    public function FormFactorUps ()
    {
        return $this->hasMany(Upses::class,'form_factor_id');
    }
}
