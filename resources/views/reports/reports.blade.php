<ul class="media-list">
@foreach ($reports as $report)
    <?php $user = $report->user; ?>
    <li class="media">
        <div class="media-left" style= "padding-top:20px;">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->username, 50) }}" alt="">
        </div>
        <div class="media-body" style = "padding-top: 20px; padding-bottom:20px;">
            <div>
                {!! link_to_route('users.show', $user->username, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $report->created_at }}</span>
            </div>
            <div>
                <h4 style = "color:black; text-align:right; padding-right:50px;"><b>Thoughts on Today</b></h4>
                <p style= "color:black;">{!! nl2br(e($report->content)) !!}</p>
                <br>
                <h4 style = "color:black;"><b>Goal of Today1</b></h4>
                <p style="color:black;">>>{!! nl2br(e($report->goal_1)) !!}</p>
                <p style="color:red;">→{!! nl2br(e($report->result_1)) !!}%</p>
                
                <!--空欄の要素は表示しない-->
                @if (count($report->goal_2) != 0) 
                    <h4 style= "color:black;" ><b>Goal of Today2</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->goal_2)) !!}</p>
                    <p style="color:red;">→{!! nl2br(e($report->result_2)) !!}%</p>
                
                @endif
                
                @if (count($report->goal_3) != 0) 
                    <h4 style="color:black;"><b>Goal of Today3</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->goal_3)) !!}</p>
                    <p style="color:red;">→{!! nl2br(e($report->result_3)) !!}%</p>
                
                @endif
                
                <br>
                <h4 style="color:black;"><b>Goal of Tomorrow1</b></h4>
                <p style="color:black;">>>{!! nl2br(e($report->object_1)) !!}</p>
                
                @if (count($report->object_2) != 0) 
                    <h4 style = "color:black;"><b>Goal of Tomorrow2</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->object_2)) !!}</p>
                
                @endif
                
                @if (count($report->object_3) != 0) 
                    <h4 style="color:black;"><b>Goal of Tomorrow3</b></h4>
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
                    {!! link_to_route('reports.show', 'この日報を読む', ['id' => $report->id]) !!} 
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $reports->render() !!}