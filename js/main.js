// Facebook functions
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
// Facebook functions
	
// main functions
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
	 $('#form1').ajaxForm({ 
				target: '.preview', 
				success: function() { 
					$('.preview').fadeIn('slow'); 
				} 
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
					showStream();
				} 
    		});	
	//$("#login_form").validator();
	$(".select_picture").click(function(){
		$(".picture_preview").toggle();
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