<header>

<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu%7CLobster%7CLobster+Two%7CMerienda');
@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');

</style>
@if (Auth::check())
<nav class="navbar navbar-inverse navbar-static-top" style="height:80px; height:60px; background-color: transparent; width:100%; font-family: 'Roboto Condensed', sans-serif;">
@else
<nav class="navbar navbar-inverse navbar-static-top" style="height:80px; height:60px; width:100%; font-family: 'Roboto Condensed', sans-serif;">
@endif
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" style= "font-family: 'Lobster', cursive;">Rippo<span class="glyphicon glyphicon-pencil"></span></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li><a href='{{route('home')}}'><span class = "glyphicon glyphicon-home"></span> HOME</a></li>
                        <li><a href='{{route('reports.create')}}'><span class = "glyphicon glyphicon-pencil"></span> POST</a></li>
                        <li><a href='{{route('commons.calendar', ['id' => Auth::user()->id])}}'><span class = "glyphicon glyphicon-calendar" aria-hidden="true"></span> CALENDAR</a></li>
                        <li><a href='{{route('users.index',['id' => Auth::user()->id])}}'><span class = "glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> ANALYTICS</a></li>
                        <li><a href='{{route('users.followings',['id' => Auth::user()->id])}}'><span class = "glyphicon glyphicon-check" aria-hidden="true"></span> Following/Follower</a></li>
                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }} <span class="glyphicon glyphicon-user" aria-hidden="true""></span></a>
                            <ul class="dropdown-menu">
                                <li>{!! link_to_route('reports.reports', 'My profile', ['id' => Auth::id()]) !!}</li>
                                <li role="separator" class="divider"></li>
                                <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
                            </ul>
                        </li>
                    @else
                        <li style= "font-family: 'Roboto Condensed', sans-serif;"><a href='{{route('signup.get')}}'><span class = "glyphicon glyphicon-globe" aria-hidden="true" ></span> Sign Up</a></li>
                        <li style= "font-family: 'Roboto Condensed', sans-serif;"><a href='{{route('login')}}'><span class = "glyphicon glyphicon-log-in" aria-hidden="true"></span> Log In</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>