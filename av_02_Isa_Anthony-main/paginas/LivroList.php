<?php
 include 'header.php';
 include 'menu.php';
 include '../bdclass.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $db = new DB();
        $db->conn();

        if(!empty($_GET['id'])){
            $db->destroy("livro",$_GET['id']);
          
            header('location: LivroList.php');
        }

        if(!empty($_POST)){
           $dados = $db->search("livro",$_POST);
        } else {
           $dados = $db->select("livro");
           
        }

    ?>
<div class="container mt-5"></div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body mg-5px">
    <div>
        <h3>Listagem de Livros</h3>

        <form action="LivroList.php" method="post">
            <select name="tipo">
                <option value="titulo">Titulo</option>
                <option value="paginas">Paginas</option>
                <option value="preco">Preço</option>
                <option value="genero">Genero</option>
            </select>
            <input type="text" name="valor" />
            <button type="submit">Pesquisar</button>
            <a href="LivroForm.php"> Cadastrar </a>
        </form>
    </div>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Paginas</th>
      <th scope="col">Preço</th>
      <th scope="col">Genero</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($dados as $item){
            echo "<tr>";
            echo "<th scope='row'>$item->id</th>";
            echo "<td>$item->titulo</td>";
            echo "<td>$item->paginas</td>";
            echo "<td>$item->preco</td>";
            echo "<td>$item->genero</td>";
            echo "<td><a href='LivroForm.php?id=$item->id'>Editar</a></td>";
            echo "<td><a onclick='return confirm(\"Deseja Excluir?\")'
                    href='LivrosList.php?id=$item->id'>Deletar</a>
                  </td>";
            echo "</tr>";   
        }
    ?>
  </tbody>
</table>

</div>
</div>
</div>
      </div>
      </div>

<?php include "./footer.php" ?>
<?php include "rodape.php" ?>