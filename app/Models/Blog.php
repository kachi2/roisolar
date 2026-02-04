<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Blog extends Model
{
    use HasFactory;

protected $appends = ['hashid'];

public function getHashidAttribute()
{
    return Hashids::encode($this->id);
}

    protected $fillable = ['title', 'views', 'content', 'image'];
    protected $table = "blogs";
}
