<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
</head>
<body>
<section>
    <form action="cad_produto.php" method="POST">
        <fieldset>
            <label>Nome do Produto</label>
            <input type="text" name="nomeprod"/><br/><br/>
            <label>Quantidade</label>
            <input type="text" name="quantidade"/><br/><br/>
            <label>Preço</label>
            <input type="number" name="preco"/><br/><br/>
            <button type="submit">Cadastrar</button>
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