

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../templates/header.php';
        require_once '../persistance/conf/PersistentManager.php';
        require_once '../persistance/DAO/dataDAO.php';
        $data = new dataDAO();
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Equipo Local</th>
                    <th scope="col">Equipo Visitante</th>
                    <th scope="col">Resultado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $datos = $data->todosResultados();
                foreach ($datos as $resultado):
                    ?>
                    <tr>
                        <?php
                        foreach ($resultado as $r):
                        ?>
                            <td><?php echo $r; ?></td>
                        <?php
                        endforeach;
                        ?>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>


        <script src="..\assets\js\bootstrap.js"></script>
    </body>
</html>
