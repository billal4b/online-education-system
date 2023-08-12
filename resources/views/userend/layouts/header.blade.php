<div class="dashboard-sticky-nav">
    <div class="content-left pull-left">
        <h2><a href="{{ url('/') }}" target="_blank" class="white">IQSBD</a></h2>
    </div>
    <div class="content-right pull-right">
        <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <div class="profile-sec">
                    <div class="dash-image">
                        <img src="{{asset('public/images/profile')}}/{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}">
                    </div>
                    <div class="dash-content">
                        <h4>{{ Auth::user()->name }}</h4>
                        <span>{{ Auth::user()->is_admin == 1 ? 'Admin' : 'User' }}</span>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('user.profile') }}"><i class="sl sl-icon-user"></i> {{ __('Your Profile') }}</a></li>
                <li><a href="{{ route('user.password') }}"><i class="sl sl-icon-lock"></i>{{ __('Change Password') }}</a></li>                
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        <i class="sl sl-icon-power"></i>{{ __('Logout') }}
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>

</div>

