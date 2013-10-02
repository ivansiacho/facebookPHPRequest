<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<script src="jquery-1.8.3.min.js" type="text/javascript"></script>
<!--<script src="http://cdn.jquerytools.org/1.2.7/tiny/jquery.tools.min.js"></script>-->
<script src="jquery.tools.min.js"></script>
<script src="jquery.form.js" type="text/javascript"></script>

<!--<script src="jquery.validate.js" type="text/javascript"></script>-->


<style type="text/css">
  body{
	  padding:0;
	  margin:0;
	  background:#000;
	  color:#fff;
	  font-family:Arial, Helvetica, sans-serif;
  }
.puesto {
  background: none repeat scroll 0 0 rgba(255,255,255,0.5);
  border-radius: 50%;
  box-shadow: 1px 1px 5px #666666;
  float: left;
  height: 50px;
  margin: 10px;
  width: 50px;
  position:relative;
  cursor:pointer;
}
  .puesto.selected,.puesto:hover{
	  background: none repeat scroll 0 0 rgba(255,255,255,0.8);
  }
  .cod_container{
	  display:none;
  }
  .clear{
	  width:100%;
	  clear:both;  
  }
  .puesto_cont{
  }
  .info_dialog {
  background: none repeat scroll 0 0 #FFFFFF;
  color: #666666;
  left: 115%;
  padding: 10px;
  position: absolute;
  top: 0;
  width: 180px;
  z-index: 1;
  display:none;
  }
  .info_dialog span{
	  font-size:11px;
	  color:#4862A3;
  }
  .puestos_container{
	  width:980px;
	  margin:0 auto;
  }
  .profile_thumb{
	 width:50px;
	 height:50px;
  }
  .profile_pic img{
	  width:50px;
	 height:50px;
  }
  #show_preview, #save_profile{
	  display:none;
  }
  .picture_preview{
	  display:none;
  }
  #user_login{
	  display:none;
	  width:740px;
	  left:25%;
	  padding:10px;
	  background:#D7DE20;
	  color:#333;
  }
  #user_login label{
	  color:#333;
  }
  .profile_pic{
	  border:1px dashed #fff;
	  padding:2px;
	  width:50px;
	  height:50px;
	  margin:5px 0;
	  display:inline-block;
	  position:relative;
	  bottom:45px;
  }
  #user_login .close {
    background-image: url("close.png");
    cursor: pointer;
    height: 35px;
    position: absolute;
    right: 5px;
    top: 5px;
    width: 35px;
	z-index:1;
}
.inputs_fields{
	margin:0 0 10px 15px;
	display:inline-block;
}
.inputs_fields label{
	display:block;
}
.user_data{
	width:400px;
	float:right;
	position:relative;
}
.profile_fields {
  left: -320px;
  position: absolute;
  top: 5px;
}
.profile_fields label{display:none;}
.comment_field{
	display: inline-block;
    left: 10px;
    position: relative;
    width: 230px;
}
.comment_field #comentario {
  border: 0 none;
  height: 95px;
  padding: 5px;
  resize: none;
  width: 220px;
}
div.styled {
  background: url("formelements-select.png") no-repeat scroll right -4px white;
  border: 1px solid #CCCCCC;
  /*box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);*/
  margin: 0;
  overflow: hidden;
  padding: 0;
  width: 160px;
}
div.styled.fix
{
	width:341px;
}

#regist, .select_picture, .reload {
  background: none repeat scroll 0 0 #48A7D6;
  border: 0 none;
  color: #FFFFFF;
  cursor: pointer;
  margin: 10px 0 0;
  padding: 5px;
  position: relative;
  text-align: center;
  width: 135px;
}
#enviar_registro {
    bottom: -5px;
    margin: 0 0 0 15px;
    padding: 5px 0;
    position: absolute;
    right: 20px;
    z-index: 1;
}
.inputs_fields input[type=text], .inputs_fields #email{
	width:160px;
	padding:0.3em 5px;
	border:0;
	margin:3px 0 0;
}
.inputs_fields.mail{
	position:relative;
	bottom:9px;
}
.interest_areas{
	position:relative;
	bottom:5px;
	left:15px;
}

