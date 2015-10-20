
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a href="/" class="navbar-brand"><img src="{{ url('img/logo2.png') }}" style="width: 52%;" alt="Hospital Record System"></a>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				<li>
					<a href="{{ url('dashboard') }}">Dashboard</a>
				</li>
				<li>
					<a href="{{ url('profile') }}">Profile</a>
				</li>
				<li>
					<a href="{{ url('reports') }}">Reports</a>
				</li>
			</ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li>{!! link_to('auth/login', trans('navs.login')) !!}</li>
                    <li>{!! link_to('auth/register', trans('navs.register')) !!}</li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>{!! link_to('dashboard', trans('navs.dashboard')) !!}</li>
                            <li>{!! link_to('auth/password/change', trans('navs.change_password')) !!}</li>

                            @if (access()->can('view-backend'))
                                <li>{!! link_to_route('backend.dashboard', trans('navs.administration')) !!}</li>
                            @endif

                            <li>{!! link_to('auth/logout', trans('navs.logout')) !!}</li>
                        </ul>
                    </li>
                @endif
            </ul>

		</div>
	</div>
</div>