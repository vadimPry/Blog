@extends('Blog.layouts.main')
@section('blogArchive')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog single page</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{ $date->format('F') }} {{ $date->day }} • {{ $date->year }}
                • {{ $date->format('H:i') }} • Featured • {{ $post->comments->count() . " comments" }}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image"
                     style="width: 800px; height: 800px; object-fit: cover;" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="py-3">
                        <form action="{{ route('post.like.store', $post->id) }}" method="post">
                            @csrf
                            <span>{{ $post->liked_users_count }}</span>
                            @guest()
                                <a href="{{ route('login') }}">
                                    <i class="far fa-heart"> <b>Like</b></i>
                                </a>
                            @endguest
                            @auth()
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart">
                                        <b>Like</b></i>
                                </button>
                            @endauth
                        </form>
                    </section>
                    @if($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4 h-25 d-inline-block" data-aos="fade-right"
                                         data-aos-delay="100">
                                        <img src="{{ asset('storage/' . $relatedPost->main_image) }}" alt="related post"
                                             style="width: 200px; height: 200px; object-fit: cover;"
                                             class="post-thumbnail">
                                        <p class="blog-post-category">{{ $relatedPost->category->title }}</p>
                                        <a href="{{ route('post.show', $relatedPost->id) }}"
                                           class="blog-post-permalink">
                                            <h5 class="blog-post-title">{{ $relatedPost->title }}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    <section class="comment">
                        <h2 class="section-title mb-4" data-aos="fade-up">Comments</h2>
                        <div class="card-footer card-comments mb-5">
                            @foreach($post->comments as $comment)
                                <div class="card-comment ">
                                    <div class="comment-text">
                                <span class="username">
                                    <div style="text-transform: capitalize;">
                                        <b>{{ $comment->user->name }}</b>
                                    </div>
                                <span
                                    class="text-muted float-right">{{ $comment->DateAsCarbon->diffForHumans() }}</span>
                                </span>
                                        {{ $comment->comment }}
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Comment</label>
                                        <textarea name="comment" id="comment" class="form-control" placeholder="Comment"
                                                  rows="10"></textarea>
                                    </div>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Send comment" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>

@endsection
