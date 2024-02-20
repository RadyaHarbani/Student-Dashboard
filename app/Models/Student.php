<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'nis',
        'nama',
        'tanggal_lahir',
        'kelas_id',
        'alamat',
    ];

    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if(isset($filters['search']) && $filters['search']) {
            return $query->where('nama', 'like', '%' . $filters['search'] . '%');
        }
        return $query;
    }
}
