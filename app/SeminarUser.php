<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeminarUser extends Model
{
    protected $table = "table_seminar_user";
    protected $primaryKey = 'id_su';

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function seminar()
    {
        return $this->belongsTo('App\Seminar','seminar_id');
    }
}
