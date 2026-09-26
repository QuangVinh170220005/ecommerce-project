@extends('user.layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Sportswear
                                    </a>
                                </h4>
                            </div>
                            <div id="sportswear" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="">Nike </a></li>
                                        <li><a href="">Under Armour </a></li>
                                        <li><a href="">Adidas </a></li>
                                        <li><a href="">Puma</a></li>
                                        <li><a href="">ASICS </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Mens
                                    </a>
                                </h4>
                            </div>
                            <div id="mens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="">Fendi</a></li>
                                        <li><a href="">Guess</a></li>
                                        <li><a href="">Valentino</a></li>
                                        <li><a href="">Dior</a></li>
                                        <li><a href="">Versace</a></li>
                                        <li><a href="">Armani</a></li>
                                        <li><a href="">Prada</a></li>
                                        <li><a href="">Dolce and Gabbana</a></li>
                                        <li><a href="">Chanel</a></li>
                                        <li><a href="">Gucci</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Womens
                                    </a>
                                </h4>
                            </div>
                            <div id="womens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="">Fendi</a></li>
                                        <li><a href="">Guess</a></li>
                                        <li><a href="">Valentino</a></li>
                                        <li><a href="">Dior</a></li>
                                        <li><a href="">Versace</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Kids</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Fashion</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Households</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Interiors</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Clothing</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Bags</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Shoes</a></h4>
                            </div>
                        </div>
                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->
                </div>
            </div>
            <div class="col-sm-9">
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
                        <li class="media">
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
                                <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                            </div>
                        </li>
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
            </div>
        </div>
    </div>
</section>
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
        $('.post').click(function(){
            var checkLogin = "{{ Auth::check() }}";
            if(checkLogin){
                const cmt = $('.comment_message').val();
                const id_blog = $('.vote').data('blog');
                console.log('data')
                console.log(cmt)

                $.ajax({
                    type: 'POST',
                    url: '{{ url("/shop/blog/detail/comment") }}',
                    data:{
                         _token: $('meta[name="csrf-token"]').attr('content'),
                         cmt: cmt,
                         id_blog: id_blog
                    },
                    success:function(response){
                        const cmt = response.data;
                        const html = `
                            <li class="media">
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
                                <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                            </div>
                        </li>
                        `
                        $('.media-list').append(html);
                        $('.comment_message').val('');
                    }
                })
            }else{
                alert('Vui lòng login để comment');
            }
        })
    })
</script>

@endsection