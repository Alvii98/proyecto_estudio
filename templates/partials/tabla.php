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
            <?php foreach (datos::alumnos() as $key) { ?>
                <form action="datos.php" target="_blank" method="POST" name="alumno_<?php print$key['id'];?>">
                    <input type="hidden" name="id" value="<?php print$key['id'];?>">
                </form>
                <tr onclick="alumno_id(<?php print$key['id'];?>)"><td><?php print$key['apellido'];?></td>
                <td><?php print$key['nombre'];?></td>
                <td><?php print datos::obtener_edad($key['fecha_nac']);?></td>
                <td><?php print$key['actividad'];?></td></tr>
            <?php } ?>
            <th colspan="6" id="no_result" class="text-center" style="display:none;">No se encontraron resultados</th>
        </tbody>
    </table>
</div>