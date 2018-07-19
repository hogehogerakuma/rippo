
<style>
@import url('https://fonts.googleapis.com/css?family=Caveat|Dancing+Script|Gaegu|Great+Vibes|Lobster+Two');
</style>
<div class style="font-family: 'Merienda', cursive;">

<?php
            date_default_timezone_set('Asia/Tokyo');
            $now_month =  (int)date("m");
            $now_date = (int)date("j");
 
 $favorited = DB::table('user_favorite')->join('reports', 'reports.id', '=', 'user_favorite.report_id')->whereDay('reports.created_at', $now_date)->where( 'reports.user_id', $user->id )->count();

$popopo = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->where('user_id', $user->id)->get();
        
        if (isset ($popopo) && count($popopo)>0 ) {

            $dashitaka = 'Your Daily Report was already submitted';
        }
        
        else {
            $dashitaka =  'Please submit your Daily Report';
        }
        
     
$favoriters = DB::table('user_favorite')
        ->join('reports', 'reports.id', '=', 'user_favorite.report_id')
        ->join('users', 'users.id', '=', 'user_favorite.user_id')
        ->whereDay('reports.created_at' , $now_date)
        ->where('reports.user_id', $user->id)
        ->select('users.username')
        ->get();
      $fav_label = '';
      foreach($favoriters as $f) {
          if($f !== end($favoriters)){
        $fav_label .= $f->username.", ";
      }
      else{
          $fav_label .= $f->username .", ";
      }
    }
    if(count($favoriters)>0) {
        $fav_label = substr( $fav_label,0,strlen( $fav_label)-2);
    }

   if(count($favoriters)>0) {
       $goukei = $user->username.", You got ".$favorited." likes on your Daily Report ";
    }
    else{
        $goukei = "";
    }
?>

<h2><?php print $goukei; ?></h2>

</div>


