<html dir="ltr" lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Empresas Junior</title>
  </head>
  <body>
    <div>
        <h3>Sistema Empresas Junior</h3>
        <h4>Bem vindo!</h4>
        @guest
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                {{ __('Login') }}
            </x-jet-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                {{ __('Cadastro') }}
            </x-jet-nav-link>
        </div>
        @endguest

        @auth
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-jet-dropdown-link>
                                        </form>
        @endauth

        <p>Encontre uma empresa junior:</p>
        <form action="{{ route('search') }}" method="GET">

            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                Pesquisa:
                <input type="text" name="name" placeholder="Nome"/>

            <select id="federations" name="federation_id">
                @foreach ($federations as $federation)
                    <option value="{{$federation->id}}">{{$federation->name}}</option>
                @endforeach

              </select>
            <button type="submit">Pesquisar</button>
            </div>

        </form>

    </div>
  </body>
</html>

