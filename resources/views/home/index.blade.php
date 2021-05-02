Index fellas
<form action="{{ route('search') }}" method="GET">

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        Pesquisa:
        <input type="text" name="name" placeholder="Nome"/>

    <input type="text" name="federation_name" placeholder="Federação"/>
    <button type="submit">Pesquisar</button>
    </div>

</form>
