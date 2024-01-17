<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Login</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="container-fluid pdng0">
            <div class="row merged">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="land-featurearea">
                        <div class="land-meta">
                            <h1>CropShare</h1>
                            <p>
                                Tree Plantation Platform
                            </p>
                            <div class="friend-logo">
                                <span><img src="images/wink.png" alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-reg-bg">
                        <div class="log-reg-area reg">
                            <h2 class="log-title">Register</h2>
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" required="required" />
                                    <label class="control-label" for="input">Full Name</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" required="required" />
                                    <label class="control-label" for="input">Email Address</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" required="required" />
                                    <label class="control-label" for="input">Phone Number</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address" required="required" />
                                    <label class="control-label" for="input">Address</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="city" required="required" />
                                    <label class="control-label" for="input">City</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="zip_code" required="required" />
                                    <label class="control-label" for="input">Zip Code</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" required="required" />
                                    <label class="control-label" for="input">Password</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <a href="{{ route('login') }}" title="" style="color:blue">Already have
                                    an
                                    account</a>
                                <div class="submit-btns">
                                    <button class="btn btn-primary"><span>Register</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
