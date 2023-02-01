<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepemilikan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function datadiri()
    {
        return $this->belongsTo(Datadiri::class);
    }
}
