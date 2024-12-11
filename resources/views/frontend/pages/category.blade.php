@extends('frontend.layout.master')

@section('title', 'Category Page')

@section('content')

    <section class="section">
        <div class="page-header container">
            <h1>Category: {{ $category->name }}</h1>
            <ul>
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                <li> / </li>
                <li><i class="far fa-folder"></i> {{ $category->name }}</li>
            </ul>
        </div>
        <div class="ads">
            @foreach ($headerads as $item)
                    <img src="{{ asset('images/advertisements/'.$item->header_top) }}" alt="Ads" class="width-100">               
            @endforeach
        </div>
    </section>

    <section class="section">
        <div class="section-grid container">
            @foreach($featurednewslist as $key => $featurednews)
            <div class="section-item">
                <div class="image-container">
                    <img src="{{ asset('images/' . $featurednews->image) }}" alt="{{ $featurednews->title }}" class="width-100">
                    <div class="title-overlay">
                        <a href="{{ route('page.category',$featurednews->category->slug) }}" class="title-category">{{ @$featurednews->category->name }} </a>
                        <a href="{{ route('page.news',$featurednews->slug) }}" class="title-overlay-title">{{ $featurednews->title }}</a>
                    </div>
                </div>
            </div>
            @endforeach            
        </div>
    </section>

    <section class="section">

        <div class="section-news container">
             
            <div class="news">

                @if ($advertisements && $advertisements->body_middle)
                    <img src="{{ asset('images/advertisements/'.$advertisements->body_middle) }}" alt="Ads" class="width-100">
                @endif

                {{-- <div class="news-category-container">
                    <div class="news-technology">
                        @foreach($newscategorylist as $newscategory)
                            <div class="section-item">
                                <a href="{{ route('page.news',$newscategory->slug) }}">
                                    <img src="{{ asset('images/'.$newscategory->image) }}" alt="{{ $newscategory->title }}" class="width-100">
                                </a>
                                
                                <h3><a href="{{ route('page.news',$newscategory->slug) }}">{{ $newscategory->title }}</a></h3>

                                <p>{{ $newscategory->details }}</p>

                                <ul>
                                    <li><i class="far fa-comment-alt"></i> <a href="#">{{ $newscategory->id }}</a></li>
                                    <li><i class="far fa-clock"></i> {{ $newscategory->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div> --}}

                <div class="news-category-container">
                    <h3 class="judul">Berita Terkini</h3>
                    <div class="news-category">
                        @foreach($newscategory_one as $key => $topnews)
                            <div class="section-item">

                                <a href="{{ route('page.news',$topnews->slug) }}" class="bg-image" style="background-image:url({{ asset('images/'.$topnews->image) }}); border-radius:10px;"></a>

                                <div>
                                    <h3><a href="{{ route('page.news',$topnews->slug) }}">{{ $topnews->title }}</a></h3>

                                    @if($key == 0)
                                        <p>{{ $topnews->excerpt }}
                                            <a href="{{ route('page.news',$topnews->slug) }}"class="btn btn-primary">Read more</a>
                                        </p>
                                    @endif

                                    <ul>
                                        <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$topnews->category->slug) }}">{{ @$topnews->category->name }}</a></li>
                                        <li><i class="far fa-clock"></i> {{ $topnews->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($advertisements && $advertisements->body_bottom)
                <img src="{{ asset('images/advertisements/'.$advertisements->body_bottom) }}" alt="Ads" class="width-100">
                @endif
                <div class="news-category-container">
                    <h3 class="judul">News Random</h3>
                    <div class="news-lifestyle">
                        @foreach($newsinRandomOrder as $topnews)
                            <div class="section-item"> 
                                    <div class="image-container">
                                        <img src="{{ asset('images/'.$topnews->image) }}" alt="{{ $topnews->title }}" class="width-100">
                                        <div class="title-overlay-lifestyle">
                                            <a href="{{ route('page.category',$topnews->category->slug) }}" class="title-category">{{ @$topnews->category->name }} </a>
                                        </div>
                                    </div>
                                
                                    <h3><a href="{{ route('page.news',$topnews->slug) }}">{{ $topnews->title }}</a></h3>

                                    {{-- <p>{{ $topnews->details }}</p> --}}

                                    {{-- <ul>
                                        <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$topnews->category->slug) }}">{{ $topnews->category->name }}</a></li>
                                        <li><i class="far fa-clock"></i> {{ $topnews->created_at->diffForHumans() }}</li>
                                    </ul> --}}
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <aside class="sidebar">

                @if ($advertisements && $advertisements->sidebar_one)
                    <img src="{{ asset('images/advertisements/'.$advertisements->sidebar_one) }}" alt="Ads" class="width-100">
                @endif

                @include('frontend.pages.sidebar')
            </aside>

        </div>
    </section>

@endsection

@push('scripts')


@endpush