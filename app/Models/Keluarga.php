<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'pasangans';

    public function datadiri()
    {
        return $this->belongsTo(Datadiri::class);
    }
}
