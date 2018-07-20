<style>
@import url('https://fonts.googleapis.com/css?family=Caveat%7CDancing+Script%7CGaegu%7CGreat+Vibes%7CLobster+Two');
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
        // ->where('reports.user_id', $user->id)
        // ->select('users.username')
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

   if (count($favoriters) == 1){
       $like = "like";
   }else{
       $like = "likes";
   }

   if(count($favoriters)>0) {
       $goukei = " ".$favorited." ".$like."  "."on Daily Report";
    }
    else{
        $goukei = "";
    }
    
    $numfeedtoday = DB::table('comments')
        ->join('reports', 'reports.id', '=', 'comments.report_id')
        ->whereDay('reports.created_at', $now_date)
        ->where('reports.user_id', $user->id)
        ->count();
      
     if ($numfeedtoday == 1){
       $comment = "comment";
   }else{
       $comment = "comments";
   }
   
    if ($numfeedtoday == 0 ){
        $goukeifeed = "";
    } else{
        $goukeifeed = $numfeedtoday." ".$comment;
    }
?>

<h2>


 <?php 
// if(false == empty($goukei) || false == empty($goukeifeed)){echo $user->username . ", ";}?>
 <?php print $goukei; 
// if(false == empty($goukei) && false == empty($goukeifeed)){echo " and ";}?>

<?php
if(false == empty($goukei) && false == empty($goukeifeed)){echo "on Daily Report!! ";}?>

<!--<?php print $goukeifeed; ?> -->
<!-- on your Daily Report !!-->

</h2>
</div>
