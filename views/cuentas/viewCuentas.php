<div id="form">
    <form>
        <table border="0">
            <thead>
                <tr>
                  <th>id</th>
                  <th>nombre</th>
                  <th>contraseña</th>
                  <th>Estado</th>
                  <th>tipo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" id="tfClave" value="" size="5" required /></td>
                    <td><input type="text" id="tfNombre"    value="" size="25" required /></td>
                    <td><input type="text" id="tfPassword"   value="" size="25" required /></td>
                    <td><input type="text" id="tfEstado"   value="" size="25" required /></td>
                    <td><input type="text" id="tfTipo"   value="" size="25" required /></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input  type="button" id="btnRegCuenta" value="Insertar" />
                        <button type="button" id="btnMosCuenta">Mostrar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>  
<div id="resultados">
<?php
    if(isset($data))
    {
        echo $data;
    } 
    ?>
    
</div>
