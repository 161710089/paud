<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        @foreach($sekolahs as $data)
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           <img src="{{ asset('img/FotoSekolah/'.$data->logo) }}" style="max-height:80px; 
            max-width: 65px; margin-top:7px;">
           @lang($data->nama_sekolah)</span>
           @endforeach
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        

    </nav>
</header>


