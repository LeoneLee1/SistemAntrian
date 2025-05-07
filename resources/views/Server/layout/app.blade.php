<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    @stack('before-style')
    @include('Server.Components.includes.style')
    @stack('after-style')
</head>

<body>
    <div id="app">
        @include('sweetalert::alert')
        <div class="main-wrapper">

            <!-- Navbar Content -->
            @include('Server.Components.includes.navbar')

            <!-- Sidebar Content -->
            @include('Server.Components.includes.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('header-title')</h1>
                        <div class="section-header-breadcrumb">
                            @yield('breadcrumbs')
                        </div>
                    </div>
                </section>
                @yield('content')
            </div>

            <!-- Footer Content -->
            {{-- @include('Server.Components.includes.footer') --}}
        </div>
    </div>

    @stack('before-script')
    @include('Server.Components.includes.script')
    @stack('after-script')
    <script>
        function Logout() {
            if (confirm('Keluar Akun?')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>
