<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    protected $table = "table_topik";
    protected $primaryKey = 'id_topik';
    public function seminar()
    {
        return $this->hasMany('App\Seminar', 'topik_id');
    }
}
