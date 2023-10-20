<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Título de tu página</title>
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
                <th scope="col">Equipo</th>
                <th scope="col">Campo</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $datos = $data->todosEquipos();
            foreach ($datos as $equipo):
            ?>
            <tr>
                <?php 
                foreach ($equipo as $d):
                ?>
                <td><?php echo $d; ?></td>
                <?php 
                endforeach;
                ?>
            </tr>
            <?php 
            endforeach;
            ?>
        </tbody>
    </table>

    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>
