@extends('layouts.app')

@section('content')

<aside class="col-xs-4">
    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->username }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->username, 50) }}" alt="">
                </div>
            </div>
    <div>
     <h4>Thoughts on Today</h4>
                <p style="text-indent: 3em;">→{!! nl2br(e($report->content)) !!}</p>
                <h4>Goal of Today1</h4>
                <p style="text-indent: 3em;">→{!! nl2br(e($report->goal_1)) !!}</p>
                <p style="text-indent: 3em;">→{!! nl2br(e($report->result_1)) !!}</p>
                
                <!--空欄の要素を表示しないif-->
                @if (count($report->goal_2) != 0) {
                <h4>Goal of Today2</h4>
                <p style="text-indent: 3em;">→{!! nl2br(e($report->goal_2)) !!}</p>
                <p style="text-indent: 3em;">→{!! nl2br(e($report->result_2)) !!}</p>
                }
                @endif
                
                @if (count($report->goal_3) != 0) {
                <h4>Goal of Today3</h4>
                <p style="text-indent: 3em;">→{!! nl2br(e($report->goal_3)) !!}</p>
                <p style="text-indent: 3em;">→{!! nl2br(e($report->result_3)) !!}</p>
                }
                @endif
                
                <h4>Goal of Tomorrow1</h4>
                <p style="text-indent: 3em;">→{!! nl2br(e($report->object_1)) !!}</p>
                
                @if (count($report->object_2) != 0) {
                <h4>Goal of Tomorrow2</h4>
                <p style="text-indent: 3em;">→{!! nl2br(e($report->object_2)) !!}</p>
                }
                @endif
                
                @if (count($report->object_3) != 0) {
                <h4>Goal of Tomorrow3</h4>
                <p style="text-indent: 3em;">→{!! nl2br(e($report->object_3)) !!}</p>
                }
                @endif
    </div>
                @include('comments.create', ['report' => $report])
                <h2>Replies</h2>
                @include('comments.comments', ['comments' =>$comments])
</aside>

@endsection        