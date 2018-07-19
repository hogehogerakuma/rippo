<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
<<<<<<< HEAD
    //  public function favoriters() 
    //  {
    //      return $this->hasMany(User::class);
    //  }
=======
>>>>>>> e49dd6921e019f2e5c4037631192b56963a664bf
}