<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = "table_sertifikat";
    protected $primaryKey = 'id_sertifikat';

    public function seminar()
    {
        return $this->belongsTo('App\Seminar', 'seminar_id');
    }
}
