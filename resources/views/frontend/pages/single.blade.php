@extends('frontend.layout.master')

@section('title', 'Single News')

@section('content')

    <section class="section">
        <div class="page-header container">
            <ul class="border-vertical">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                <li> / </li>
                <li><a href="{{ route('page.category',$newssingle->category->slug) }}"><i class="far fa-folder"></i> {{ $newssingle->category->name }}</a></li>
                <li> / </li>
                <li>{{ $newssingle->title }}</li>
            </ul>
        </div>
    </section>

    <section class="section" style="padding-left: 10px; padding-right: 10px">
        <div class="section-news container">

            <div class="news">
                <h1 style="font-size: 2.3rem;">{{ $newssingle->title }}</h1>
                <div class="single-title" style="display: flex">
                    <p style="color: rgb(148, 148, 148); font-size: 14px; text-decoration: none; padding-right: 30px; margin-left: 10px">By. &nbsp;<strong style="color: black">{{ $newssingle->user->name }}</strong></p>
                    <p style="color: rgb(148, 148, 148); font-size: 14px; text-decoration: none">{{ $newssingle->created_at->diffForHumans() }}</p>
                </div>
                <div class="sosmed">
                    <i class="fab fa-facebook" style="color: #1877F2"></i>
                    <i class="fab fa-twitter" style="color: #1DA1F2"></i>
                    <i class="fab fa-linkedin" style="color: #0A66C2"></i>
                    <i class="fab fa-vimeo" style="color: #19b7ea"></i>
                    <i class="fab fa-youtube" style="color: #CD201F"></i>
                </div>       
                <div class="news-single">

                    <div class="section-item">
                        <img src="{{ asset('images/'.$newssingle->image) }}" alt="{{ $newssingle->title }}" class="width-100">
                        <p class="single-p"><a href="{{ route('page.category',$newssingle->category->slug) }}"><i class="far fa-folder"></i> {{ $newssingle->category->name }}</a></p>
                        @php
                        $cleanedDetails = str_replace(['<p> </p>', '<br><br>', '<p></p>'], '', $newssingle->details);
                    @endphp
                    <div class="text-container">
                        <p class="text-content">{!! $cleanedDetails !!}</p>  
                    </div>

                    </div>
                    

                </div>
                <div class="news-category-container" style="margin-top: 80px">
                    <h2>Recent Category</h2>
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
            </div>

            <aside class="sidebar">
                @include('frontend.pages.sidebar')
            </aside>

        </div>
    </section>

@endsection

@push('scripts')

@endpush