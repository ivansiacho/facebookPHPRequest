<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<title>Globers Planet</title>
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/jquery.tools.min.js"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>

</head>
<body>
<div id="fb-root"></div>
<!-- dialog container -->
<div id="user_login">
	<a class="close"></a>
	<!--<fb:login-button autologoutlink="true" perms="email,user_birthday,status_update,publish_stream,user_about_me"></fb:login-button>-->
    <div class="user_data">
        <div class="fb_button_container">
            <fb:login-button class="login_fb" size="large" login_text="Insertar datos" autologoutlink="true" perms=	"email,user_birthday,status_update,publish_stream,user_about_me"></fb:login-button>
            <span class="fb_advice">Ingresa tus datos con facebook</span>
        </div>
        <form id="login_form" action="send.php" name="form" enctype="multipart/form-data" method="post" >
          <div class="inputs_fields">   
              <label>Nombre </label>
              <input name="nombre" type="text" id="nombre" required/>
          </div>
           
          <div class="inputs_fields"> 
              <label>Ciudad</label>
              <input name="ciudad" type="text" id="ciudad" required/>
          </div>
          
          <div class="inputs_fields">   
            <label>Email</label> 
            <input name="email" type="email" id="email" required/>
          </div>
          
          
          
          <div class="profile_fields">
              <label>Perfil</label>
              <div class="profile_pic"></div>
              <div class="comment_field"> 
                <div class="arrow-left"></div>
                <label>Comentario</label>
                <textarea id="comentario" name="comentario" placeholder="Escribe tu comentario" required></textarea>
              </div>
              <br>
              <input name="foto" type="hidden" id="foto" required/>
              <input type="button" class="select_picture" value="Cargar Foto" /> 
              <input name="puesto" type="hidden" id="puesto" required/>
          </div>
          <div class="inputs_fields"> 
            <input type="submit" id="regist" value="Registrarse" />
          </div>
        </form>
    </div>
    <div class="clear"></div>
    <div class="picture_preview">
    <form id="form1" name="form1" action="uploader.php" enctype="multipart/form-data" method="post">
        <!--<input name="image" type="file" id="image">-->
        <input id="image" size="25" name="file" type="file" class="box"/> 
        <div class="preview"></div>
        <label>Confirmar imagen</label><input name="valido" type="checkbox" id="valido" />
        <input id="save_profile" type="button" value="guardar" />
        <input id="show_preview" type="submit" value="ver">
    </form>
    </div>
	<!--<input type="button" value="cargar fb" class="cargar_fb_datos"/>-->
	<div class="resultado_consulta">
	</div>
</div>
<!-- end dialog container -->

<!-- db request container -->
<?php
 mysql_connect("localhost","guacamay_globant","Codigo2011");
 mysql_select_db("guacamay_globant");  
 $re=mysql_query("select * from  users") or die(mysql_error());
 echo '<div class="cod_container">';
 while($f=mysql_fetch_array($re)){
 		echo'<div class="puesto_cont" id="'.$f['puesto'].'">
				<div class="image_cover">
					<div class="color_cover '.$f['color'].' gano'.$f['ganador'].'"></div>
					<img class="profile_thumb" src="'.$f['foto'].'"/>
				</div>
				<div class="info_dialog"><div class="arrow-left"></div>'.$f['comentario'].'<br><span>por '.$f['nombre'].'</span></div>
				
			</div>';
 }
 echo '</div>';
?>
<!-- end db request container -->
<!-- body container -->
<h1 class="title"><img src="img/logo-globant.jpg" alt="Globant we are ready" /></h1>
<div class="puestos_container">
	<?php   	
			for($i=1; $i<=98;$i++){ 
    ?>
            <div class="puesto" id="p<?php echo $i?>"></div>
    <?php } ?>
    <div class="clear"></div>
</div>
<!-- end container -->

<!--<div class="share" onClick="share();">compartir</div>
<div class="stream" onClick="showStream();">stream</div>
<div class="publish_stream" onClick="graphStreamPublish()">publicar</div>-->
 
<script src="js/main.js" type="text/javascript"></script>


</body>
</html>

