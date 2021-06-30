<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->{{$activePage = "" , $activeButton = ""}}
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://toqeer.surge.sh/" class="simple-text">
                {{ __("LMS") }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
            {{-- Location --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#location" @if($activeButton =='location') aria-expanded="true" @endif>
                    <i class="nc-icon nc-square-pin">
                        {{-- <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px"> --}}
                    </i>
                    <p>
                        {{ __('Location') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='country') show @endif" id="location">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'country') active @endif">
                            <a class="nav-link" href="{{url('/country')}}">
                              
                                <p>{{ __("Country") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'state') active @endif">
                           <a class="nav-link" href="{{url('/state')}}">  
                   
                                <p>{{ __("State") }}</p>
                            </a>
                        </li>

                        <li class="nav-item @if($activePage == 'city') active @endif">
                            <a class="nav-link" href="{{url('/city')}}">
                    
                                <p>{{ __("City") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'area') active @endif">
                            <a class="nav-link" href="{{url('/area')}}">
                         
                                <p>{{ __("Area") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


{{-- Users --}}

<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#users" @if($activeButton =='users') aria-expanded="true" @endif>
        <i class="nc-icon nc-single-02">
            {{-- <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px"> --}}
        </i>
        <p>
            {{ __('Users') }}
            <b class="caret"></b>
        </p>
    </a>
    <div class="collapse @if($activeButton =='ManageUsers') show @endif" id="users">
        <ul class="nav">
            <li class="nav-item @if($activePage == 'user') active @endif">
                <a class="nav-link" href="{{route('userInfo.index')}}">
                     <p>{{ __("Manage Users") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'accounts') active @endif">
                <a class="nav-link" href="{{route('account.index')}}">
                     <p>{{ __("Account Type") }}</p>
                </a>
            </li>

     
        </ul>
    </div>
</li>


{{--Manage Organization--}}

<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#organization" @if($activeButton =='organization') aria-expanded="true" @endif>
        <i class="nc-icon nc-bank">
            {{-- <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px"> --}}
        </i>
        <p>
            {{ __('Organizations') }}
            <b class="caret"></b>
        </p>
    </a>

       <div class="collapse @if($activeButton =='organization') show @endif" id="organization">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'organization') active @endif">
                            <a class="nav-link" href="{{url('/organization')}}">
                              
                                <p>{{ __("Organization") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'branch') active @endif">
                           <a class="nav-link" href="{{url('/branch')}}">  
                   
                                <p>{{ __("Branch") }}</p>
                            </a>
                        </li>

                    
                    </ul>
                </div>
</li>


<li class="nav-item @if($activePage == 'cards') active @endif">
    <a class="nav-link" href="{{url('/card')}}">  
        <i class="nc-icon nc-notes"></i>
        <p>{{ __("Cards") }}</p>
    </a>
</li>

<li class="nav-item @if($activePage == 'transactions') active @endif">
    <a class="nav-link" href="{{url('/transaction')}}">
        <i class="nc-icon nc-paper-2"></i>
        <p>{{ __("Add Transactions") }}</p>
    </a>
</li>
{{-- 
           
            <li class="nav-item @if($activePage == 'typography') active @endif">
                <a class="nav-link" href="{{route('page.index', 'typography')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Points Management") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'icons') active @endif">
                <a class="nav-link" href="{{route('page.index', 'icons')}}">
                    <i class="nc-icon nc-atom"></i>
                    <p>{{ __("Manage Coupon") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'maps') active @endif">
                <a class="nav-link" href="{{route('page.index', 'maps')}}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __("Rewards") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'notifications') active @endif">
                <a class="nav-link" href="{{route('page.index', 'notifications')}}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __("Transactions") }}</p>
                </a>
            </li>
          --}}
        </ul>
    </div>
</div>
