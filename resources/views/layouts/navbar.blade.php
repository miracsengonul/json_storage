<div class="row navbar_row">
    <span><a href=" {{url('/')}} ">Anasayfa</a></span>
    <span class="margin_left_15"><a href="{{url('dokuman')}}">Doküman</a></span>
    @guest
        <span class="margin_left_15"><a href="login">Giriş Yap</a></span>
        <span class="margin_left_15"><a href="register">Kayıt Ol</a></span>
    @endguest
    @auth
        <span class="margin_left_15 aktif">#{{Auth::user()->username}}</span>
        <span class="margin_left_15">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 Çıkış
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
        </span>
    @endauth
</div>