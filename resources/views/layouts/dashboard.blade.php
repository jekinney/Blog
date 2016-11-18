<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('blogs.category.index') }}">Categories</a></li>
                        <li><a href="{{ route('blogs.article.index') }}">Articles</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if(!$user)
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ $user->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="">Favorites</a></li>
                                    <li><a href="">Account</a></li>
                                    @if($user->dashboard())
                                        <li><a href="">Dashboard</a></li>
                                    @endif
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        >
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="fluid-content">
            <aside class="col-sm-1 col-md-2">
                @include('layouts.dashboard.side-menu')
            </aside>
            <section class="col-sm-11 col-md-10">
                @yield('content')
            </section>
        </main>
        
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('scripts')
    <script>
        new Vue({
            el: '#app',
            data: {
                blog: false,
                image: false,
                user: false,
                actualCount: 0,
                count: 1,
                category: {
                    id: null,
                    slug: null,
                    title: null,
                    description: '',
                    display_order: 0
                }
            },
            mounted() {
                this.actualCount = parseInt($('meta[name=count]').attr('value'));
            },
            methods: {
                showBlog: function() {
                    return this.blog = !this.blog;
                },
                showImage: function() {
                    return this.image = !this.image;
                },
                showUser: function() {
                    return this.user = !this.user;
                },
                toggleModal: function() {
                    return $('#categoryModal').modal('toggle');
                },
                toggleAdd: function() {
                    this.resetCategoryData();
                    this.setCount();
                    return this.toggleModal(); 
                },
                toggleEdit: function(category) {
                    this.category = category;
                    this.setCount();
                    return this.toggleModal();
                },
                setCount: function() {
                    if(this.category.id) {
                        return this.count = this.actualCount;
                    }
                    return this.count = this.actualCount + 1;
                },
                resetCategoryData: function() {
                    return this.category = {
                        id: null,
                        slug: null,
                        title: null,
                        description: '',
                        display_order: 0
                    };
                }
            }
        });
    </script>
</body>
</html>
