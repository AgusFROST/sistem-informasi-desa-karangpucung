<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sdgs extends Model
{
    use HasFactory;
    protected $table = 'sdgs'; // Nama tabel untuk model SDG


    // Pastikan kolom `sdgs_img_id` ada di database
    protected $fillable = ['nilai', 'sdgs_img_id'];

    // Definisikan relasi ke tabel sdgs_img
    public function sdgsImg()
    {
        return $this->belongsTo(SdgsImg::class, 'sdgs_img_id'); // Kolom foreign key di tabel SDGs
    }
}
