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
                <h5 class="card-title">Badwords</h5>
                <a href="#" class="btn btn-primary">Button</a>

                <table class="table table-sm">
                    <caption>Lista de palavras</caption>
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Palavra</th>
                    </thead>
                    <tbody>
                        ...
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
                const message = ref('Hello vue!')
                return {
                    message
                }
            }
        }).mount('#app')
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>