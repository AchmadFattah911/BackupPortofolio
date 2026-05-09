<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'image',
        'url',
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;

    // 
    // Pastikan URL selalu menggunakan format absolute (berawalan http:// atau https://).
    // Jika tidak ada, maka otomatis ditambahkan https://
    // 
    public function getUrlAttribute($value)
    {
        if ($value && !\Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])) {
            return 'https://' . $value;
        }
        return $value;
    }
}
