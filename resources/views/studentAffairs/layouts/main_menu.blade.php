<div data-active-color="black" data-background-color="man-of-steel" data-image="http://localhost/mnagy/ERP_school/public/admin/app-assets/img/sidebar-bg/03.jpg" class="app-sidebar  @if(app()->getLocale() == 'ar') text-right @endif">
    <!-- main menu header-->
    <!-- Sidebar Header starts-->
    <div class="sidebar-header">
        <div class="logo clearfix">
            <a href="index-2.html" class="logo-text float-left">
            <div class="logo-img"><img src="{{url('/')}}/admin/app-assets/img/logo-dark.png" /></div><span class="text align-middle">APEX</span></a>
            
            <a
                id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a>
        </div>
    </div>
    <!-- Sidebar Header Ends-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
                <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1">2</span></a>
                    <ul class="menu-content">
                        <li ><a href="dashboard1.html" class="menu-item">Dashboard1</a>
                        </li>
                        <li><a href="dashboard2.html" class="menu-item">Dashboard2</a>
                        </li>
                    </ul>
                </li>

                {{-- // admins --}}
                <li class="has-sub nav-item"><a href="#"><i class="ft-user"></i><span data-i18n="" class="menu-title">{{__('lang.admins')}}</span></a>
                    <ul class="menu-content">
                    <li><a href="{{route('admins.index')}}" class="menu-item">{{__('lang.admins')}}</a>
                        </li>
                    <li><a href="{{route('admins.create')}}" class="menu-item">{{__('lang.new_admin')}}</a>
                        </li>
                    </ul>
                </li>

                {{-- // stages --}}
                <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.stages')}}</span></a>
                    <ul class="menu-content">
                    <li><a href="{{route('stage.index')}}" class="menu-item">{{__('lang.stages')}}</a>
                        </li>
                    <li><a href="{{route('stage.create')}}" class="menu-item">{{__('lang.new_stage')}}</a>
                        </li>
                    </ul>
                </li>

                {{-- // levels --}}
                <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.levels')}}</span></a>
                    <ul class="menu-content">
                    <li><a href="{{route('level.index')}}" class="menu-item">{{__('lang.levels')}}</a>
                        </li>
                    <li><a href="{{route('level.create')}}" class="menu-item">{{__('lang.new_level')}}</a>
                        </li>
                    </ul>
                </li>

                {{-- // Classes --}}
                <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.classes')}}</span></a>
                    <ul class="menu-content">
                    <li><a href="{{route('class.index')}}" class="menu-item">{{__('lang.classes')}}</a>
                        </li>
                    <li><a href="{{route('class.create')}}" class="menu-item">{{__('lang.new_class')}}</a>
                        </li>
                    </ul>
                </li>

                {{-- // std_affairs --}}
            <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.std_affairs')}}</span></a>
                <ul class="menu-content">
                <li><a href="{{route('student.index')}}" class="menu-item">{{__('lang.stds')}}</a>
                    </li>
                <li><a href="{{route('student.create')}}" class="menu-item">{{__('lang.new_std')}}</a>
                    </li>
                </ul>
            </li>

                    {{-- // nationality --}}
                    <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.nationalities')}}</span></a>
                    <ul class="menu-content">
                    <li><a href="{{route('nationality.index')}}" class="menu-item">{{__('lang.nationalities')}}</a>
                        </li>
                    <li><a href="{{route('nationality.create')}}" class="menu-item">{{__('lang.new_nationality')}}</a>
                        </li>
                    </ul>
                </li>

                   {{-- // place --}}
                   <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.places')}}</span></a>
                    <ul class="menu-content">
                    <li><a href="{{route('place.index')}}" class="menu-item">{{__('lang.places')}}</a>
                        </li>
                    <li><a href="{{route('place.create')}}" class="menu-item">{{__('lang.new_place')}}</a>
                        </li>
                    </ul>
                </li>

                       {{-- // region --}}
            <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.regions')}}</span></a>
                <ul class="menu-content">
                <li><a href="{{route('region.index')}}" class="menu-item">{{__('lang.regions')}}</a>
                    </li>
                <li><a href="{{route('region.create')}}" class="menu-item">{{__('lang.new_region')}}</a>
                    </li>
                </ul>
            </li>

                            {{-- // academicyear --}}
                   <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.ac_years')}}</span></a>
                    <ul class="menu-content">
                    <li><a href="{{route('academicyear.index')}}" class="menu-item">{{__('lang.ac_years')}}</a>
                        </li>
                    <li><a href="{{route('academicyear.create')}}" class="menu-item">{{__('lang.new_ac_year')}}</a>
                        </li>
                    </ul>
                </li>

        
                       {{-- // setting --}}
            <li class=" nav-item"><a href="{{route('setting.edit',1)}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.setting')}}</span></a></li>
                
                                        {{-- // permissions --}}
                                        <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.permissions')}}</span></a>
                                            <ul class="menu-content">
                                            <li><a href="{{route('permission.index')}}" class="menu-item">{{__('lang.permissions')}}</a>
                                                </li>
                                            <li><a href="{{route('permission.create')}}" class="menu-item">{{__('lang.new_permission')}}</a>
                                                </li>
                                            </ul>

            </ul>
        </div>
    </div>
    <!-- main menu content-->
    <div class="sidebar-background"></div>
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
</div>