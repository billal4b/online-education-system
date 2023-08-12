<div class="dashboard-nav">
    <div class="dashboard-nav-inner">
        <ul>
            <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="sl sl-icon-settings"></i>{{ __('Dashboard') }} </a></li>


            <li class="{{ Request::segment(2) == 'user' ? 'active' : '' | ( Request::segment(2) == 'admitted-user' ? 'active' : '') | ( Request::segment(2) == 'pledge-user' ? 'active' : '') }}">
                <a><i class="sl sl-icon-user"></i>{{ __('Users') }}<span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="{{ route('admin.user') }}">{{ __('Registered User') }}</a></li>
                    <li><a href="{{ route('admin.admitted.user') }}">{{ __('Admitted User') }}</a></li>
                    <li><a href="{{ route('admin.pledge.user') }}">{{ __('Pledge User') }}</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(2) == 'payment' ? 'active' : '' }}"><a href="{{ route('admin.payment') }}"><i class="sl sl-icon-basket"></i> Payment</a></li>
            <li class="{{ Request::segment(2) == 'today-class' ? 'active' : '' }}"><a href="{{ route('admin.todayclass') }}"><i class="sl sl-icon-graduation"></i>Today Class</a></li>
           

            <li class="{{ Request::segment(2) == 'image' ? 'active' : '' | ( Request::segment(2) == 'media' ? 'active' : '') | ( Request::segment(2) == 'audio' ? 'active' : '') | ( Request::segment(2) == 'pdf' ? 'active' : '') }}">
                <a><i class="sl sl-icon-camera"></i>{{ __('Media') }}<span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="{{ route('admin.audio') }}">{{ __('Audio') }}</a></li>
                    <li><a href="{{ route('admin.pdf') }}">{{ __('PDF') }}</a></li>
                    <li><a href="{{ route('admin.media') }}">{{ __('Video') }}</a></li>
                    <li><a href="{{ route('admin.image') }}">{{ __('Image') }}</a></li>
                </ul>
            </li>
          <li class="{{ Request::segment(2) == 'wordbook' ? 'active' : '' | ( Request::segment(2) == 'ebook' ? 'active' : '') | ( Request::segment(2) == 'arabic-dictionary' ? 'active' : '') | ( Request::segment(2) == 'question' ? 'active' : '') | ( Request::segment(2) == 'exam' ? 'active' : '') | ( Request::segment(2) == 'result' ? 'active' : '') }}">
                <a><i class="sl sl-icon-book-open"></i>{{ __('E-learn') }}<span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="{{ route('admin.ebook') }}">{{ __('E-book') }}</a></li>
                    <li><a href="{{ route('admin.wordbook') }}">{{ __('Dictionary') }}</a></li>
                    <li><a href="{{ route('admin.arabic-dictionary') }}">{{ __('Arabic Dictionary') }}</a></li>
                    <li><a href="{{ route('admin.question') }}">{{ __('Question') }}</a></li>
                    <li><a href="{{ route('admin.exam') }}">{{ __('Exam') }}</a></li>
                    <li><a href="{{ route('admin.result') }}">{{ __('Result') }}</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(2) == 'notice' ? 'active' : '' }}"><a href="{{ route('admin.notice') }}"><i class="sl sl-icon-bubbles"></i> Notice</a></li>

            <li class="{{ Request::segment(2) == 'blog' ? 'active' : '' }}"><a href="{{ route('admin.blog') }}"><i class="sl sl-icon-folder"></i> Blog</a></li>
            <li class="{{ Request::segment(2) == 'course' ? 'active' : '' | ( Request::segment(2) == 'course-details' ? 'active' : '') }}">
                <a><i class="sl sl-icon-layers"></i>{{ __('Courses') }}<span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="{{ route('admin.course') }}">{{ __('Course Name') }}</a></li>
                    <li><a href="{{ route('admin.course.details') }}">{{ __('Course Details') }}</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(2) == 'section' ? 'active' : '' | ( Request::segment(2) == 'content' ? 'active' : '') }}">
                <a><i class="sl sl-icon-list"></i>{{ __('Section') }}<span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="{{ route('admin.section') }}">{{ __('Page Section') }}</a></li>
                    <li><a href="{{ route('admin.content') }}">{{ __('Page Content') }}</a></li>
                </ul>
            </li>

            <li class="{{ Request::segment(2) == 'contact' ? 'active' : '' }}"><a href="{{ route('admin.contact') }}"><i class="sl sl-icon-phone"></i> Contact</a></li>
            <li class="{{ Request::segment(2) == 'backup' ? 'active' : '' }}"><a href="{{ route('admin.backup') }}"><i class="sl sl-icon-arrow-down-circle"></i> Backups</a></li>
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

