<?php
    session_start();
    include ("conecta.php");
    $id = $_GET['id'];
    $nomeprod = $_POST['nomeprod'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $sql = "UPDATE produto SET nomeprod = '$nomeprod',quantidade = '$quantidade',preco = '$preco' WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Produto atualizada com sucesso!');
        window.location.href = 'produto.php';
        </script>";
    } else {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Não foi possível atualizar o produto!');
        window.location.href = 'produto.php';
        </script>";
    }
    mysqli_close($conn);
?>