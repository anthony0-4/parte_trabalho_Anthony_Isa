

<?php
 include './header.php';
 include 'menu.php';
 include '../bdclass.php';
?>

<?php
  $db = new DB();
  $db->conn();

  if(!empty($_POST['id'])){
    $db->update("livro",$_POST);
    header("location: LivroList.php");
    var_dump($_GET);
    exit();

  } else if($_POST){
    $db->insert("livro",$_POST);
    header("location: LivroList.php");
  }

  if(!empty($_GET['id'])){
    $livro = $db->find("livro", $_GET['id']);
  }
?>
    <div class="container mt-5">
    <h3>Formulário livro</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="LivroList.php" class="btn btn-danger float-end">Voltar</a>
                    </div>
                    <div class="card-body">
                        <form action="LivroForm.php" method="POST">
                            <div class="mb-3">
                            <input type="hidden" name="id" value="<?php echo !empty($livro->id) ? $livro->id :"" ?>">
                            </div>
                            <div class="mb-3">
                            <label for="titulo">Titulo</label><br>
        <input type="text" name="titulo" class="form-control" value="<?php echo !empty($livro->titulo) ? $livro->titulo :"" ?>">
                            </div>

                            <div class="mb-3">
                            <label for="paginas">Paginas</label><br>
        <input type="text" name="paginas" class="form-control" value="<?php echo !empty($livro->paginas) ? $livro->paginas :"" ?>">
                            </div>

                            <div class="mb-3">
                            <label for="preco">Preço</label><br>
        <input type="text" name="preco" class="form-control"  value="<?php echo !empty($livro->preco) ? $livro->preco :"" ?>">
                            </div>

                            <div class="mb-3">
                            <label for="genero">Genero</label><br>
        <input type="text" name="genero" class="form-control" value="<?php echo !empty($livro->genero) ? $livro->genero :"" ?>">
                            </div>

                            <div class="mb-3">
                            <button type="submit"><?php echo !empty($_GET['id']) ? "Editar" : "Salvar" ?></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "./footer.php" ?>
<?php include "rodape.php" ?>