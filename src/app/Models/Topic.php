<?php

namespace App\Models;

use App\Models\Payload;
use App\Models\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function connection()
    {
        return $this->belongsTo(Connection::class);
    }

    public function payloads()
    {
        return $this->hasMany(Payload::class)->latest();
    }
}
