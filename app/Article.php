<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Article extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table='article';
    public $timestamps=false;
    protected $fillable = [
        'title', 'content'
    ];
}
