<div id="form">
    <form>
        <table border="0">
            <thead>
                <tr>
                  <th>Id</th>
                  <th>Login</th>
                  <th>Password</th>
                  <th>Nombre</th>
                </tr>
            </thead>
           
                
        

        
   
            <tbody>
                <tr>
            
                    <td ><input type="text" id="tfId" value="" size="15" required /></td>
                    <td><input type="text" id="tfLogin"    value="" size="25" required /></td>
                    <td><input type="text" id="tfPassword"   value="" size="25" required /></td>
                    <td><input type="text" id="tfNombreU"   value="" size="25" required /></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input  type="button" id="btnRegUsuario" value="Insertar" />
                        <button type="button" id="btnMosAlumno">Mostrar</button>
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

   