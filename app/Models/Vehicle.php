<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;  
    use SoftDeletes;

    // Table yang digunakan (kalau nama ikut konvensyen Laravel boleh abaikan)
    protected $table = 'vehicles';

    // Field yang boleh diisi melalui create() / update()
    protected $fillable = [
        'name',
        'user_id',
        'qty',
        'price',
        'description',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
