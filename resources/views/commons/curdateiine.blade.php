<?php
            date_default_timezone_set('Asia/Tokyo');
            $now_month =  (int)date("m");
            $now_date = (int)date("j");
 
 $favorited = DB::table('user_favorite')->join('reports', 'reports.id', '=', 'user_favorite.report_id')->whereDay('reports.created_at', $now_date)->where( 'reports.user_id', $user->id )->count();


$popopo = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->where('user_id', $user->id)->get();
        
        if (isset ($popopo) && count($popopo)>0 ) {
            $dashitaka = '今日の日報は既に提出済みです。';
        }
        
        else {
            $dashitaka =  'まだ今日の日報を出していません。';
        }
?>        
<h1><?php print $user->username; ?>さんは<?php print $dashitaka; ?></h1>

<?php
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
       $goukei = $user->username."さんの今日の日報は".$fav_label."さんから合計".$favorited."ついいね！されています。";
    }
    else{
        $goukei = "";
    }
?>   



<h1><?php print $goukei; ?></h1>

        

