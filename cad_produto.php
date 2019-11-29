<?php
    session_start();
    include("conecta.php");
    $nomeprod = $_POST['nomeprod'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $sql = "INSERT INTO produto(nomeprod,quantidade,preco) VALUES ('$nomeprod','$quantidade','$preco')";
    if(mysqli_query($conn,$sql)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Produto cadastrado com sucesso!');
        window.location.href='produto.php';
        </script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Produto não foi cadastrado!');
        window.location.href='produto.php';
        </script>";
    }
    mysqli_close($conn);
?>