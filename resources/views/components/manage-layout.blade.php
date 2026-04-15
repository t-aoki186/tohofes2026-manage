<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.atserver186.jp/libs/fontawesome/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#202124]">
    <!--s:header-->
    <header class="fixed top-0 right-0 left-0 z-20 border border-black/10 bg-white/80 backdrop-blur-md h-15">
        <div class="header__inner">
            <h1 class="header__title header-title">
                <a href="{{ route('manage.index') }}">
                    <img src="https://pic.atserver186.jp/img/atserver/root/ats_logo.webp" alt="ATSERVERロゴ" class="h-10 w-auto rounded-xl" />
                </a>
            </h1>

            <nav class="header__nav nav" id="js-nav">
                <ul class="nav__items nav-items">
                    <li class="nav-items__item"><a href="{{ route('manage.index') }}">ホーム</a></li>
                    <li class="nav-items__item"><a href="{{ route('manage.inquiry') }}">お問い合わせ確認</a></li>
                    <li class="nav-items__item"><a href="{{ route('manage.post.organization') }}">参加団体投稿</a></li>
                    <li class="nav-items__item"><a href="{{ route('manage.post.blog') }}">ブログ投稿</a></li>

                </ul>
            </nav>

            <button class="header__hamburger hamburger" id="js-hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>
    <!--e:header-->
    <main class="mr-1 ml-1 min-h-screen">
        {{ $slot }}
    </main>
</body>

</html>