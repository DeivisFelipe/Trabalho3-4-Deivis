<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trabalho de Redes 3-4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
                            </thead>
                            <tbody>
                                <tr v-for="(index, palavra) in palavras" :key="index">
                                    <th scope="row">@{{ index }}</th>
                                    <td>@{{ palavra }}</td>
                                </tr>
                            </tbody>
                        </table>
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

                        getPalavras()

                        return {
                            palavras,
                            palavra
                        }
                    }
                }).mount('#app')
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>