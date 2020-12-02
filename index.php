<!DOCTYPE html>
<html lang="es">

<head>

    <?php 

    try{
        $pdo=new PDO("mysql:host=localhost;dbname=automotora;charset=utf8", "root","");
       $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    
    }catch(PDOException $e){
    echo $e->getMessage();
    }

if(isset($_POST['brnGardar'])){
   $rut=$_POST['rut'];
   $nombre=$_POST['nombre'];
   $vehiculo=$_POST['vehiculo'];
   $costo=$_POST['costo'];
   $numero=$_POST['dias'];
   $obs=$_POST['obs'];
   $pago=$_POST['pago'];
   $fecha=$_POST['date'];

   
 $sql="INSERT INTO arriendos (rut_arr, nombre_arr, patente_arr, costo_arr, dias_arr, observacion_arr, formapago_arr, fecha_arr) 
 VALUES (?,?,?,?,?,?,?,?)";
 $smt=$pdo->prepare($sql);
 $smt->execute([$rut, $nombre,$vehiculo,$costo,$numero,$obs,$pago,$fecha]);



   
}



?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <header>
            <h1>Formulario de regirstro de Arriendo de Vehiculos</h1>
        </header>
        <div class="contenedor">
            <div>
                <label for="rut">Rut Cliente</label>
                <input type="number" name="rut" id="rut" placeholder="Rut">
            </div>
            <div>
                <label for="nombre">Nombre Cliente</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            </div>
            <div>
                <label for="vehiculo">Vehiculo</label>
                <select name="vehiculo" id="vehiculo">
                    <option value="">Seleccione</option>

                    <?php 
               
                $smt=$pdo->query("SELECT patente, marca FROM automovil");
                //$smt=$pdo->execute();
              while($row=$smt->fetch(PDO::FETCH_ASSOC)){

                echo "<option value='". $row['patente']."'>".$row['marca']."</option>";
                   
               }
               ?>

                </select>
            </div>
            <div>
                <label for="costo">Costo x Dia</label>
                <input type="number" name="costo" id="costo" Placeholder="Costo por Dia">
            </div>

            <div>
                <label for="dias">Numeros de Dias</label>
                <select name="dias" id="dias">
                    <option value="">Seleccione</option>
                    <?php 
            
            $smt=$pdo->query("SELECT dias_arr FROM arriendos"); 
            while($row =$smt->fetch(PDO::FETCH_ASSOC)){
                echo "<option value='".$row['numero_arr']."'>".$row['dias_arr']."</option>";
            }
        
            
            ?>

                </select>

            </div>
            <div>
                <label for="obs">Observacion </label>
                <textarea name="obs" id="obs" cols="30" rows="5"></textarea>
            </div>

            <div>
                <label for="pago">Forma de Pago</label>
                <select name="pago" id="pago">
                    <option value="">Seleccione</option>
                    <?php 
            $smt=$pdo->query("SELECT formapago_arr FROM arriendos"); 
            while ($row=$smt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value'".$row['numero_arr']."'>".$row['formapago_arr']."</option>";
            }
            
            ?>

                </select>

            </div>
            <div>
                <label for="fecha">Fecha</label>
                <input type="date" name="date" id="date">
            </div>
            <div>
                <input type="submit" value="Gurdar" id="btnGuardar" name="brnGardar">
                <input type="reset" value="Restablecer" id="btnReset">
            </div>
        </div>
        <table border=1px>
            <tr>
                <th>Numero</th>
                <th>Nombre del Cliente</th>
                <th>Patente</th>
                <th>F. Pago</th>
                <th>Accion </th>
                
            </tr>
        
        <?php 
        $smt=$pdo->query("SELECT numero_arr, nombre_arr, patente_arr, formapago_arr FROM arriendos"); 
        //$automovil=$smt->fetchAll(PDO::FETCH_OBJ); 
        ?>
            
            <?php foreach($smt as $automovil){ ?>

            <tr>
            <td><?php echo $automovil['numero_arr']?></td>
            <td><?php echo $automovil['nombre_arr'] ?></td>
            <td><?php echo $automovil['patente_arr']?></td>
            <td><?php echo $automovil['formapago_arr']?></td>
            <td><a href="#"> Eliminar</td></a>
            <td ><a href="#">Actualizar</td></a> 
            </tr>
            <?php } ?>
        </table>

    </form>
</body>

</html>