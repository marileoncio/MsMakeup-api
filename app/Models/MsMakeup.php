<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsMakeup extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'celular',
        'email',
        'password'
   ];
}
