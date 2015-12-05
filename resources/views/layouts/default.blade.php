<?php
function displayAlert() {
    $ret = '';

    if(Session::has('messages'))
    {
        foreach(Session::get('messages') as $message)
        {
            list($type, $message) = explode('|', $message);
            $ret .= sprintf('<div class="alert alert-%s">%s</div>', $type, $message);
        }
    }

    Session::forget('messages');

    return $ret;
}
?>

@if (trim($__env->yieldContent('title')))
    @section('title') | QCM @append
@else
    @section('title', 'QCM')
@endif

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>{{ $__env->yieldContent('title') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}"  media="screen, projection"/>
        @section('css')
        @show
    </head>
    <body id="page">
        <header id="page__header">
            <nav role="navigation">
                <div class="container">
                    <div>
                        <h1 id="logo"><a href="{{ route('index') }}">QCM.fr</a></h1>
                    </div>
                    <div id="navigation__container">
                        <ul id="navigation__menu">
                            <?php if(Auth::check()): ?>
                            <li><a href="{{ route('auth::logout') }}">Se déconnecter</a></li>
                            <?php else: ?>
                            <li><a href="{{ route('auth::login') }}">Se connecter</a></li>
                            <li><a href="{{ route('auth::register') }}">S'inscrire</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main id="page__content">
            <div class="container">
                <?= displayAlert() ?>
                @yield('content')
            </div>
        </main>

        <footer id="page__footer">
            <div class="container">
                <p><span class="copyleft">&copy;</span> 2015 - <b>L'équipe du Oui</b></p>
            </div>
        </footer>

        <!-- http://techably.com/chrome-font-size-bug-fix/11996/ -->
        <script>
            document.getElementsByTagName('html')[0].style.fontSize = '62.5%';
            document.body.style.fontSize = '1.6rem';
        </script>
        @section('js')
        @show

        {{--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>--}}
    </body>
</html>