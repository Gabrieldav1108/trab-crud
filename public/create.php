<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Adicionar</title>
</head>
<body>
    <?php
        require_once '../db_connection.php';
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <a href="" class="btn btn-primary">Sair</a>
        </div>
    </nav>
    <div class="container border border-1 border-dark rounded p-4 my-4 shadow">
        <h1>Nova série</h1>

        <form action="proc_form.php" method="post">            
            <div class="column mb-3">
    
                <div class="col-9">
                    <label for="titulo" class="form-label">Título:</label>
                    <input 
                    autofocus
                    type="text" 
                    name="titulo"
                    class="form-control" >
                </div>
                <div class="col-9">
                    <label for="diretor" class="form-label">Diretor:</label>
                    <input 
                    type="text" 
                    name="diretor" 
                    class="form-control">
                </div>
                <div class="col-9">
                    <label for="diretor" class="form-label">Genêro</label>
                    <select class="form-select" name="genero_id" aria-label="Default select example">
                        <option selected>Escolha o genêro</option>
                        <?php
                            if ($con) {
                                $sql = "SELECT * FROM generos ORDER BY genero";

                                $generos = mysqli_query($con, $sql);
                                
                                foreach ($generos as $genero) {
                                    echo ("<option value='$genero[id]'>$genero[genero]</option>");
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-9">
                    <label for="duracao" class="form-label">Duração(em minutos):</label>
                    <input 
                    type="number" 
                    name="duracao" 
                    class="form-control">
                </div>
                <div class="col-9">
                    <label for="lancamento" class="form-label">Ano de lançamento:</label>
                    <input 
                    type="date" 
                    name="lancamento" 
                    class="form-control">
                </div>
                <div class="col-9">
                    <label for="plataforma" class="form-label">Plataforma:</label>
                    <input 
                    type="text" 
                    name="plataforma" 
                    class="form-control">
                </div>
    
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>