
    <?php 

    session_start();


    $connect = mysqli_connect("localhost", "root", "", "agestor1");

    $query = "SELECT distinct departamentos.departamento, COUNT(id_departamento) as DepartamentosEmpleados FROM departamentos INNER JOIN usuarios on departamentos.id = usuarios.id_departamento group by departamentos.id;";
    $result = mysqli_query($connect, $query);
    $i=0;
    while ($row = mysqli_fetch_array($result)) {
        $label[$i] = $row["DepartamentosEmpleados"];
        $label2[$i] = $row["DepartamentosEmpleados"];
        $count[$i] = $row["DepartamentosEmpleados"];
        $i++;
    }

    ?>
