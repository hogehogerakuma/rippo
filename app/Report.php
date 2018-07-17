<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'content', 'goal_1', 'result_1', 'goal_2', 'result_2', 'goal_3', 'result_3', 'object_1', 'object_2', 'object_3', 'user_id',
        ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments() {
       
       return $this->hasMany(Comment::class);
    }
     
    public function favorited() {
        
        return $this->belongsToMany(User::class, 'user_favorite', 'user_id', 'report_id')->withTimestamps();
    }
}