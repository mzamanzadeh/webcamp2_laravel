<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','summary',
        'publish','slug',
        'full_text','photo'
        ];

//    protected $hidden=['visit_count'];

    public function incVisitCount()
    {
        $this->visit_count++;
        $this->save();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
