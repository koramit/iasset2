<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Laravel\Scout\Searchable;

class Topology extends Model
{
    // use Searchable;
    protected $fillable = [
        'id',
        'name',
    ];

    //แสดงความสัมพันธ์กับตาราง Upses
    public function TopologyUps()
    {
        return $this->hasMany(Upses::class, 'topology_id');
    }
}
