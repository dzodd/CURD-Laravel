<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <meta charset="utf-8">
    <title>News</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
   ================================================== -->
    <link rel="stylesheet" href="{{ asset('Frontend/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/vendor.css ') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/main.css ') }} ">


    <!-- script
   ================================================== -->
    <script src="{{ asset('Frontend/js/modernizr.js') }}"></script>
    <script src="{{ asset('Frontend/js/pace.min.js ') }}"></script>

    <!-- favicons
 ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header
   ================================================== -->
    <header class="short-header">

        <div class="gradient-block"></div>

        <div class="row header-content">

            <div class="logo">
                <a href="{{  route('dashboard.frontpage.index') }}">News</a>
            </div>

            <nav id="main-nav-wrap">
                <ul class="main-navigation sf-menu">
                    <li class="current"><a href="{{ route('dashboard.frontpage.index') }}" title="">Trang
                            chủ</a></li>
                    <li class="has-children">
                        <a href="#" title="">Danh mục</a>
                        <ul class="sub-menu">
                            <li class="has-children">
                                @foreach ($cates as $category)
                                    <a href="{{ route('dashboard.frontpage.show', $category->id) }}">
                                        {{ $category->name }}</a>
                                @endforeach
                            </li>

                        </ul>

                    </li>
                    <li><a href="index.php?manage=about" title="">Về chúng tôi</a></li>
                    <li><a href="index.php?manage=contact" title="">Liên hệ</a></li>
                </ul>
            </nav> <!-- end main-nav-wrap -->

            <div class="search-wrap">

                <form role="search" method="GET" class="search-form" action="{{ route('search') }}">
					<label>
						<span class="hide-content">Tìm kiếm:</span>
						<input type="search" class="search-field" placeholder="Nhập từ khóa"
						value="" name="search" title="Search for:" autocomplete="off">
					</label>
					<input type="submit" class="search-submit" value="Search">
				</form>

                <a href="#" id="close-search" class="close-btn">Đóng</a>

            </div> <!-- end search wrap -->

            <div class="triggers">
                <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
                <a class="menu-toggle" href="#"><span>Menu</span></a>
            </div> <!-- end triggers -->

        </div>

    </header> <!-- end header -->



    <section id="content-wrap" class="blog-single">

        <div class="row">
            <div class="col-twelve">

                <article class="format-standard">
                    @if ($posts->isNotEmpty())
                        @foreach ($posts as $post)
                            <div class="content-media">
                                <div class="post-thumb">
                                    <img src="{{ asset('backend/dist/img/upload/post') }}/{{ $post->image }}?>"
                                        alt="building">
                                </div>
                            </div>

                            <div class="primary-content">

                                <h1 class="page-title">{{ $post->title }}</h1>

                                <ul class="entry-meta">
                                    <li class="date">{{ $post->created_at }}</li>
                                    {{-- <li class="cat"><a href="#">{{ /*tacgia*/ }}</a></li> --}}
                                </ul>

                                <p> {{ $post->content }}</p>
                        @endforeach
                    @else


                        <div>
                            <h2>No posts found</h2>
                        </div>
                    @endif

                </article>

            </div> <!-- end col-twelve -->
        </div> <!-- end row -->


    </section>
    < <footer>
        <script src="{{ asset('Frontend/js/jquery-2.1.3.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/plugins.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery.appear.js ') }}"></script>
        <script src="{{ asset('Frontend/js/main.js') }}"></script>

        </footer>
