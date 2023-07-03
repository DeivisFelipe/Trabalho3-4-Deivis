<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trabalho de Redes 3-4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <style>
        body {
            background-image: url(http://servicosweb.cnpq.br/wspessoa/servletrecuperafoto?tipo=1&id=K4537825A9);
            background-size: 119px;
            color: rgb(0,255,0);
            font-family: cursive;
        }

        .card{
            background-color: rgba(255,255,255,0.8);
            color: rgb(0,255,0);
            font-family: cursive;
        }

        h3 {
            background: blue;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
        }

        h1 {
            background: blue;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
        }

        ul {
            background: yellow;
            border: 2px solid black;
            border-radius: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .card {
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            transform: rotate(-10deg);
            box-shadow: 0 0 11px rgba(33, 33, 33, .2);
        }

        img {
            width: 100%;
            height: 100%;
            opacity: 0.2;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <div id="app" class="container">
        <h1 class="mt-3">Trabalho de Redes</h1>
        <h3 class="mt-3">Gerênciador de Badwords</h3>
        <h3 class="mt-3">Alunos:</h3>
        <ul>
            <li>Deivis Felipe</li>
            <li>Eduardo de Medeiros</li>
            <li>Matheus Machado</li>
            <li>Yuri Moraes</li>
            <li>Arthur</li>
        </ul>

        <img src="https://neweasterneurope.eu/new_site/wp-content/uploads/2022/02/StandwithUkraine.jpg" />
        
        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title row">
                    <h5 class="col-5">Badwords</h5>
                    <div class="col-5">
                        <input type="text" class="form-control" v-model="palavra" placeholder="Digite a palavra">
                    </div>
                    <div class="col-2">
                        <a @click="addPalavra()" class="btn btn-primary float-end">Adicionar Palavra</a>
                    </div>

                    <div class="p-3">
                        <table class=" table table-sm">
                            <caption>Lista de palavras</caption>
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">Palavra</th>
                                <th scope="col">Ações</th>
                            </thead>
                            <tbody>
                                <tr v-for="(palavra, index) in palavras" :key="index">
                                    <th scope="row">@{{ index }}</th>
                                    <td style="width: 80%">@{{ palavra }}</td>
                                    <td>
                                        <i @click="deletePalavra(palavra)" class="bi bi-trash3-fill" style="color: red"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

        <script>
            const {
                createApp,
                ref
            } = Vue

            createApp({
                setup() {
                    let palavras = ref([])
                    let palavra = ref('')

                    function getPalavras() {
                        fetch('/api/palavras')
                            .then(response => response.json())
                            .then(data => palavras.value = data)
                    }

                    function addPalavra() {
                        fetch('/api/palavras', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    palavra: palavra.value
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                getPalavras()
                                palavra.value = ''
                            })
                    }

                    function deletePalavra(palavra) {
                        fetch('/api/palavras/' + palavra, {
                                method: 'DELETE'
                            })
                            .then(response => response.json())
                            .then(data => {
                                getPalavras()
                            })
                    }

                    getPalavras()

                    return {
                        palavras,
                        palavra,
                        deletePalavra,
                        addPalavra
                    }
                }
            }).mount('#app')
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>