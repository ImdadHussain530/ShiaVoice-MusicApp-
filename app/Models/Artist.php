<?php

namespace App\Models;
use App\Models\Music;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    public $table='artists';
    public function music()
    {
        return $this->belongsTo(Music::class);
    }
}