.fb_button_container {
  margin: 0 0 10px 15px;
}
.fb_button_container span.fb_advice{
	position:relative;
	bottom:3px;
}
.error_captcha {
  display: block;
  font-size: 14px;
  left: 0;
  position: relative;
  top: 2px;
  width: 200px;
}
a.recaptcha_reload_btn {
  background: url("http://www.google.com/recaptcha/api/img/red/refresh.gif") no-repeat scroll 60px 0 #CA3421;
  border: 1px solid #4A0000;
  color: #FFFFFF;
  display: inline-block;
  padding: 0 26px 0 5px;
  text-decoration: none;
}
.image_cover {
  height: 100%;
  position: relative;
  width: 100%; 
  border-radius: 50%;
  overflow:hidden;
}
.color_cover{
	position:absolute;
	width:100%;
	height:100%;
	left:0;
	top:0;
	opacity:0.5;
	
}
.color_cover.gano1{
	background-image:url("planet.jpg");
	background-repeat:no-repeat;
	opacity:1;
	background-size:cover;
	background-position:center;
}
.color_cover.gano1:hover{
	opacity:0;
}
.color1{
	background-color:#63C;
}
.color2{
	background-color:#090;
}
.color3{
	background-color:#C00;
}
.color4{
	background-color:#09F;
}
.color5{
	background-color:#FC0;
}
.color6{
	background-color:#630;
}
.color7{
	background-color:#C3C;
}
.color8{
	background-color:#F30;
}
.color9{
	background-color:#6FF;
}
.arrow-left {
	width: 0; 
	height: 0; 
	border-top: 10px solid transparent;
	border-bottom: 10px solid transparent;	
	border-right: 10px solid white;
}
.info_dialog .arrow-left {
  margin: 0 0 0 -18px;
  position: absolute;
}
.comment_field .arrow-left {
  margin: 5px 0 0 -9px;
  position: absolute;
}
h1.title{
	text-align:center;
}
.datos-puesto{
	text-align:center;
}
.datos-puesto .lugar-puesto {
  font-size: 30px;
  margin: 0 0 20px;
}
.datos-puesto .lugar-puesto .foto {
  display: inline-block;
  margin: 0 15px 0 0;
  position: relative;
  top: 15px;
}
.datos-puesto .lugar-puesto .name_select, .datos-puesto .lugar-puesto .color_select{
  background: none repeat scroll 0 0 #FFFFFF;
  box-shadow: 1px 1px 5px #333333;
  color: #009900;
  font-size: 30px;
  padding: 5px;
}
.datos-puesto .texto-complemento{
	font-size:20px;
}
.datos-puesto .texto-complemento span{
	font-size:16px;
	display:block;
}
  </style>
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
<h1 class="title"><img src="logo-globant.jpg" alt="Globant we are ready" /></h1>
<div class="puestos_container">
	<?php   
		//$f=mysql_fetch_array($re);
		
			for($i=1; $i<=98;$i++){ 
			
            /*$p = 'p'.$i;
			
			if($p == $f['puesto'])
			{
				echo'<div class="puesto" id="'.$f['puesto'].'"><div class="info_dialog gano'.$f['ganador'].'">'.$f['nombre'].'<br>'.$f['email'].'</div><img class="profile_thumb" src="'.$f['foto'].'"/></div>';
			$f=mysql_fetch_array($re);	
				
			}
			else{
				echo'<div class="puesto" id="'.$p.'"></div>';
			}*/
			
	 
    ?>
            <div class="puesto" id="p<?php echo $i?>"></div>
    <?php } //http://thinkdiff.net/demo/newfbconnect1/newconnect.php?>
    <div class="clear"></div>
</div>
<!-- end container -->
<div class="share" onClick="share();">compartir</div>
<div class="stream" onClick="showStream();">stream</div>
<div class="publish_stream" onClick="graphStreamPublish()">publicar</div>
<textarea rows="5" cols="50" id="status">Write your status here and click 'Status Set Using Legacy Api Call'</textarea>
<a onclick="setStatus(); return false;" href="#">Status Set Using Legacy Api Call</a>
 

