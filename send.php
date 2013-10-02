<?php

$nombre=$_POST['nombre'];
$ciudad=$_POST['ciudad'];
$email=$_POST['email'];
$nombrefoto=$_POST['foto'];
$puesto=$_POST['puesto'];
$comentario=$_POST['comentario'];
//$ruta=$_FILES['foto']['tmp_name'];
$color = array("equipo1","equipo2","equipo3","equipo4","equipo5","equipo6","equipo7","equipo8","equipo9");
$colsel = rand(0,8);
$colorselected = $color[$colsel];

$destino =  $nombrefoto;
//copy($ruta,$destino);

 mysql_connect("localhost","guacamay_globant","Codigo2011");
 mysql_select_db("guacamay_globant");
 
//consultas datos
 
//consultas datos
 
$consult_data = mysql_query("SELECT * FROM `users` WHERE email = '$email' or puesto = '$puesto'"); 

// inserta datos 
 if((mysql_num_rows($consult_data)>0)){
	 ?>
	 <div class="info-participante">
     	<div class="title">Este registro ya fue enviado</div>
     	<div class="usuario_registrado">
        	Sus datos ya fueron registrados, verifique sus datos nuevamente.
        </div>
        <input class="reload" type="button" onClick="window.location.reload();" value="Haz click aquí para volver" />
     </div>
	<?php
 }
 else{	 
 mysql_query("INSERT INTO `users`( `nombre`, `ciudad`, `email`, `comentario`, `foto`, `puesto`, `color`) VALUES('$nombre','$ciudad','$email','$comentario','$destino','$puesto', '$colorselected')") or die(mysql_error());
 $consult_ganador =  mysql_query("SELECT * FROM `ganadores` WHERE puesto_ganador = '$puesto'");    
 	if((mysql_num_rows($consult_ganador)>0)){
	  mysql_query("UPDATE users SET ganador = 1 WHERE puesto = '$puesto'");	
     
	  ?>
      	  	<div class="info-participante">           	
            	<div class="datos-puesto">
            		<div class="lugar-puesto">
                    	<div class="foto">
                    		<img src="<?php echo $nombrefoto ?>" width="63" height="63" />
            			</div><!-- /foto -->
            			¡Felicitaciones <span class="name_select <?php echo $colorselected ?>"><?php echo $nombre ?></span> ingresaste al equipo <span class="color_select planet">PLANET!</span>
            		</div><!-- /lugar-puesto -->
            		<div class="texto-complemento">
            				Haz click en aceptar para observar tu puesto y tus compañeros de equipo
            				<span>
            					 ¡Comparte con tus globers ahora!
            				</span>  
            		</div>
                    <input class="reload" type="button" onClick="window.location.reload();" value="Aceptar" />
            	</div>
                
            </div><!-- /info-participante -->
      <audio id="win_audio">
          <source src="includes/audio01.ogg" type="audio/ogg" />
          <source src="includes/audio01.mp3" type="audio/mpeg" />
      </audio> 
      <script type="text/javascript">
	  	function win_audio(){
			$("#win_audio")[0].pause();
			$("#win_audio")[0].currentTime = 0;
			$("#win_audio")[0].play();
		}
	  	setTimeout (function(){
				win_audio();		
			},1000);
	  </script>
      <?php
 	}
    else{ 
	 
	  ?>
      <div class="info-participante">
            	<div class="datos-puesto">
                        <div class="lugar-puesto">
                            <div class="foto">
                            	<img src="<?php echo $nombrefoto ?>" width="63" height="63" />
                        	</div><!-- /foto -->
            				<span class="name_select <?php echo $colorselected ?>"><?php echo $nombre ?></span> ¡Ingresaste al <span class="color_select <?php echo $colorselected ?>"><?php echo $colorselected ?>!</span>
            		</div><!-- /lugar-puesto -->
            		<div class="texto-complemento">
            				Haz click en aceptar para observar tu puesto y tus compañeros de equipo
            				<span>
            					 ¡Comparte con tus globers ahora!
            				</span>
            		</div>
                    <input class="reload" type="button" onClick="window.location.reload();" value="Aceptar" />
            	</div>   
            </div><!-- /info-participante -->
      <audio id="lose_audio">
      	<source src="includes/audio02.ogg" type="audio/ogg" />
          <source src="includes/audio02.mp3" type="audio/mpeg" />
      </audio>
      <script type="text/javascript">
	  function lose_audio(){
			$("#lose_audio")[0].pause();
			$("#lose_audio")[0].currentTime = 0;
			$("#lose_audio")[0].play();
		}
	  setTimeout (function(){
				lose_audio();		
			},1000);	
	  </script>
      <?php
	}
  }
 
 

?>