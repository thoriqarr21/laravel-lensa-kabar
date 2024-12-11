<div class="header-menu-container">
    <div class="container">
        <div class="header-logo">
            {{-- <div class="logo">
                <a href="{{ route('home') }}">
                    @if(isset($headersettings) && $headersettings['site_logo'])
                        <img src="{{ asset('images/'.$headersettings['site_logo']) }}" alt="Logo">
                    @elseif(isset($headersettings) && $headersettings['site_name'])
                        {{ $headersettings['site_name'] }}
                    @else
                        LENSA KABAR
                    @endif
                </a>
            </div> --}}
            <div class="logo">
                <a href="{{ route('home') }}">
                    @if(isset($headersettings) && $headersettings['site_logo'])
                        <img src="{{ asset('images/'.$headersettings['site_logo']) }}" alt="Logo">
                    @else
                        <img src="{{ asset('images/logo.png') }}" alt="Default Logo">
                    @endif
                </a>
            </div>
            
            <div class="search">
                <form action="{{ route('page.search') }}" method="GET">
                    <input id="searchinput" type="text" name="search" placeholder="SEARCH">
                    <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <nav>
                <ul>
                    @guest
                        <li><a href="{{ route('register') }}" class="nav-link"><i class="fas fa-user-plus"></i> <span>Register</span></a></li>
                        <li class="masuk"><a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i> <span>Sign in</span></a></li>
                    @else
                        <li><a href="{{ route('profile') }}" class="nav-link"><i class="fas fa-user-alt"></i> <span>{{ auth()->user()->name }}</span></a></li>
                        <li><a href="{{ route('login') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form-front').submit();"><i class="fas fa-sign-in-alt"></i> <span>Logout</span></a></li>
                        <form id="logout-form-front" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </nav>
            
        </div>
    </div>
    <div class="header-menu">
        <div class="scrollable-tabs-container">
            {{-- <span class="nav-arrow left">&#9664;</span> <!-- Left navigation arrow --> --}}
            <nav>
                <ul>
                    @foreach($newscategory_list as $newscategory)
                    <li><a href="{{ route('page.category', $newscategory->slug) }}">{{ $newscategory->name }}</a></li>
                    @endforeach
                </ul>
            </nav>
            {{-- <span class="nav-arrow right">&#9654;</span> <!-- Right navigation arrow --> --}}
        </div>
    </div>
</div>


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const navs = document.querySelector('.header-menu scrollable-tabs-container nav ul');

    // Function to remove active class from all tabs
    const navs = document.querySelectorAll(".header-menu .scrollable-tabs-container a");


    // Scroll functionality
    rightArrow.addEventListener('click', function () {
        nav.scrollBy({ left: 100, behavior: 'smooth' });
    });

    leftArrow.addEventListener('click', function () {
        nav.scrollBy({ left: -100, behavior: 'smooth' });
    });

    // Show/hide arrows based on scroll position
    function updateArrows() {
        if (nav.scrollLeft === 0) {
            leftArrow.style.display = 'none';
        } else {
            leftArrow.style.display = 'flex';
        }

        if (nav.scrollWidth - nav.clientWidth === nav.scrollLeft) {
            rightArrow.style.display = 'none';
        } else {
            rightArrow.style.display = 'flex';
        }
    }

    nav.addEventListener('scroll', updateArrows);
    window.addEventListener('resize', updateArrows);
    
    // Initialize the arrows
    updateArrows();
    
});



</script>
@endpush
