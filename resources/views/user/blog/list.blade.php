@extends('user.layouts.app')
@section('content')
<div class="blog-post-area">
                    <h2 class="title text-center">Latest From our Blog</h2>
                    @foreach ($data as $blog)
                        <div class="single-blog-post">
                        <h3>{{ $blog->title }}</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> Mac Doe</li>
                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                 <li><i class="fa fa-calendar"></i> {{ $blog->created_at->format('M d, Y') }}</li>
                            </ul>
                            <span>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </span>
                        </div>
                        <a href="">
                            <img class="blog-image" src="{{ asset('admin/assets/images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">
                        </a>
                        <p>{{ $blog->description }}</p>
                        <a class="btn btn-primary" href="/shop/blog/detail/{{ $blog -> id }}">Read More</a>
                    </div>
                    @endforeach
                     {!! $data->links('pagination::bootstrap-4') !!}
                </div>
@endsection