<h1>
<?php
            date_default_timezone_set('Asia/Tokyo');
            $now_month =  (int)date("m");
            $now_date = (int)date("j");
 
 $favorited = DB::table('user_favorite')->join('reports', 'reports.id', '=', 'user_favorite.report_id')->whereDay('reports.created_at', $now_date)->where( 'reports.user_id', $user->id )->count();

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
   print 'あなたの今日の日報は' . $favorited .'つ、' .$fav_label.'さんからいいね！されています' 

?>
</h1>