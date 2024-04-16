@extends('Blog.layouts.main')
@section('blogArchive')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Category {{ $category->title }}</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($categoryPosts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->main_image) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                    @csrf
                                    <span>{{ $post->liked_users_count }}</span>
                                    @guest()
                                        <a href="{{ route('login') }}">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    @endguest
                                    @auth()
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                                        </button>
                                    @endauth
                                </form>
                            </div>
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                {{--                <div class="m-auto">--}}
                {{--                    {{ $posts->links() }}--}}
                {{--                </div>--}}
            </section>
        </div>

    </main>
@endsection
