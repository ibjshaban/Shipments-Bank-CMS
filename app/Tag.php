<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_name'];


    public function page()
    {
        return $this->belongsToMany(Page::class);
    }
}
