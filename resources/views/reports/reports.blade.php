<style>
@import url('https://fonts.googleapis.com/css?...');
</style>

<ul class="media-list" style= "font-family: 'Roboto Condensed', sans-serif;">
@foreach ($reports as $report)
    <?php $user = $report->user; ?>
    <div class="gon" style="border: 2px solid grey; border-radius: 10px; margin:10px; padding:10px; font-family: 'font-family: 'Vast Shadow', cursive;">
    <li class="media">
        <div class="media-left" style= "font-family: 'Roboto Condensed', sans-serif;">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->username, 50) }}" alt="">
        </div>
        <div class="media-body" style="padding-top: 10px; padding-bottom:20px;">
            <div>
                {!! link_to_route('reports.reports', $user->username, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $report->created_at }}</span>
            </div>
            <div>
                <h4 style = "color:black; text-decoration : underline;"><b>Thoughts on Today</b></h4>
                <p style= "color:black; ">{!! nl2br(e($report->content)) !!}</p>
                <br>
                <h4 style = "color:black; text-decoration : underline;"><b>1. GOAL</b></h4>
                <p style="color:black;">>>{!! nl2br(e($report->goal_1)) !!}</p>
                <p style="color:red;">→{!! nl2br(e($report->result_1)) !!}%</p>
                
                <!--空欄の要素は表示しない-->
                @if (isset($report->goal_2)) 
                    <h4 style= "color:black; text-decoration : underline;" ><b>2. GOAL</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->goal_2)) !!}</p>
                    <p style="color:red;">→{!! nl2br(e($report->result_2)) !!}%</p>
                
                @endif
                
                @if (isset($report->goal_3)) 
                    <h4 style="color:black; text-decoration : underline;"><b>3. GOAL</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->goal_3)) !!}</p>
                    <p style="color:red;">→{!! nl2br(e($report->result_3)) !!}%</p>
                
                @endif
                
                <br>
                <h4 style="color:black; text-decoration : underline;"><b>1. SMART GOAL</b></h4>
                <p style="color:black;">>>{!! nl2br(e($report->object_1)) !!}</p>
                
                @if (isset($report->object_2)) 
                    <h4 style = "color:black; text-decoration : underline;"><b>2. SMART GOAL</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->object_2)) !!}</p>
                
                @endif
                
                @if (isset($report->object_3)) 
                    <h4 style="color:black; text-decoration : underline;"><b>3. SMART GOAL</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->object_3)) !!}</p>
                    <br>                
                @endif
            </div>
            <div>
                @if (Auth::id() == $report->user_id)
                    {!! Form::open(['route' => ['reports.destroy', $report->id], 'method' => 'delete', 'style'=>'display:inline-block;']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
                @include('user_favorite.favorite_button', ['report' => $report])
                <a href="{{route('reports.show', ['id' => $report->id])}}" class="btn btn-success btn- btn-xs" role="button">Show Report</a>
                
                <div style="color: black">
                    {!! link_to_route('reports.favoriters', 'いいね　'.$report->favCnt. '件', ['id' => $report->id, 'user' => $user, 'report' => $report]) !!}
                </div>
            </div>
        </div>
    </div>
    </li>
    <hr>
@endforeach

</ul>

{!! $reports->render() !!}