<script type="text/javascript">
	window.fbAsyncInit = function() {
		FB.init({appId: '239728666173010', status: true, cookie: true, xfbml: true});

		/* All the events registered */
		FB.Event.subscribe('auth.login', function(response) {
			// do something with response
			login();
		});
		FB.Event.subscribe('auth.logout', function(response) {
			// do something with response
			logout();
		});

		FB.getLoginStatus(function(response) {
			if (response.session) {
				// logged in and connected user, someone you know
				login();
			}
		});
	};
	(function() {
		var e = document.createElement('script');
		e.type = 'text/javascript';
		e.src = document.location.protocol +
			'//connect.facebook.net/en_US/all.js';
		e.async = true;
		document.getElementById('fb-root').appendChild(e);
	}());

	function login(){
		FB.api('/me', function(response) {
			
			
			 fqlQuery();
			 $(".select_picture").hide();
		});
		
	}
	function logout(){
		$(".select_picture").show();
	}

	//stream publish method
	function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){
		FB.ui(
		{
			method: 'stream.publish',
			message: '',
			attachment: {
				name: name,
				caption: '',
				description: (description),
				href: hrefLink
			},
			action_links: [
				{ text: hrefTitle, href: hrefLink }
			],
			user_prompt_message: userPrompt
		},
		function(response) {

		});

	}
	function showStream(){
		FB.api('/me', function(response) {
			//console.log(response.id);
			streamPublish(response.name, 'Esta buscando el equipo PLANET! Encuentralo tu en www.globant.com', 'Elige tu equipo', 'http://www.globant.com/', "Share globant.com");
		});
	}

	function share(){
		var share = {
			method: 'stream.share',
			u: 'http://www.globant.com/'
		};

		FB.ui(share, function(response) { console.log(response); });
	}

	function graphStreamPublish(colSelect){
		var body = 'Fue asignado al equipo '+colSelect+' Sigue la busqueda del equipo PLANET en www.globant.com';
		FB.api('/me/feed', 'post', { message: body }, function(response) {
			if (!response || response.error) {
				//alert('Error occured');
			} else {
				//alert('Post ID: ' + response.id);
			}
		});
	}

	function fqlQuery(){
		FB.api('/me', function(response) {
			 var query = FB.Data.query('select name, hometown_location, sex, pic_square, email from user where uid={0}', response.id);
			 query.wait(function(rows) {
			   var fb_email = rows[0].email;
			   var fb_city = rows[0].hometown_location;
			   var fb_city_name;
			   if(fb_email==null)
			   {
				   fb_email='';
			   }
			   if(fb_city==null){
			       fb_city_name='';
			   }
			   else{
				   fb_city_name = rows[0].hometown_location['name'];
			   }
				 /* document.getElementById('name').innerHTML =
				 '<div class="fb_profile">' + rows[0].name + '</div>' +
				 '<img class="fb_picture" src="' + rows[0].pic_square + '" alt="" />' +
				 '<div class="fb_city"' + fb_city_name + '</div>' +
				 '<div class="fb_email">' + fb_email + '</div>';*/
				 $("#nombre").val(rows[0].name);
				 $("#email").val(fb_email);
				 $("#ciudad").val(fb_city_name);
				 $("#foto").val(rows[0].pic_square);
				 $(".profile_pic").html('<img class="fb_picture" src="' + rows[0].pic_square + '" alt="" />');
			     $(".select_picture").hide();
			 });
		});
	}

	function setStatus(){
		status1 = document.getElementById('status').value;
		FB.api(
		  {
			method: 'status.set',
			status: status1
		  },
		  function(response) {
			if (response == 0){
				alert('Your facebook status not updated. Give Status Update Permission.');
			}
			else{
				alert('Your facebook status updated');
			}
		  }
		);
	}

</script>
<script type="text/javascript">


