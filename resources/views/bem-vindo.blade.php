Site da Aplicação

@auth

<h1>Usuário autenticado</h1>
<p>ID {{ Auth::user()->id }}</p>
<p>Nome {{ Auth::user()->name }}</p>
<p>Email {{ Auth::user()->email }}</p>

@endauth

@guest

    Olá visitante, tudo bem?
    <br>....
    <br>.....

@endguest
