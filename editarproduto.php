<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
</head>
<body>
<div align="center"><h1><b>Revisão Turbo</b></h1></div>
<hr/>
<table>
    <tr>
        <td>
            <a href='produto.php' style='text-decoration:none; font-weight:bold;'>Home</a> |
        </td>
        <td>
            <?php
                session_start();
                include("conecta.php");
                $user = $_SESSION["user"];
                echo $user;
                echo "&nbsp;|&nbsp;";
                echo "<a href='sair.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Sair&nbsp;</a>";
            ?>
        </td>
    </tr>
</table>
<br/>
<?php
    include("conecta.php");
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM produto WHERE id = '".$id."'") or die(mysqli_error($conn));
    while($produto = $sql->fetch_array()){
?>
<section>
    <form action="atualizaproduto.php?id=<?php echo $id; ?>" method="POST">
        <fieldset>
            <label>Nome do Produto</label>
            <input type="text" name="nomeprod" value="<?php echo $produto['nomeprod'];?>"/><br/><br/>
            <label>Quantidade</label>
            <input type="text" name="quantidade" value="<?php echo $produto['quantidade'];?>"/><br/><br/>
            <label>Preço</label>
            <input type="number" name="preco" value="<?php echo $produto['preco'];?>"/><br/><br/>
            <?php
            }
            ?>
            <button type="submit">Atualizar</button>
        </fieldset>
    </form>
    <br/>
    <hr/>
    <?php
        $sql = mysqli_query($conn, "SELECT * FROM produto ORDER BY nomeprod") or die(mysqli_error($conn));
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Nome do Produto</th>";
        echo "<th>Quantidade</th>";
        echo "<th>Preço</th>";
        echo "<th>Ações</th>";
        echo "</tr>";
        while ($produto = mysqli_fetch_array($sql)){
            $id = $produto['id'];
            echo "<tr>";
            echo "<td>".$produto['nomeprod']."</td>";
            echo "<td>".$produto['quantidade']."</td>";
            echo "<td>".$produto['preco']."</td>";
            echo '<td><a href="editarproduto.php?id='.$id.'">Editar</a>&nbsp;|&nbsp;<a href="apagarproduto.php?id='.$id.'">Excluir</a></td>';
        }
        echo "</table>";
        mysqli_close($conn);
    ?>    
</section>
<hr/>
</body>
</html>