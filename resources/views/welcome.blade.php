<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/fav/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/fav/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/fav/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/fav/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:300,400" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{asset('frontend/css/simple-line-icons.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">


    <!-- Modernizr JS -->
    <script src="{{asset('frontend/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{asset('frontend/js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>
<header role="banner" id="fh5co-header">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="navbar-header">
                    <!-- Mobile Toggle Menu Button -->
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse"
                       data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                    <a class="navbar-brand" href="/">YourRadioBots</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#" data-nav-section="home"><span>Home</span></a></li>
                        <li><a href="#" data-nav-section="services"><span>Features</span></a></li>
                        <li><a href="#" data-nav-section="explore"><span>Statistiken</span></a></li>
                        <li><a href="#" data-nav-section="testimony"><span>Kundenmeinungen</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<section id="fh5co-home" data-section="home" style="background-image: url({{asset('frontend/images/background.png')}});"
         data-stellar-background-ratio="0.5">
    <div class="gradient"></div>
    <div class="container">
        <div class="text-wrap">
            <div class="text-inner">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <h1 class="animate-box"><span class="big">YourRadioBots</span></h1>
                        <h2 class="animate-box">Und die Konkurrenz steht im Schatten!</h2>
                        <div class="call-to-action">
                            <a href="{{route('dashboard')}}" class="demo animate-box"><i class="icon-paper-plane-o"></i>
                                Interface</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="fh5co-services" data-section="services">
    <div class="fh5co-services">
        <div class="container">
            <div class="col-md-12 section-heading text-center">
                <h2 class="animate-box">Features</h2>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 subtext animate-box">
                        <h3>Diese Features bieten wir unseren Kunden.</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="box-services">
                    <div class="icon animate-box">
                        <span><i class="icon-equalizer"></i></span>
                    </div>
                    <div class="fh5co-post animate-box">
                        <h3>Volle Kontrolle</h3>
                        <p>Mit unserem eigens entwickeltem Interface hast du die volle Kontrolle über deine
                            Musikbots.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-4 text-center">
                <div class="box-services">
                    <div class="icon animate-box">
                        <span><i class="icon-check2"></i></span>
                    </div>
                    <div class="fh5co-post animate-box">
                        <h3>Uptime</h3>
                        <p>Unsere Bots haben eine konstante Uptime von 99%. Wir bemühen uns die Uptime zu halten und sie
                            wenn möglich zu verbessern.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-4 text-center">
                <div class="box-services">
                    <div class="icon animate-box">
                        <span><i class="icon-bubbles"></i></span>
                    </div>
                    <div class="fh5co-post animate-box">
                        <h3>Support</h3>
                        <p>Unser geschultes Supportpersonal kümmert sich sorgfältig um die Anliegen der Kunden.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
</section>

<section id="fh5co-explore" data-section="explore">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-heading text-center">
                <h2 class="animate-box">Statistiken</h2>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 subtext animate-box">
                        <h3>Hier kannst Du ein paar spannende Statistiken sehen.</h3>
                    </div>

                    <div id="fh5co-counter-section" class="fh5co-counters">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 animate-box"></div>
                            </div>
                            <div class="row animate-box">
                                <div class="col-md-3 text-center">
                                    <span class="fh5co-counter js-counter" data-from="0"
                                          data-to="{{\App\User::all()->count()}}" data-speed="5000"
                                          data-refresh-interval="50"></span>
                                    <span class="fh5co-counter-label">Registrierte Kunden</span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fh5co-counter js-counter" data-from="0"
                                          data-to="{{\App\Bot::all()->count()}}" data-speed="5000"
                                          data-refresh-interval="50"></span>
                                    <span class="fh5co-counter-label">Erstellte Musikbots</span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fh5co-counter js-counter" data-from="0"
                                          data-to="{{\App\Hostsystem::all()->count()}}" data-speed="5000"
                                          data-refresh-interval="50"></span>
                                    <span class="fh5co-counter-label">Standorte</span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fh5co-counter js-counter" data-from="0"
                                          data-to="{{\App\Support::all()->count()}}" data-speed="5000"
                                          data-refresh-interval="50"></span>
                                    <span class="fh5co-counter-label">Beantwortete Fragen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section id="fh5co-testimony" data-section="testimony">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-heading text-center">
                <h2 class="animate-box"><span>Kundenmeinungen</span></h2>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 subtext animate-box">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="testimony-entry animate-box">
                    <div class="feed-bubble">
                        <p>Ich nutze eure Bots ultra gerne. Sind die besten die ich kenne!</p>
                    </div>
                    <div class="author-img" style="background-image: url(https://pbs.twimg.com/profile_images/1119599934431551488/5ZWndyor_400x400.png);"></div>
					<a href="https://twitter.com/TmNiklas"><span class="user">NiklasDZN</span></a>
                </div>

            </div>

            <div class="col-md-4">
                <div class="testimony-entry animate-box">
                    <div class="feed-bubble">
                        <p>Nice sound quality on all locations, good interface and friendly support.</p>
                    </div>
                    <div class="author-img" style="background-image: url(https://pbs.twimg.com/profile_images/1139528955466342405/rW5W9F-K_400x400.png);"></div>
					<a href="https://twitter.com/MineParticleNET"><span class="user">Finn Kruse</span></a>
                </div>

            </div>

            <div class="col-md-4">
                <div class="testimony-entry animate-box">
                    <div class="feed-bubble">
                        <p>Bin echt zufrieden mit den Musikbots! Jetzt nur noch eine gute Uptime und dann wäre es perfekt</p>
                    </div>
                    <div class="author-img"
                         style="background-image: url(https://pbs.twimg.com/profile_images/1114091488022073345/vJqOP-R9_400x400.png);"></div>
					<a href="https://twitter.com/byPvPJunkie"><span class="user">byPvPJunkie</span></a>
                </div>

            </div>
        </div>
    </div>
</section>

<div id="fh5co-footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-4 animate-box">
                <h3 class="section-title">YOURRADIOBOTS</h3>
                <p>Erstelle dir jetzt deinen Account und sichere dir bis zu zehn gratis Musikbots.</p>

            </div>

            <div class="col-md-4 animate-box">
                <h3 class="section-title">Rechtliches</h3>
                <ul class="contact-info">
                    <li><a href="/impressum">Impressum</a></li>
                    <li><a href="/datenschutz">Datenschutz</a></li>
                    <li><a href="/agb">Allgemeine Geschäftsbedingungen</a></li>
                </ul>

            </div>
            <div class="col-md-4 animate-box">
                <h3 class="section-title">Soziale Medien</h3>
                <ul class="social-media">
                    <li><a href="https://yourradiobots.eu/go/instagram" class="facebook"><i class="icon-instagram"></i></a>
                    </li>
                    <li><a href="https://twitter.com/YourRadioBots" class="twitter"><i class="icon-twitter"></i></a>
                    </li>
                    <li><a href="https://yourradiobots.eu/go/youtube" class="dribbble"><i class="icon-youtube-play"></i></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="copy-right">Copyright &copy; {{\Carbon\Carbon::now()->year}} YourMusicBot.eu Alle Rechte
                        vorbehalten.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<!-- Stellar Parallax -->
<script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
<!-- Counters -->
<script src="{{asset('frontend/js/jquery.countTo.js')}}"></script>
<!-- Main JS (Do not remove) -->
<script src="{{asset('frontend/js/main.js')}}"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
    window.addEventListener("load", function () {
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#000"
                },
                "button": {
                    "background": "#f1d600"
                }
            },
            "position": "bottom-right"
        })
    });
</script>

</body>
</html>