<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }} | {{config('app.name')}}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.atserver186.jp/libs/fontawesome/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!--s:sidebar-->
    <aside class="sidebar-fixed">
        <!--// 大きいの //-->
        <ul class="sidebar-list">
            <!--liにはclassを書かないので、sidebar-list liで指定-->
            <li><a href="{{ route('manage.index') }}" class="sidebar-logo"><img src="https://pic.atserver186.jp/img/atserver/root/ats_logo.webp" class="sidebar-logo-img"></a></li>
            <hr class="main-hr" style="margin: 0;">
            <li><a href="{{ route('manage.index') }}"><i class="fas fa-home"></i><span class="sidebar-text">ホーム</span></a></li>
            <li><a href="{{ route('manage.inquiry') }}"><i class="fa-solid fa-envelope"></i><span class="sidebar-text">お問い合わせ確認</span></a></li>
            <li><a href="{{ route('manage.post.organization.index') }}"><i class="fa-solid fa-newspaper"></i><span class="sidebar-text">参加団体記事</span></a></li>
            <li><a href="{{ route('manage.post.blog.index') }}"><i class="fa-solid fa-message"></i><span class="sidebar-text">ブログ記事</span></a></li>
            <li><a href="{{ route('manage.post.news.index') }}"><i class="fa-solid fa-newspaper"></i><span class="sidebar-text">お知らせ</span></a></li>
        </ul>
        <hr class="main-hr">
        <div class="flex flex-col">
            <p class="newsbar-under-link-text">
                &copy; 2026 ATSERVER<br>
                Comina UI
            </p>
        </div>
    </aside>

    <!--// 小きいの //-->
    <aside class="sidebar-fixed-mini">
        <ul class="sidebar-list-mini">
            <!--liにはclassを書かないので、sidebar-list liで指定-->
            <li><a href="{{ route('manage.index') }}" title="ホーム" class="sidebar-logo"><img src="https://pic.atserver186.jp/img/atserver/root/ats_logo.webp" class="sidebar-logo-img"></a></li>
            <hr class="main-hr" style="margin: 0;">
            <li><a href="{{ route('manage.index') }}" title="ホーム"><i class="fas fa-home"></i></a></li>
            <li><a href="{{ route('manage.inquiry') }}" title="お問い合わせ確認"><i class="fa-solid fa-envelope"></i></a></li>
            <li><a href="{{ route('manage.post.organization.index') }}" title="参加団体記事"><i class="fa-solid fa-newspaper"></i></a></li>
            <li><a href="{{ route('manage.post.blog.index') }}" title="ブログ記事"><i class="fa-solid fa-message"></i></a></li>
            <li><a href="{{ route('manage.post.news.index') }}" title="お知らせ"><i class="fa-solid fa-newspaper"></i></a></li>
        </ul>
    </aside>
    <!---->
    <!--e:sidebar-->
    <!---->
    <!--s:header-->
    <div class="tab-nav-header">
        <div class="img-hover-nav">
            <a href="javascript:history.back();" class="tab-nav-back-btn" aria-label="閉じる">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        <p class="nav-menu-title">{{ $title ?? config('app.name') }}</p>
    </div>
    </header>
    <!--e:header-->
    <!---->
    <!--s:bottom menu-->
    <div class="bottom-nav">
        &nbsp;
        <a href=" {{ route('manage.index') }} "><i class="fas fa-home"></i></a>
        <a href=" {{ route('manage.inquiry') }} "><i class="fa-solid fa-envelope"></i></a>
        <a href=" {{ route('manage.post.organization.index') }} "><i class="fa-solid fa-newspaper"></i></a>
        <a href=" {{ route('manage.post.blog.index') }} "><i class="fa-solid fa-message"></i></a>
        <a href=" {{ route('manage.post.news.index') }} "><i class="fa-solid fa-newspaper"></i></a>
        &nbsp;
    </div>

    <!-- サイドバー -->
    <nav class="sidebar" id="sidebar">
        <ul class="newsbar-list">
            <!--検索フォーム(固定)-->
            <div class="newsbar-search-container">
                <form class="newsbar-search-form" action="" method="GET" onsubmit="return validateSearchForm()">
                    <input class="search-box" type="text" id="searchTerm" name="q" placeholder="検索...">
                    <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <br>
            <hr class="blog-card-hr">
        </ul>
        <ul class="sidebar-list">
            <!--liにはclassを書かないので、sidebar-list liで指定-->
            <li><a href=""><i class="fa-solid fa-newspaper"></i><span>ブログ</span></a></li>
            <li><a href=""><i class="fa-solid fa-message"></i><span>つぶやき</span></a></li>
            <li><a href=""><i class="fa-solid fa-user-group"></i><span>コミュニティー</span></a></li>
            <li><a href=""><i class="fa-solid fa-bookmark"></i><span>セーブ</span></a></li>
            <hr>
            <li><a href=""><i class="fa-solid fa-gauge-simple-high"></i><span>ダッシュボード</span></a></li>
            <li><a href=""><i class="fa-solid fa-hard-drive"></i><span>ドライブ</span></a></li>
            <li><a href=""><i class="fa-solid fa-gear"></i><span>設定</span></a></li>
        </ul>

        <hr class="blog-card-hr">

        <!--// 規約・権利表示 //-->
        <p class="newsbar-under-link-text">
            <a href="#" style="margin-right: 10px;">利用規約</a>|
            <a href="#" style="margin-right: 10px; margin-left: 10px;">プライバシーポリシー</a>|
            <a href="#" style="margin-right: 10px; margin-left: 10px;">Cookieのポリシー</a>|
            <a href="#" style="margin-right: 10px; margin-left: 10px;">APIについて</a>|
            <a href="#" style="margin-right: 10px; margin-left: 10px;">設定</a>|
            <a id="inquiry-link" href="" style="margin-left: 10px;">
                お問い合わせ
            </a>
            <br><br>
            &copy; 2026 ATSERVER<br>
            Comina UI
            <br><br><br><br><br><br>
        </p>
    </nav>

    <div id="sidebar-overlay"></div>
    <!--e:bottom menu-->
    <!---->
    <!--s:main-->
    <main class="comina-main-content">
        <div class="atsocial-tl-container">
            {{ $slot }}
        </div>
    </main>
    <!--e:main-->
</body>

</html>