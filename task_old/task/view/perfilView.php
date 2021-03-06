<!-- cabecera navbar-->
<?php 

$usuarios= $_SESSION["usuario"]; 
include_once '.\view\viewGenerico\cabecera.php'; 

$idUsuario="";
$email="";
foreach ($_SESSION["usuario"] as $usu){$idUsuario= $usu["idUsuario"];$email=$usu["email"];}
    ?>  

<!-- main -->
 <main class="dev">
        <!-- Sidebar Perfil -->
        <aside class="lateral dev">
            <div  style="height:400px">
              <img src="./assets/img/avatar.jpg" alt="Foto perfil">
            <?php 
          
            foreach($usuarios as $usuario) {?>
              <h1> <?php echo $usuario["nombre"]; ?> </h1>
              <h3> <?php echo $usuario["email"]; ?> </h3>
              <h3>  <?php echo $usuario["telefono"]; ?></h3>
               <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalEditar">Editar</a></button>
             
            <?php } ?>
                    <button type="button" id="invitaciones" class="btn btn-dark" data-toggle="modal" data-target="#aceptarInvitaciones">
                            Invitaciones&nbsp;&nbsp;<span class="badge badge-info"><?php echo $data['numeroDeInvitaciones']?></span></a>
                    </button> 
                     <?php if($data['numeroDeInvitaciones']==0) {?>
                            <script>
                                $(document).ready(function(){
                                   
                                   $('#invitaciones').attr('disabled',true);

                                });
                            </script>
                    <?php } ?>
                  
                     <hr>
               
            </div>
           
          <div id="proyecto">
              
                
                 
          </div>
          <!-- SECTION PARA boton nuevos proyectos-->  
        
        
          <div id="social">            <!-- Social -->
            <a href="#" class="dev">
                <img src="./assets/img/mail.png" alt="Correo-e">
                <span>Correo-e</span>
            </a>
          
            <a href="#" class="dev">
                <img src="./assets/img/twitter.png" alt="Twitter">
                <span>Twitter</span>
            </a>
            </section>  
          </div>
        
        </aside>
        <!-- Contenido PROYECTOS-->
        <section class="contenido dev">
            <h1>MIS PROYECTOS</h1>
           
            
            <!--Proyecto by David -->
           
            <ul class="dev">
                <?php foreach($data["proyectos"] as $proyecto) {?>
                     <div id="positproyecto">           
                        <img src="./assets/img/amarillo2.png" alt="posit proyecto" id="posit">
                         <div>  
                             <p> Nombre: <?php echo $proyecto["nombre"]; ?> -</p>
                             <p>Descripcion: <?php echo $proyecto["descripcion"]; ?> -</p>
                             
                             <?php if($proyecto['tipo']=='creador') {?>
                             <a href="index.php?controller=proyecto&action=delete&idUsuario=<?php echo $idUsuario ?>&idProyecto=<?php echo $proyecto['idProyecto']; ?>" class="btn btn-danger">Eliminar</a>&nbsp;
                              <?php } ?>
                             <a href="index.php?controller=proyecto&action=proyectoVista&idProyecto=<?php echo $proyecto['idProyecto'];?>" class="btn btn-info">Ir Proyecto</a>&nbsp;
                         </div>   

                    </div>
                <?php } ?>
            </ul>
            <button type="button" id="botonNproyecto" class="btn btn-info btn-lg" data-toggle="modal" data-target="#proyectoNuevo">Nuevo Proyecto</a></button>    
        </section>
        
<!-- Modal modificar -->
    <div class="modal fade" id="modalEditar" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modificar mis datos</h4>
                </div>
                <div class="modal-body">
    <form action="index.php?controller=usuarios&action=update" method="post" class="col-lg-5">
         <?php foreach($usuarios as $ususario) {?>           
                Nombre:<input type="text" name="nombre" value="<?php echo $ususario["nombre"]; ?> " class="form-control"/>
                Apellido 1º:<input type="text" name="apellido1" value="<?php echo $ususario["apellido1"]; ?>" class="form-control"/>
                Apellido 2º:<input type="text" name="apellido2" value="<?php echo $ususario["apellido2"]; ?>" class="form-control"/>
                Email:<input type="text" name="email" value="<?php echo $ususario["email"]; ?> " class="form-control"/>
                Contraseña:<input type="text" name="contrasena" value="<?php echo $ususario["contrasena"]; ?> " class="form-control"/>
                telefono:<input type="text" name="telefono" value="<?php echo $ususario["telefono"]; ?>" class="form-control"/>                
                   <input type="hidden" name="id" value="<?php echo $ususario["idUsuario"]; ?>">
                      <input type="submit" value="enviar" class="btn btn-success"/>                 
     </form>
                    
                      <?php  }?>
                </div>
                  <div class="modal-footer">
                <form action="index.php?controller=usuarios&action=baja" method="post" class="col-lg-5">
                       <input type="hidden" name="email" value="<?php echo $email ?>">
                       <input type="submit"  value="Baja" class="btn btn-success">
                  </form>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
                </div>
              
            </div>

        </div>
    </div>
<!-- modal proyecto nuevo -->
     <div class="modal fade" id="proyectoNuevo" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
               
                    <h4 class="modal-title">Datos del Proyecto</h4>
                </div>
                <div class="modal-body">
                     <form action="index.php?controller=proyecto&action=alta&idUsuario=<?php echo $idUsuario ?>" method="post">
                    <h3>Crear Proyecto</h3>
                    <hr/>
                    Nombre: <input type="text" name="nombre" class="form-control"/>
                    Descripcion: <input type="text" name="descripcion" class="form-control"/>
                    <input type="submit" value="Crear" class="btn btn-success"/>   
                </form>
                </div>
                <div class="modal-footer">
                  
                </div>
            </div>

        </div>
    </div>

<!--prueba -->
 <div class="modal fade" id="aceptarInvitaciones" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <ul class="list-group">
                    <li class="list-group-item disabled">Invitaciones</li>
                    <?php foreach($data["invitaciones"] as $invitaciones) {?>
                    <li class="list-group-item">
                        Proyecto: <?php echo strtoupper($invitaciones["nombre"]); ?> 
                        <a href="index.php?controller=proyecto&action=deleteInvitacion&idProyecto=<?php echo $invitaciones["idProyecto"];?>&idUsuario=<?php echo $invitaciones["idUsuario"]; ?>" class="btn btn-danger">Rechazar</a>&nbsp;
                        <a href="index.php?controller=proyecto&action=aceptarInvitacion&idProyecto=<?php echo $invitaciones["idProyecto"];?>&idUsuario=<?php echo $invitaciones["idUsuario"]; ?>"" class="btn btn-info">Aceptar</a>&nbsp;
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
  </div>

<!-- fin : prueba -->

</main>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="./assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>



