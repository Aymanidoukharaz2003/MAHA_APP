        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href=""><img src="{{URL::asset('assets/images/Plan-de-travail-1.png')}}" alt=""></a>
                <a class="navbar-brand brand-logo-mini" href=""><img src="{{URL::asset('assets/images/Plan-de-travail-1.png')}}"
                        alt=""></a>
            </div>
            <!-- Top bar left -->
            
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>                   
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{URL::asset('assets/images/profile-avatar.jpg')}}" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">
                                        {{ auth()->user()->name }}</h5>
                                    <span>{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                       
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout1') }}"><i class="text-danger ti-unlock"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
