<!DOCTYPE HTML>
<html>
    <head>
        <!-- incude -->
        @include('includes.head')
    </head>
    <body>
        <header>
            @include('includes.header')
        </header>
        <div class="content">
            <!-- yield 會產生 content 這個 section 的內容 -->
            @yield('content')
        </div>
        <footer>
            @include('includes.footer')
        </footer>
    </body>
</html>