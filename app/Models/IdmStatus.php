<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdmStatus extends Model
{
    use HasFactory;
    protected $table = 'idm_status';
    protected $fillable = ['status'];

    public function idm()
    {
        return $this->hasMany(Idm::class, 'idm_status_id');
    }
}
