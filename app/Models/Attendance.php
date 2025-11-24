<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //モデルとテーブルを紐づけ
    protected $table = 'attendances';
    protected $casts = ['attendance' => 'json'];
    protected $fillable = [
        'date',
        'year',
        'month',
        'attendance',
        'submitter',
        'status',
    ];
}
