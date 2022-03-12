<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');

        * {
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        img {
            width: 150px;
        }

        body {
            background: #8e8e8f;
            overflow-y: hidden;
            margin: 0;

        }

        .container {
            height: 100%;
            display: grid;
            grid-template-columns: 200px 1fr;
            grid-template-rows: auto 1fr auto;
            grid-gap: 1.5rem;
            justify-items: stretch;
            align-items: start;
            grid-template-areas:
                'header header'
                'aside main'
                'footer footer';
        }

        /*nav bar*/
        header {
            grid-area: header;
            grid-template-columns: max-content 600px;
            grid-template-rows: auto;
        }

        .nav-bar {
            background: #121212;
            border-radius: 20px;
            display: grid;
            grid-template-columns: auto 1fr;
            padding: 1rem;
            align-items: center;
            padding-left: 1rem;
            gap: 1rem;
        }

        .nav-logo {
            width: 5.1rem;
        }

        .nav-itens {
            display: grid;
            grid-auto-flow: column;
            justify-content: start;
            list-style: none;
            grid-gap: 3rem;
        }

        .nav-link {
            color: rgb(204, 201, 201);
            font-size: 1.2rem;
        }

        /*aside*/
        aside {
            grid-area: aside;
            display: grid;
            background: #121212;
            border-radius: 20px;
            justify-content: start;
            align-content: start;
            grid-auto-rows: 40px;
            grid-gap: 1.5rem;
            padding: 1rem;
            grid-template-columns: 160px;
        }

        .opcao {
            display: grid;
            background: #8e8e8f;
            border-radius: 10px;
            justify-items: center;
            align-content: center;
        }

        /*main*/
        main {
            grid-area: main;
            display: grid;
            background: #121212;
            justify-content: stretch;
            align-content: stretch;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            grid-auto-rows: 220px;
            grid-gap: 15rem;
            padding: 5rem;
            border-radius: 10px;
            justify-items: stretch;
        }

        .item {
            display: grid;
            background: #8e8e8f;
            border-radius: 10px;
            justify-items: stretch;
            justify-content: space-evenly;
        }

        /*footer*/
        footer {
            grid-area: footer;
            display: grid;
            background: #121212;
            align-content: center;
            justify-content: center;
            border-radius: 20px;
        }

        @media(max-width: 650px) {
            aside {
                display: none;
            }

            .container {
                height: 100%;
                display: grid;
                grid-template-columns: 1fr;
                grid-gap: 1.5rem;
                justify-items: stretch;
                align-items: start;
                grid-template-areas:
                    'header'
                    'main'
                    'footer';
            }
        }

    </style>
</head>

<body class="container">
    <header>
        <nav class="nav-bar">
            <img class="nav-logo" src="{{ asset('image/suplemento.png') }}" alt="">
            <ul class="nav-itens">
                <li><a class="nav-link" href="">Home</a></li>
                <li><a class="nav-link" href="">Whey</a></li>
                <li><a class="nav-link" href="">BCAA</a></li>
                <li><a class="nav-link" href="">Creatina</a></li>
            </ul>
        </nav>
    </header>

    <aside>
        <div class="opcao">Menu</div>
        <div class="opcao">Roupas</div>
        <div class="opcao">Coqueteleiras</div>
        <div class="opcao">Acessórios</div>
        <div class="opcao">Anilias</div>
        <div class="opcao">Barras</div>
        <div class="opcao">Alteres</div>
        <div class="opcao">Maquinas</div>
        <div class="opcao">Manipulados</div>
        <div class="opcao">Creatina</div>
    </aside>

    <main>
        @foreach ($produtos as $produto)
            <div class="item">
                <p>{{ $produto->nome }}</p>
                <img src="storage/{{ $produto->imagem }}" alt="">
                <p>R$ {{ $produto->preco }}</p>
                @if ($produto->quantidade == 0)
                    <p>Esgotado</p>
                @else
                    <p>Quantidade: {{ $produto->quantidade }}</p>
                @endif
                <p>Descrição: {{ $produto->descricao }}</p>
            </div>
        @endforeach

    </main>

    <footer>
        <h3>Rodape</h3>
    </footer>
    </div>
</body>

</html>
