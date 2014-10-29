<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')Clothesline</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://localhost/laravel/public/css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="http://localhost/laravel/public/css/lumen.min.css">
        <link rel="stylesheet" href="http://localhost/laravel/public/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://localhost/laravel/public/css/jquery.bxslider.css">
        <style>
        input[type=checkbox] { display:none; } /* to hide the checkbox itself */
        input[type=checkbox] + label:before {
          font-family: FontAwesome;
          display: inline-block;
        }

        input[type=checkbox] + label:before { content: "\f096"; } /* unchecked icon */
        input[type=checkbox] + label:before { letter-spacing: 10px; } /* space between checkbox and label */

        input[type=checkbox]:checked + label:before { content: "\f046"; } /* checked icon */
        input[type=checkbox]:checked + label:before { letter-spacing: 8px; } /* allow space for check mark */

        label.nopadding { padding: 0; }

        .brand { list-style: none; margin: 0; padding: 0; }
        .brand li { position: relatitve; word-wrap: break-word; overflow: hidden; border-radius: 5px; box-shadow: 0 3px 0px #ddd; transition: 0.2s; display: inline; display: inline-block; width: 120px; height: 120px; line-height: 120px; text-align: center; background: #eee; margin-right: 1em; margin-bottom: 1em; }
        .brand li .close { position: absolute; top: 10px; right: 10px; }
        .brand li:hover { background: #e3e3e3; box-shadow: 0 3px 0px #ccc; cursor: pointer; }
        .brand li.selected { background: #45af50; box-shadow: 0 3px 0px #388c40; color: white; }

        .bx-viewport { height: 133px !important; }
        .bx-wrapper .bx-next { right: 20px; }

        body { background: #eaeaea; }

        @font-face {
            font-family: Damion;
            src: url(http://localhost/laravel/public/fonts/BebasNeue.otf);
        }

        h1, h2 { font-family: Damion, serif; }

        .col:not(:first-child,:last-child) {
          padding-right:7px;
          padding-left:7px;
        }

        .tags .tag:nth-child(5n+0) { margin-right: 0; }
        .tag { background: #ddd; padding-top: 5px; padding-bottom: 5px; border-radius: 3px; width: 19%; margin-right: 1.25%; margin-bottom: 10px; cursor: pointer; }
        .tag.active { background: #45AF50; color: white; }
        .tag .fa { color: #ccc; margin-top: 3px; }
        .tag.active .fa { color: white; }

        .navbar.navbar-default a { color: #ddd; transition: .2s; }
        .navbar-nav.navbar-right:last-child { margin-top: 5px; }
        .navbar-default .navbar-nav>li>a { color: #ddd; font-size: 1.4em; transition: .2s; }
        .navbar-default a:hover, .navbar-default a:active, .navbar-default a:focus{ color: white !important; }

        .subscribe { background: #16161d; color: #fff; padding: 10px 15px; border: solid 2px white; margin-left: 1%; width: 18%; }
        .subscribe:hover { background: white; color: black; }
        </style>
        <script src="http://localhost/laravel/public/js/jquery-1.11.1.min.js"></script>
        <script src="http://localhost/laravel/public/js/jquery.autocomplete.min.js"></script>
        <script src="http://localhost/laravel/public/js/jquery.bxslider.min.js"></script>
        <script src="http://localhost/laravel/public/js/parallax.min.js"></script>
    </head>
    <body>
    <div class="navbar navbar-default" style="border: none; background: #16161d; border-bottom: solid 1px white; border-radius: 0; margin-bottom: 0;">
        <div class="container" style="font-family: Damion; padding-top: 10px; padding-bottom: 10px;">
            <div>
                <div class="navbar-header">
                    <a href="http://localhost/laravel/public/" class="navbar-brand" style="font-size: 2em; margin-top: 5px;">Clothesline</a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./directory" id="themes">Directory</a></li>
                        <li><a href="./about" id="themes">About Us</a></li>
                        <li><a href="http://startupclothesline.wordpress.com/" id="themes" target="_blank">Blog</a></li>
                        @if (!Auth::check())
                            <li><a href="./login" id="themes">Sign In</a></li>
                            <li><a href="./signup" id="themes">Sign Up</a></li>
                        @endif
                        @if (Auth::check())
                            <li class="dropdown" style="background: #16161d; color: white;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style=" padding-right: 0;">{{ Auth::user()->username }} <b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background: #16161d; border-radius: 0; border: solid 1px white; margin-top: 10px; border-top: none; font-size: 1.3em;">
                                    <li><a href="./settings">Settings</a></li>
                                    <li><a href="./likes">Setup Clothesline</a></li>
                                    <li><a href="./logout">Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="wrapper">
        <div style="width: 100%; height: {{ (Auth::check() ? '250px' : '450px') }}; position: relative; border-bottom: solid 1px white;" data-parallax="scroll" data-image-src="./css/images/splash.jpg">
            <div class="container">
                <h1 style="display: inline-block; padding: .5em 1em .4em .5em; background: black; color: white; font-size: 40px; margin-top: {{ (Auth::check() ? '1.5em' : '3.5em') }}; margin-bottom: 1px; width: 350px; letter-spacing: 2px;">Clothesline</h1><br>
                <h2 style="display: inline-block; padding: .6em 1em .5em; background: #fff; color: #000; font-size: 20px; margin-top: 0; letter-spacing: 2px; width: 350px;">Discover brands That Suit You.</h2>
            </div>
        </div>
        <div class="container" style="padding-top: 2em; padding-bottom: 2em; min-height: 300px;">
            @if (Session::get('message') !== null)
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            @yield('content')
        </div>
    </div>

    <div id="footer" style="margin-top: 2em; background: #16161d; color: #fff; border-top: solid 1px #FFF; padding: 1em 0 5em;">
        <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1 style="color: white; margin-bottom: 5px;">Clothesline</h1>
                We help you find brands based on your preferences.
            </div>
            <div class="col-md-6">
                <h1 style="color: white; margin-bottom: 0; margin-bottom: 5px;">Newsletter</h1>
                <form method="post" action="http://mailing.skid.si/subscribe.php">
                    <input type="text" style="background: #16161d; border: solid 2px white; color: white; padding: 10px 15px; width: 80%;" name="email" placeholder="user@email.com">
                    <input type="hidden" value="c1cac1d1e604dce" name="list" />
                    <input type="submit" class="subscribe" name="subscribe" value="Sign up">
                </form>
            </div>
            <div class="col-md-3">
                <h1 style="color: white; margin-bottom: 0; margin-bottom: 5px;">Contact us</h1>
                jason@clothesline.com<br>
                rudi@clothesline.com<br><br>
                <a href="http://fb.me/clotheslinestartup" target="_blank">Facebook</a><br>
                <a href="http://twitter.com/clotheslinestartup" target="_blank">Twitter</a>
            </div>
        </div>
        </div>
    </div>

    <script src="http://localhost/laravel/public/js/bootstrap.min.js"></script>
    </body>
</html>
