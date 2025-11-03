<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a href="/" class="header__logo">Todo</a>
      <nav class="header-nav">
        <ul class="header-nav__inner">
          <li class="header-nav__item"><a href="/categories" class="header-nav__link">カテゴリ一覧</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    @yield('content')
  </main>
</body>

</html>
