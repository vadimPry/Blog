@extends('Blog.layouts.main')
@section('blogArchive')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Categories</h1>
            <section class="featured-posts-section">
                <div class="row">
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </section>
        </div>

    </main>
@endsection
