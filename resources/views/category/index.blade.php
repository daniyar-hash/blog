@extends('layouts.main')

@section('title', 'Страница категории')

@section('content')

        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
            <section class="featured-posts-section">
                <div class="row">
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="{{ route('category.posts.index', $category->id)}}">{{ $category->title}}</a></li>
                        @endforeach
                    </ul>
                   
                </div>
            </section>
        </div>

@endsection