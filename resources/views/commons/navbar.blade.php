<header>
    <nav class="navbar navbar-inverse navbar-static-top" style="background:rgba(0,0,0,0.0);">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Rippo</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li><a href='{{route('home')}}'><span class = "glyphicon glyphicon-home"></span> HOME</a></li>
                        <li><a href='{{route('reports.create')}}'><span class = "glyphicon glyphicon-pencil"></span> POST</a></li>
                        <li><a href='{{route('commons.calendar', ['id' => Auth::user()->id])}}'><span class = "glyphicon glyphicon-calendar" aria-hidden="true"></span> CALENDAR</a></li>
                        <!--<li><a href='{{route('users.favoriters', ['id' => $user->id, 'thatday_date' => 1]) }}'><span class = "glyphicon glyphicon-heart" aria-hidden="true"></span> FEED</a></li>-->
                        <!--<li><a href='{{route('users.index')}}'><span class = "glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> RANKING</a></li>-->
                 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }} <span class="glyphicon glyphicon-user" aria-hidden="true""></span></a>
                            <ul class="dropdown-menu">
                                <li>{!! link_to_route('users.show', 'My profile', ['id' => Auth::id()]) !!}</li>
                                <li role="separator" class="divider"></li>
                                <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
                            </ul>
                        </li>
                    @else
                        <li><a href='{{route('signup.get')}}'><span class = "glyphicon glyphicon-globe" aria-hidden="true"></span> Sign UP</a></li>
                        <li><a href='{{route('login')}}'><span class = "glyphicon glyphicon-log-in" aria-hidden="true"></span> Log in</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>