@extends('frontend.layout.master')

@section('title', 'Search Page')

@section('content')

    <section class="section">
        <div class="page-header container">
            <h1>Search result for: @if(isset($_GET['search'])) {{ $_GET['search'] }} @endif</h1>
            <ul>
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
            </ul>
        </div>
        <div class="ads">
            @foreach ($headerads as $item)
                    <img src="{{ asset('images/advertisements/'.$item->header_top) }}" alt="Ads" class="width-100">               
            @endforeach
        </div>
    </section>

    <section class="section">
        <div class="section-news container">

            <div class="news">
                <div class="news-lifestyle">
                    @forelse($newssearch as $news)
                        <div class="section-item">
                            <div class="image-container">
                                <img src="{{ asset('images/'.$news->image) }}" alt="{{ $news->title }}" class="width-100">
                                <div class="title-overlay-lifestyle">
                                    <a href="{{ route('page.category',$news->category->slug) }}" class="title-category">
                                        <span>{{ $news->category->name }} </span></a>
                                </div>
                            </div>
                                <h3><a href="{{ route('page.news',$news->slug) }}">{{ $news->title }}</a></h3>                            
                        </div>
                    @empty 
                        <h2>No result found!</h2>
                    @endforelse
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