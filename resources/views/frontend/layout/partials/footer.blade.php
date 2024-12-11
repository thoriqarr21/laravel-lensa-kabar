<div class="footer-top-area">
    <div class="container">
        <div class="footer-top">
            <div class="footer-column" style="text-align: center">  
                <div class="logo">
                    <a href="{{ route('home') }}">
                        @if(isset($headersettings) && $headersettings['site_logo'])
                            <img src="{{ asset('images/'.$headersettings['site_logo']) }}" alt="Logo" style="width: 50%">
                        @else
                            <img src="{{ asset('images/logo.png') }}" alt="Default Logo">
                        @endif
                    </a>
                </div>
                {{-- <p>Address</p> --}}
                @if(isset($headersettings) && $headersettings['about_us'])
                {!! $headersettings['address'] !!}
                @endif 
                <div style="color: black; font-weight: 600; padding-bottom: 7px; padding-top: 20px">Connect With Us</div>
                <div class="social-media">
                    @if(isset($headersettings) && $headersettings['facebook'])
                        <a href="{{ $headersettings['facebook'] }}">
                        <i class="fab fa-facebook" style="color: #1877F2"></i>
                        </a>
                    @endif
                    @if(isset($headersettings) && $headersettings['twitter'])
                        <a href="{{ $headersettings['twitter'] }}">
                        <i class="fab fa-twitter" style="color: #1DA1F2"></i>
                        </a>
                    @endif
                    @if(isset($headersettings) && $headersettings['linkedin'])
                        <a href="{{ $headersettings['linkedin'] }}">
                        <i class="fab fa-linkedin" style="color: #0A66C2"></i>
                        </a>
                    @endif
                    @if(isset($headersettings) && $headersettings['vimeo'])
                        <a href="{{ $headersettings['vimeo'] }}">
                        <i class="fab fa-vimeo" style="color: #19b7ea"></i>
                        </a>
                    @endif
                    @if(isset($headersettings) && $headersettings['youtube'])
                        <a href="{{ $headersettings['youtube'] }}">
                        <i class="fab fa-youtube" style="color: #CD201F"></i>
                        </a>
                    @endif
                    <div class="contact-info">
                        @if(isset($headersettings) && $headersettings['phone'])
                            <div class="contact-item"> {!! $headersettings['phone'] !!}</div>
                        @endif
                        @if(isset($headersettings) && $headersettings['email'])
                            <div class="contact-item">{!! $headersettings['email'] !!}</div>
                        @endif
                    </div>

                </div>
            </div>

            <div class="footer-column" style="margin-top: 20px">
                <h2 style="margin-left: 8px">Categories</h2>
                <div class="footer-column-news">
                @foreach($footernewscategorylist as $newscategory)
                    <div class="section-item news-category-list">
                        <h3>
                            {{-- <i class="far fa-arrow-alt-circle-right"></i> --}}
                            <a href="{{ route('page.category',$newscategory->slug) }}">{{ $newscategory->name }}</a>
                            {{-- <span>({{ $newscategory->newslist_count }})</span> --}}
                        </h3>
                    </div>
                @endforeach
            </div>
            </div>
            <div class="footer-column" style="margin-top: 20px">
                <h2>About Us</h2>
                @if(isset($headersettings) && $headersettings['about_us'])
                    {!! $headersettings['about_us'] !!}
                @endif       
                <div style="text-align: center">
                    
                </div>
            </div>
         </div>
    </div>
</div>
<div class="footer-bottom-area">
    <div class="container">
        <div class="footer-bottom">
            <p>Copyright &copy; 2024 <strong style="color: black">LensaKabar</strong>, All right reserved.</p>
        </div>
    </div>
</div>
