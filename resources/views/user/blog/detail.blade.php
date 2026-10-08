@extends('user.layouts.app')
@section('content')
<div class="blog-post-area">
                    <h2 class="title text-center">Latest From our Blog</h2>
                    <div class="single-blog-post">
                        <h3>{{ $data -> title }}</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> Mac Doe</li>
                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                <li><i class="fa fa-calendar"></i> {{ $data->created_at->format('M d, Y') }}</li>
                            </ul>
                            <span>
                                @for($i = 1; $i <= 5; $i ++)
                                    @if($i <=$avgRate)
                                    <i class="fa fa-star"></i>
                                    @else
                                    <i class="fa fa-star-o"></i>
                                    @endif
                                    @endfor
                            </span>
                        </div>
                        <a href="">
                            <img src="{{ asset('admin/assets/images/blogs/' . $data->image) }}" alt="">
                        </a>
                        <p>
                            {{ $data -> description }}
                        <p>
                            {{!! $data -> content !!}}

                        <div class="pager-area">
                            <ul class="pager pull-right">
                                @if ($prev)
                                <li><a href="/shop/blog/detail/{{ $prev -> id }}">Pre</a></li>
                                @endif
                                @if ($next)
                                <li><a href="/shop/blog/detail/{{ $next -> id }}">Next</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div><!--/blog-post-area-->

                <div class="rating-area">
                    <ul class="ratings">
                        <li class="rate-this">Rate this item:</li>
                        <li>
                            <div class="rate">
                                <div class="vote" data-blog="{{ $data -> id }}">
                                    <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
                                    <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
                                    <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
                                    <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                                    <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
                                    <span class="rate-np">{{ $avgRate }}</span>
                                </div>
                            </div>
                        </li>
                        <li class="color">(6 votes)</li>
                    </ul>
                    <ul class="tag">
                        <li>TAG:</li>
                        <li><a class="color" href="">Pink <span>/</span></a></li>
                        <li><a class="color" href="">T-Shirt <span>/</span></a></li>
                        <li><a class="color" href="">Girls</a></li>
                    </ul>
                </div><!--/rating-area-->

                <div class="socials-share">
                    <a href=""><img src="images/blog/socials.png" alt=""></a>
                </div><!--/socials-share-->

                <div class="media commnets">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="images/blog/man-one.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Annie Davis</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="blog-socials">
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                            <a class="btn btn-primary" href="">Other Posts</a>
                        </div>
                    </div>
                </div>Comments
                <div class="response-area">
                    <h2>3 RESPONSES</h2>
                    <ul class="media-list">
                        @foreach ($comment as $cmt )
                        @if ($cmt -> level == 0)
                        <li class="media" data-id="{{ $cmt->id }}">
                            <a class="pull-left" href="#">
                                <img class="media-object"
                                    src="{{ asset('admin/assets/images/users/' . $cmt->avt_user) }}"
                                    style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                            </a>
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i>{{ $cmt -> name_user }}</li>
                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                    <li><i class="fa fa-calendar"></i> {{ $cmt -> time }}</li>
                                </ul>
                                <p>{{ $cmt -> cmt }}</p>
                                <button type="button" class="btn btn-primary reply">
                                    <i class="fa fa-reply"></i> Reply
                                </button>
                                <!-- form ẩn để reply -->
                                <div class="reply-form" style="display: none; margin-top: 15px;">
                                    <textarea rows="3" class="form-control reply_message" placeholder="Write a reply..."></textarea>
                                    <button class="btn btn-primary btn-sm post-reply" data-id="{{ $cmt -> id}}" style="margin-top: 5px;">Submit Reply</button>
                                </div>
                            </div>
                        </li>
                        @foreach ($comment as $subCmt)
                        @if ($subCmt->level == $cmt->id)
                        <li class="media second-media">
                            <a class="pull-left" href="#">
                                <img class="media-object"
                                    src="{{ asset('admin/assets/images/users/' . $subCmt->avt_user) }}"
                                    style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                            </a>
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i>{{ $subCmt->name_user }}</li>
                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                    <li><i class="fa fa-calendar"></i> {{ $subCmt->time }}</li>
                                </ul>
                                <p>{{ $subCmt->cmt }}</p>
                            </div>
                        </li>
                        @endif
                        @endforeach

                        @endif
                        @endforeach
                    </ul>
                </div><!--/Response-area-->
                <div class="replay-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Leave a replay</h2>
                            <div class="text-area">
                                <div class="blank-arrow">
                                    <label>Your Name</label>
                                </div>
                                <span>*</span>
                                <textarea name="cmt" rows="11" class="comment_message"></textarea>
                                <button class="btn post">Post Comment</button>
                            </div>
                        </div>
                    </div>
                </div><!--/Repaly Box-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        //vote
        $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_hover');
                // $(this).nextAll().removeClass('ratings_vote'); 
            },
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_hover');
                // set_votes($(this).parent());
            }
        );

        $('.ratings_stars').click(function() {
            var checkLogin = "{{ Auth::check() }}";
            if (checkLogin) {
                var rate = $(this).find("input").val();
                var id_blog = $('.vote').data('blog');
                if ($(this).hasClass('ratings_over')) {
                    $('.ratings_stars').removeClass('ratings_over');
                    $(this).prevAll().andSelf().addClass('ratings_over');
                } else {
                    $(this).prevAll().andSelf().addClass('ratings_over');
                }
                $.ajax({
                    type: 'POST',
                    url: '{{ url("/shop/blog/detail/rate") }}',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        rate: rate,
                        id_blog: id_blog
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
            } else {
                alert('Vui long login để rate');
            }

        });
    });

    $(document).ready(function() {
        $('.post').click(function() {
            var checkLogin = "{{ Auth::check() }}";
            if (checkLogin) {
                const cmt = $('.comment_message').val();
                const id_blog = $('.vote').data('blog');
                console.log('data')
                console.log(cmt)

                $.ajax({
                    type: 'POST',
                    url: '{{ url("/shop/blog/detail/comment") }}',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        cmt: cmt,
                        id_blog: id_blog
                    },
                    success: function(response) {
                        const cmt = response.data;
                        const html = `
                            <li class="media"  data-id="${cmt.id}>
                            <a class="pull-left" href="#">
                                <img class="media-object" src="/admin/assets/images/users/${cmt.avt_user}" alt=""
                                style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                            </a>
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i>${cmt.name_user}</li>
                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                    <li><i class="fa fa-calendar"></i> ${cmt.time}</li>
                                </ul>
                                <p>${cmt.cmt}</p>
                                <button type="button" class="btn btn-primary reply">
                                    <i class="fa fa-reply"></i> Reply
                                </button>
                                <div class="reply-form" style="display: none; margin-top: 15px;">
                                    <textarea rows="3" class="form-control reply_message" placeholder="Write a reply..."></textarea>
                                    <button class="btn btn-primary btn-sm post-reply" data-id="${cmt.id}" style="margin-top: 5px;">Submit Reply</button>
                                </div>
                            </div>
                        </li>
                        `
                        $('.media-list').append(html);
                        $('.comment_message').val('');
                    }
                })
            } else {
                alert('Vui lòng login để comment');
            }
        })
    })

    $(document).on('click', '.reply', function() {
        $(this).closest('.media-body').find('.reply-form').toggle();
    });

    $(document).ready(function() {
        $(document).on('click', '.post-reply', function() {
            var checkLogin = "{{ Auth::check() }}";
            if (checkLogin) {
                const cmtReply = $(this).closest('.reply-form').find('.reply_message').val();
                const id_blog = $('.vote').data('blog');
                const id_cha = $(this).data('id');

                const btnReply = $(this).closest('.media');

                console.log('Comment Reply')
                console.log(cmtReply)
                $.ajax({
                    type: 'Post',
                    url: '{{ url("/shop/blog/detail/replycmt")}}',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        cmt: cmtReply,
                        id_blog: id_blog,
                        level: id_cha
                    },
                    success: function(response) {
                        const reply = response.data;
                        const html = `
                            <li class="media second-media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="/admin/assets/images/users/${reply.avt_user}" alt=""
                                style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                            </a>
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i>${reply.name_user}</li>
                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                    <li><i class="fa fa-calendar"></i> ${reply.time}</li>
                                </ul>
                                <p>${reply.cmt}</p>
                            </div>
                        </li>
                        `
                        $(`.media[data-id="${id_cha}"]`).after(html);
                        $('.reply-form').hide();
                    }
                })
            } else {
                alert('Đăng nhập để comment');
            }
        })
    })
</script>
@endsection