<!DOCTYPE html>
<html lang="hr">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Contact</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#submit_btn").click(function() { 
       
	    var proceed = true;
        // validizacija, ako je prazno promjeniti u crveno polje
       	
		$("#contact_form input[required=true], #contact_form textarea[required=true]").each(function(){
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ //ako je ovo polje prazno
				$(this).css('border-color','red'); //promjeni u crveno  
				proceed = false; 
			}
			//validizacija emaila
			var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
				$(this).css('border-color','red'); 
				proceed = false; 				
			}	
		});
       
        if(proceed) //ako je sve dobro nastavi
        {
			//dohvatanje unesenih podataka za slanje serveru
            post_data = {
				'user_name'		: $('input[name=name]').val(), 
				'user_email'	: $('input[name=email]').val(), 
				'country_code'	: $('input[name=phone1]').val(), 
				'phone_number'	: $('input[name=phone2]').val(), 
				'subject'		: $('select[name=subject]').val(), 
				'msg'			: $('textarea[name=message]').val()
			};
            
            //ajax postavljanje podataka na server 
            $.post('contact_me.php', post_data, function(response){  
				if(response.type == 'error'){ //load json data sa server      
					output = '<div class="error">'+response.text+'</div>';
				}else{
				    output = '<div class="success">'+response.text+'</div>';
					//osvjezavanje rezultata
					$("#contact_form  input[required=true], #contact_form textarea[required=true]").val(''); 
					$("#contact_form #contact_body").slideUp(); //sakriti body ako je uspjesno salnje
				}
				$("#contact_form #contact_results").hide().html(output).slideDown();
            }, 'json');
        }
    });
   
    $("#contact_form  input[required=true], #contact_form textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#result").slideUp();
    });
});
</script>
</head>

<body>

	
</head>
<body class="formsty">
  
  <header role="banner" class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
              <a class="navbar-brand" href="#">  <a target="_blank" href="images/z_grb.png">
				<img id="grb" src="images/z_grb.png"  title="coat of arms" width="60" height="79"></a></a>
		</div>
        <div class="navbar-inverse side-collapse in">
          <nav role="navigation" class="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="http://localhost/PROJEKT_IP/projekt.html">Home</a></li>
        <li><a href="http://localhost/PROJEKT_IP/interesting.php">Interesting</a></li>
        <li><a href="http://localhost/PROJEKT_IP/gallery.html">Gallery</a></li>
        <li><a href="http://localhost/PROJEKT_IP/contact.php">Contact</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
   

<div class="form-style" id="contact_form">
    <div class="form-style-heading"><h1>Contact</h1></div>
    <div id="contact_results"></div>
    <div id="contact_body">
        <label><span>Name <span class="required">*</span></span>
            <input type="text" name="name" id="name" required="true" class="input-field"/>
        </label>
        <label><span>Email <span class="required">*</span></span>
            <input type="email" name="email" required="true" class="input-field"/>
        </label>
        <label><span>Phone</span>
            <input type="text" name="phone1" maxlength="4" placeholder="+91"  required="true" class="tel-number-field"/>&mdash;<input type="text" name="phone2" maxlength="15"  required="true" class="tel-number-field long" />
        </label>
            <label for="subject"><span>Regarding</span>
            <select name="subject" class="select-field">
            <option value="General Question">General Question</option>
            <option value="Advertise">Advertisement</option>
            </select>
        </label>
        <label for="field5"><span>Message <span class="required">*</span></span>
            <textarea name="message" id="message" class="textarea-field" required="true"></textarea>
        </label>
        <label>
            <span>&nbsp;</span><input type="submit" id="submit_btn" value="SEND" />
        </label>
    </div>
</div>


	<!-- izbornik-->
	<script>
	$(document).ready(function() {   
            var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });
        });
</script>



</body>
</html>


