<div class="table table-responsive div_tabla_historial">
    <table id="tabla_historial" name="tabla_historial" class="table table-responsive bg-light ">
    <thead>
        <tr>
        <th scope="col">Data historial</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if (file_exists("historial.txt")){
        $file = fopen("historial.txt", "r");
        while(!feof($file)){ 
            $data = fgets($file); ?>
            <tr>
                <td><?php echo nl2br($data);?></td>
            </tr>
        <?php  }
        } fclose($file);?>
    </tbody>
    </table>
</div>