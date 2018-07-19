@extends('layouts.app')

@section('content')
<<<<<<< HEAD
    @foreach($favoriters as $favoriter)
    <div class="row">
        <div class="col-xs-8">
            <?php echo $favoriter; ?>
        </div>
    </div>
    @endforeach
=======
    
<h3>いいねしてくれた人</h3>


@if (count($favoriters) > 0)

<ul class="media-list">
@foreach ($favoriters as $favoriter)
<li class="container col-lg-9 col-md-19 col-sm-12 col-xs-12">
<div class="panel panel-default col-lg-9 col-md-9 col-sm-12 col-xs-12" style="color:black; padding-top:20px; padding-bottom:20px;"> 
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($favoriter->username, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {{ $favoriter->username }}
            </div>
            <div>
                <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
            </div>
        </div>
    </div>
  </li>
@endforeach
</ul>
@endif

>>>>>>> e49dd6921e019f2e5c4037631192b56963a664bf
@endsection