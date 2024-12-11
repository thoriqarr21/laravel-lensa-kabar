{{-- <div class="header-top-area">
    <div class="container">
    <div class="ads">
        @foreach ($headerads as $item)
            @if (request()->is('/') && $item->type == 'home')
                <img src="{{ asset('images/advertisements/'.$item->header_top) }}" alt="Ads" class="width-100">
                    @elseif ($item->type == 'category')
                    @if(request()->path() == 'page/category/'.$item->slug)
                        <img src="{{ asset('images/advertisements/'.$item->header_top) }}" alt="Ads" class="width-100">
                    @endif
                @endif                
            @endforeach
        </div>
    </div>
</div> --}}