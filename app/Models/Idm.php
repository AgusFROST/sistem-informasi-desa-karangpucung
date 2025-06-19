<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idm extends Model
{
    use HasFactory;
    protected $table = 'idm';
    protected $fillable = ['idm_status_id', 'nilai', 'tahun'];

    public function idmStatus()
    {
        return $this->belongsTo(IdmStatus::class, 'idm_status_id');
    }
}
