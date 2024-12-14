@extends('frontend.layout.master')

@section('title', 'Home')

@section('content')

    <section class="section">
        <div class="header-top-area">
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
        <div class="section-grid container">
            @foreach($topnewslist as $key =>  $topnews)
            <div class="section-item">
                    <div class="image-container">
                        <img src="{{ asset('images/' . $topnews->image) }}" alt="{{ $topnews->title }}" class="width-100">
                        <div class="title-overlay">
                            <a href="{{ route('page.category',$topnews->category->slug) }}" class="title-category">{{ @$topnews->category->name }} </a>
                            <a href="{{ route('page.news',$topnews->slug) }}" class="title-overlay-title">{{ $topnews->title }}</a>
                        </div>
                    </div>
            </div>
        @endforeach     
        </div>
    </section>

    <section class="section">
        <div class="section-news container">

            <div class="news">

                <div class="news-category-container">
                    <h3 class="judul">Recent Sport</h3>
                    <div class="news-category">
                        @foreach($newscategory_one as $key => $topnews)
                            <div class="section-item">

                                <a href="{{ route('page.news',$topnews->slug) }}" class="bg-image" style="background-image:url({{ asset('images/'.$topnews->image) }}); border-radius:10px;"></a>

                                <div>
                                    <h3>
                                        <a href="{{ route('page.news',$topnews->slug) }}">{{ $topnews->title }}</a>
                                    </h3>

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
                
                <div class="ads">
                    <div class="title">
                        <p>Iklan</p>
                    @foreach ($headerads as $item)
                        @if (request()->is('/') && $item->type == 'home')
                            <img src="{{ asset('images/advertisements/'.$item->body_middle) }}" alt="Ads" class="width-100 body-middle">
                                @elseif ($item->type == 'category')
                                @if(request()->path() == 'page/category/'.$item->slug)
                                    <img src="{{ asset('images/advertisements/'.$item->body_middle) }}" alt="Ads" class="width-100">
                                @endif
                            @endif                
                    @endforeach
                </div>
                </div>

                <div class="news-category-container">
                    <h3 class="judul">Lifestyle Populer</h3>
                    <div class="news-lifestyle">
                        @foreach($newscategory_two as $topnews)
                            <div class="section-item">
                                <div class="image-container">
                                    <img src="{{ asset('images/'.$topnews->image) }}" alt="{{ $topnews->title }}" class="width-100">
                                    <div class="title-overlay-lifestyle">
                                        <a href="{{ route('page.category',$topnews->category->slug) }}" class="title-category">
                                            <span>{{ @$topnews->category->name }} </span></a>
                                    </div>
                                </div>
                                
                                    <h3><a href="{{ route('page.news',$topnews->slug) }}">{{ $topnews->title }}</a></h3>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="news-category-container">
                    <h3 class="judul">Tech News</h3>
                    <div class="news-technology">
                        @foreach($newscategory_three as $topnews)
                            <div class="section-item">
                                <a href="{{ route('page.news',$topnews->slug) }}" class="bg-image" style="background-image:url({{ asset('images/'.$topnews->image) }}); border-radius:4px; height:170px; max-height: auto;"></a>
                                <div style="justify-items: start;  margin-bottom: 10px">
                                    <h3><a href="{{ route('page.news',$topnews->slug) }}">{{ $topnews->title }}</a></h3>
    
                                    <ul class="ul-tech">
                                        <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$topnews->category->slug) }}">{{ $topnews->category->name }}</a></li>
                                        <li><i class="far fa-clock"></i> {{ $topnews->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="logo-container">
                    <div id="logo" class="logo">
                        
                    </div>
                </div>

            </div>

            <aside class="sidebar">
                @include('frontend.pages.sidebar')
            </aside>

        </div>
    </section>

@endsection

