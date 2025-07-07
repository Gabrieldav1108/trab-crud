<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <a href="" class="btn btn-primary">Sair</a>
        </div>
    </nav>
    <div class="container border border-1 border-dark rounded p-4 my-4 shadow">
        <a href="./create.php" class="btn btn-dark mb-2">Adicionar nova serie</a>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between aling-items-center">
                <a href="{{ route('seasons.index', $serie->id) }}">Serie um</a>
                   
                <span class="d-flex">
    
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                        Editar
                    </a>
    
                    <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                        <button class="btn btn-danger btn-sm">
                            Deletar
                        </button>
                    </form>
    
                </span>
            </li>
        </ul>    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>