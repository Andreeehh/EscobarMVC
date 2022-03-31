<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de veículos</title>
</head>

<body>
    <h1>Lista de veículos da loja</h1>
    <a
        href="/codeigniter-aula/index.php/veiculo/formnovo"
        style = "text-decoration: none; padding: 10px; border: 1px solid black; border-radius: 5px"
    >Novo</a>

    <table border="1">
        <tr>
            <td></td>
            <td>Marcar</td>
            <td>Modelo</td>
            <td>Cor</td>
            <td>Valor</td>
            <td>Foto</td>
        </tr>
        <?php
        //lista_veiculos = array()
        echo $tabela;
        ?>

    </table>
    <?php
    foreach ($lista_veiculos as $item) {
        echo '
            <div style="
                border: 1px #ccc solid; 
                border-radius: 5px;
                padding: 5px;
                width: 150px; 
                height: 175px; 
                float:left">
                <div>
                    <img src="' . $item->imagem . '" style="width:150px; max-height:80px;" />
                </div>
                <div style="text-align: center;">
                    <h1 style="font-size: 10px;">' . $item->modelo . '</h1>
                    <h2 style="font-size: 9px;">' . $item->marca . '</h2>
                    <h3 style="font-size: 8px;">' . $item->ano . '</h3>
                    <h4 style="font-size: 8px;">' . $item->valor . '</h4>
                </div>
            </div>
            ';
    }
    ?>
</body>

</html>