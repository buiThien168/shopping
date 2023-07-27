<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{ route('home.user') }}" class="active">Home</a></li>

        @foreach ($categoryLimit as $valueCategory)
            <li class="dropdown"><a href="#">{{ $valueCategory->name }}<i class="fa fa-angle-down"></i></a>
                @include('user.components.child_menu', ['valueCategory' => $valueCategory])
            </li>
        @endforeach

        <li><a href="404.html">404</a></li>
        <li><a href="contact-us.html">Contact</a></li>
    </ul>
</div>
