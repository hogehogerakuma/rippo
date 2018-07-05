<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = [
        'content', 'goal_1','goal_2', 'goal_3', 'result_1', 'result_2', 'result_3', 'user_id',
        ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
