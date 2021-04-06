<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('dashboard-assets/dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            {{-- <a href="index.html" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a> --}}
            <a href="{{ route('dashboard') }}" class="side-menu"
                                            @if (Request::is('*/dashboard'))
                                            side-menu--active
                                            @endif
            >
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        @if (Auth::guard('admin')->user()->can('role.view'))
            <li>
                <a href="javascript:;" class="side-menu 
                                            @if (Request::is('dashboard/roles*'))
                                            side-menu--active
                                            @endif
                                            ">
                    <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award mx-auto"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg> </div>
                    <div class="side-menu__title"> Roles <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{ route('dashboard') }}/roles" class="side-menu">
                            <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list mx-auto"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg> </div>
                            <div class="side-menu__title"> View Roles </div>
                        </a>
                    </li>
                    @if (Auth::guard('admin')->user()->can('role.create'))
                    <li>
                        <a href="{{ route('dashboard.roles.create') }}" class="side-menu">
                            <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> </div>
                            <div class="side-menu__title"> Create Role </div>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (Auth::guard('admin')->user()->can('user.view'))
        <li>
            <a href="javascript:;" class="side-menu 
                                        @if (Request::is('dashboard/users*'))
                                        side-menu--active
                                        @endif
                                        ">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users mx-auto"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> </div>
                <div class="side-menu__title"> Users <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('dashboard') }}/users" class="side-menu">
                        <div class="side-menu__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list mx-auto"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>    
                        </div>
                        <div class="side-menu__title"> View Users </div>
                    </a>
                </li>
                @if (Auth::guard('admin')->user()->can('user.create'))
                <li>
                    <a href="{{ route('dashboard.users.create') }}" class="side-menu">
                        <div class="side-menu__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </div>
                        <div class="side-menu__title"> Create User </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if (Auth::guard('admin')->user()->can('admin.view'))
        <li>
            <a href="javascript:;" class="side-menu 
                                        @if (Request::is('dashboard/admins*'))
                                        side-menu--active
                                        @endif
                                        ">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users mx-auto"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> </div>
                <div class="side-menu__title"> Admins <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('dashboard') }}/admins" class="side-menu">
                        <div class="side-menu__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list mx-auto"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>    
                        </div>
                        <div class="side-menu__title"> Admins List </div>
                    </a>
                </li>
                @if (Auth::guard('admin')->user()->can('user.create'))
                <li>
                    <a href="{{ route('dashboard.admins.create') }}" class="side-menu">
                        <div class="side-menu__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </div>
                        <div class="side-menu__title"> Create Admin </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        {{-- <li>
            <a href="side-menu-inbox.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Inbox </div>
            </a>
        </li>
        <li>
            <a href="side-menu-file-manager.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="side-menu__title"> File Manager </div>
            </a>
        </li>
        <li>
            <a href="side-menu-point-of-sale.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                <div class="side-menu__title"> Point of Sale </div>
            </a>
        </li>
        <li>
            <a href="side-menu-chat.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                <div class="side-menu__title"> Chat </div>
            </a>
        </li>
        <li>
            <a href="side-menu-post.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Post </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                <div class="side-menu__title"> Crud <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-crud-data-list.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Data List </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-crud-form.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Form </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Users <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-users-layout-1.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Layout 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-users-layout-2.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Layout 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-users-layout-3.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Layout 3 </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                <div class="side-menu__title"> Profile <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-profile-overview-1.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Overview 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-profile-overview-2.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Overview 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-profile-overview-3.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Overview 3 </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="layout"></i> </div>
                <div class="side-menu__title"> Pages <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Wizards <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-wizard-layout-1.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-wizard-layout-2.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-wizard-layout-3.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Blog <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-blog-layout-1.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-blog-layout-2.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-blog-layout-3.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Pricing <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-pricing-layout-1.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-pricing-layout-2.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 2</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Invoice <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-invoice-layout-1.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-invoice-layout-2.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 2</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> FAQ <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-faq-layout-1.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-faq-layout-2.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-faq-layout-3.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="login-login.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Login </div>
                    </a>
                </li>
                <li>
                    <a href="login-register.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Register </div>
                    </a>
                </li>
                <li>
                    <a href="main-error-page.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Error Page </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-update-profile.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Update profile </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-change-password.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Change Password </div>
                    </a>
                </li>
            </ul>
        </li> --}}
        
        <li class="side-nav__devider my-6"></li>
        {{-- <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Components <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Grid <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-regular-table.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Regular Table</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-datatable.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="side-menu__title">Datatable</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="side-menu-accordion.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Accordion </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-button.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Button </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-modal.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Modal </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-alert.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Alert </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-progress-bar.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Progress Bar </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-tooltip.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tooltip </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-dropdown.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Dropdown </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-toast.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Toast </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-typography.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Typography </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-icon.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Icon </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-loading-icon.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Loading Icon </div>
                    </a>
                </li>
            </ul>
        </li> --}}
        {{-- <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="sidebar"></i> </div>
                <div class="side-menu__title"> Forms <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-regular-form.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Regular Form </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-datepicker.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Datepicker </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-select2.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Select2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-file-upload.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> File Upload </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-wysiwyg-editor.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Wysiwyg Editor </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-validation.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Validation </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="side-menu__title"> Widgets <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-chart.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Chart </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-slider.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Slider </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-image-zoom.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Image Zoom </div>
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul>
</nav>