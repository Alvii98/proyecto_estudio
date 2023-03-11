<div class="scroll mb-3">
    <table class="table table-bordered text-light">
        <thead align="center">
            <tr>
                <th scope="col">Apellido</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Actividad</th>
            </tr>
        </thead>
        <tbody>

            <?php
                require_once 'clases/consultas.php';
                foreach (datos::alumnos() as $key) {
                    # code...
                    print '<form action="datos.php" target="_blank" method="POST" name="alumno_'.$key['id'].'"><input type="hidden" name="id" value="'.$key['id'].'"></form>';
                    print '<tr onclick="alumno_id('.$key['id'].')"><td>'.$key['apellido'].'</td>';
                    print '<td>'.$key['nombre'].'</td>';
                    print '<td>'.datos::obtener_edad($key['fecha_nac']).'</td>';
                    print '<td>'.$key['actividad'].'</td></tr>';
                }
            ?>
            <th colspan="6" id="no_result" class="text-center" style="display:none;">No se encontraron resultados</th>
        </tbody>
    </table>
</div>