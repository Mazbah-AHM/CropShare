<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CropShare</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="topbar stick">
            <div class="logo">
                <a title="" href="newsfeed.html"><img src="images/logo.png" alt=""></a>
            </div>

            <div class="top-area">
                <ul class="main-menu">
                    <li>
                        <a href="{{ route('home') }}" title="">News Feed</a>
                    </li>
                    <li>
                        <a href="" title="">About Us</a>
                    </li>
                </ul>
                <ul class="setting-area">
                    <li>
                        <a href="#" title="Notification" data-ripple="">
                            <i class="ti-bell"></i><span>{{ $notificationCount }}</span>
                        </a>
                        <div class="dropdowns">
                            <ul class="drops-menu">
                                @if (isset($notifications))
                                    @foreach ($notifications as $notification)
                                        <li>
                                            <div class="mesg-meta">
                                                <h6>{{ $notification->message }}</h6>
                                                <i>2 min ago</i>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                    </li>
                </ul>

                <div
                    style="display: inline-block;
                vertical-align: middle;
                position: relative;
                line-height: 60px;">
                    <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <section>
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="page-contents">
                                <div class="col-lg-3">
                                    <aside class="sidebar static">
                                        <div class="widget">
                                        </div><!-- Shortcuts -->

                                    </aside>
                                </div><!-- sidebar -->
                                <div class="col-lg-6">
                                    <div class="central-meta">
                                        <div class="new-postbox">
                                            <form action="{{ route('createpost') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="drop-down-category">
                                                    <label>Category</label>
                                                    <select name="category_id"> <!-- Add name attribute here -->
                                                        @if (isset($category))
                                                            @foreach ($category as $cat)
                                                                <option value="{{ $cat->id }}">
                                                                    {{ $cat->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                                <br />
                                                <div class="newpst-input">
                                                    <textarea rows="2" name="description" placeholder="write something"></textarea>
                                                    <div class="attachments">
                                                        <ul>
                                                            <li>
                                                                <i class="fa fa-image"></i>
                                                                <label class="fileContainer">
                                                                    <input type="file" name="image">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <button type="submit">Post</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div><!-- add post new box -->
                                    <div class="loadMore">
                                        <div class="central-meta item">
                                            <div class="user-post">
                                                <div class="friend-info">
                                                    @if (isset($posts))
                                                        @foreach ($posts as $post)
                                                            <div class="friend-name">
                                                                <ins><a href="time-line.html"
                                                                        title="">{{ $post->user->name }}</a></ins>
                                                                <span>location: {{ $post->user->city }}</span>
                                                            </div>
                                                            <div class="post-meta">
                                                                <img src="/postimage/{{ $post->image }}"
                                                                    alt="">
                                                                <div class="we-video-info">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="like"
                                                                                data-post-id="{{ $post }}"
                                                                                data-toggle="tooltip" title="like">
                                                                                <i class="ti-heart"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="dislike" data-toggle="tooltip"
                                                                                title="contact">
                                                                                <a class="ti-email"
                                                                                    href="{{ url('/getcontact', $post->user->id) }}"></a>
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="description">
                                                                    <p>{{ $post->description }}</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- centerl meta -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $(".like").click(function() {
                var postId = $(this).data('post-id');

                // Get the CSRF token value from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Send an Ajax request to the controller with the CSRF token
                $.ajax({
                    type: 'POST',
                    url: '{{ route('like.post') }}',
                    data: {
                        postId: postId,
                        _token: csrfToken // Include the CSRF token in the request
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Handle success (if needed)
                        console.log(response);
                    },
                    error: function(error) {
                        // Handle error (if needed)
                        console.error(error);
                    }
                });

                // Toggle the "liked" class locally
                $(this).toggleClass("liked");
            });
        });
    </script>



    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/map-init.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>


</body>

</html>
