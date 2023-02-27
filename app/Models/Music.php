<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Music extends Model
{
    use HasFactory;
    public $table="musics";
    public $primaryKey="id";
    public $foreignKey='artist_id';

    function artist(){
        return $this->hasMany(Artist::class,'id','artist_id');
    }

}