$(function(){
	
	$(".puesto").click(function(){
		
		var pcheck = $(this).attr("id");
		var cont = $(this).html();
		if(cont==""){
			$("#puesto").val(pcheck);
			$(".puesto").removeClass("selected");
			$(this).addClass("selected");
			openlogin();
		}
	});
	var eche = $(".cod_container > div:nth-child(n)");
	for(var j=1; j<=60; j++){	
		for(var i=1; i<=eche.length; i++){
			var codigo = $(".cod_container > div:nth-child("+i+")").attr("id");			
			var code = $(".puestos_container > div:nth-child("+j+")").attr("id");
			if(codigo == code){
				var insert = $(".cod_container > div:nth-child("+i+")").html();
				$(".puestos_container > div:nth-child("+j+")").append(insert);
			}
		}
	}
	$("#valido").change(function(){
		$("#image").toggle();
		$("#save_profile").toggle();
	});
	$("#image").change(function(){
			$('#show_preview').click();
			
	});
	$("#save_profile").click(function(){
		var tmp_img = $(".tmp_image").attr('src');
		var prof_img = tmp_img.replace('tmp/','fotos/');
		//var img_name = prof_img.replace('fotos/','');
		$("#foto").val(prof_img);
		$('#show_preview').click();
		setTimeout(function(){$(".profile_pic").html('<img class="fb_picture" src="'+prof_img+'"/>');},2000);
	});
	//$('#login_form').NiceIt();
	 $('#form1').ajaxForm({ 
				target: '.preview', 
				success: function() { 
					$('.preview').fadeIn('slow'); 
				} 
    		});
	/*$('#captcha').submit(function() { // catch the form's submit event
			$.ajax({ // create an AJAX call...
				data: $(this).serialize(), // get the form data
				type: $(this).attr('method'), // GET or POST
				url: $(this).attr('action'), // the file to call
				success: function(response) { // on success..
					$('#enviar_registro').html(response); // update the DIV
				}
			});
			return false; // cancel original event to prevent form submitting
		});*/
		$('#captcha').ajaxForm({ 
				target: '#enviar_registro', 
				success: function() { 
						$('#enviar_registro').fadeIn('slow');
						
				} 
    		});
		$('#captcha_hide').click(function(){
			$('.error_captcha #recaptcha_reload_btn').click();
		});		
	$('#login_form').ajaxForm({ 
				beforeSubmit: validate,
				target: '.resultado_consulta', 
				success: function() { 
					$(".user_data").hide();
					$(".close").hide();
					var color_sel = $(".color_select").html();
					//alert(color_sel);
					 graphStreamPublish(color_sel);
					$(".resultado_consulta").find("script").each(function(i) {
                    eval($(this).text());
                	});
				} 
    		});	
	//$("#login_form").validator();
	$(".select_picture").click(function(){
		$(".picture_preview").show();
	});
	
	setTimeout(function(){		
		fqlQuery();
	},1000);
	
	$(".image_cover").hover(function(){
		$(this).parent().find(".info_dialog").fadeIn("fast");
	},function(){
		$(this).parent().find(".info_dialog").fadeOut("fast");
	});
	
	function openlogin(){
		$("#user_login").overlay({
			top: 100,
			mask: {
				color: '#000',
				loadSpeed: 200,
				opacity: 0.5
			},
			closeOnClick: false,
			load: true
		});
		$("#user_login").overlay().load();
	}
	
	
	function lose_audio(){
		$("#lose_audio")[0].pause();
		$("#lose_audio")[0].currentTime = 0;
		$("#lose_audio")[0].play();
	}
	
	function win_audio(){
		$("#win_audio")[0].pause();
		$("#win_audio")[0].currentTime = 0;
		$("#win_audio")[0].play();
	}
	
});

function validate(formData, jqForm, options) { 
    // formData is an array of objects representing the name and value of each field 
    // that will be sent to the server;  it takes the following form: 
    // 
    // [ 
    //     { name:  username, value: valueOfUsernameInput }, 
    //     { name:  password, value: valueOfPasswordInput } 
    // ] 
    // 
    // To validate, we can examine the contents of this array to see if the 
    // username and password fields have values.  If either value evaluates 
    // to false then we return false from this method. 
 
    for (var i=0; i < formData.length; i++) { 
        if (!formData[i].value) { 
            alert('Todos los campos deben estar completos'); 
            return false; 
        } 
    } 
}
/*function setsubmit()
	{
	  document.form1.target='_self';
	  document.form1.action='archivo_que_procesa_tu_form';
	  document.form1.submit(); 
	   
	}*/
	

</script>

</body>
</html>

