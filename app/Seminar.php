<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $table = "table_seminar";
    protected $primaryKey = 'id_seminar';
    protected $fillable = [
        'nama_seminar', 'topik_id', 'waktu_mulai','waktu_selesai', 'deskripsi','durasi'
    ];
    public function sfile()
    {
        return $this->hasMany('App\SFile');
    }
    public function su()
    {
        return $this->hasMany('App\SeminarUser');
    }
    public function sertifikat()
    {
        return $this->hasMany('App\Serifikat');
    }
    public function topik()
    {
        // return $this->belongsTo('App\Topik','id_topik');
        return $this->belongsTo('App\Topik', 'topik_id');
        // dd($this->belongsTo('App\Topik'));
        // return $this->hasMany('App\Topik','id_topik');
    }
}
