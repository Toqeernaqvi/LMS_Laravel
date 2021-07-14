<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->{{ $activePage = '', $activeButton = '' }}
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://toqeer.surge.sh/" class="simple-text">
                {{ __('LMS') }}
            </a>
        </div>
        <ul class="nav">
            {{-- Dashboard --}}
            <li class="nav-item @if ($activePage=='dashboard' ) active @endif">
                <a class="nav-link" href="{{ route('customerDashboard') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            {{-- Profile --}}
            <li class="nav-item @if ($activePage=='profile' ) active @endif">
                <a class="nav-link" >
                    {{-- href="{{ route('profile') }}" --}}
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __('Profile') }}</p>
                </a>
            </li>

            {{-- Rewards --}}
            <li class="nav-item @if ($activePage=='rewards' ) active @endif">
                <a class="nav-link" >
                    {{-- href="{{ route('rewards') }}" --}}
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __('rewards') }}</p>
                </a>
            </li>

            {{-- Transactions --}}
            <li class="nav-item @if ($activePage=='transaction' ) active @endif">
                <a class="nav-link" >
                    {{-- href="{{ route('transaction') }}" --}}
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __('Transactions history') }}</p>
                </a>
            </li>


        </ul>
    </div>
</div>