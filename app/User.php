<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Report;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId) {
    
    $exist = $this->is_following($userId);
    
    $its_me = $this->id ==$userId;
    
    if ($exist || $its_me) {
        
        return false;
    } else {
        
        $this->followings()->attach($userId);
        return true;
    }
}
    public function unfollow($userId)
    {
        
        $exist = $this->is_following($userId);
        
        $its_me = $this->id == $userId;
        
        
        if ($exist && !$its_me) {
            
            $this->followings()->detach($userId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_following($userId) {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function feed_reports()
    {
        $reports = Report::all();
       
    }

    public function favorites()
    {
        return $this->belongsToMany(
         Report::class,
         'user_favorite', 
         'user_id',
         'report_id')->withTimestamps();
    }
        
    public function favorite($reportsId)
    {
        $exist = $this->is_favoriting($reportsId);
        if ($exist) {
            return false;
        }else {
            $this->favorites()->attach($reportsId);
            return true;
        }
    }

    public function unfavorite($reportsId)
    {
        $exist = $this->is_favoriting($reportsId);
        if($exist) {
            $this->favorites()->detach($reportsId);
            return true;
        } else {
            return false;
        }
    }

    public function is_favoriting($reportsId) {
        return $this->favorites()->where('report_id', $reportsId)->exists();
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function comment() {
        $this->comments()->attach($reportsId);
        return true;
    }
    
    public function favoriters()
    {
        return $this->belongsToMany(
        Report::class,
        'user_favorite', 
        'user_id',
        'report_id')->withTimestamps();
    }
}