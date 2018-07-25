
@if (count($users) > 0)

<ul class="media-list">
@foreach ($users as $user)
<li class="container col-lg-9 col-md-19 col-sm-12 col-xs-12">
<div class="panel panel-default col-lg-9 col-md-9 col-sm-12 col-xs-12" style=" font-family: 'Lobster Two', cursive; color:black; padding-top:20px; padding-bottom:20px;"> 
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->username, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {{ $user->username }}
            </div>
            <div>
                <p style="font-family: 'Lobster Two', cursive;">{!! link_to_route('reports.reports', 'View profile', ['id' => $user->id]) !!}</p>
            </div>
        </div>
    </div>
  </li>
@endforeach
</ul>
{!! $users->render() !!}
@endif