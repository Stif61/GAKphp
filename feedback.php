<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>GrinAgroKapital</title>
    <style>
	body{
	background:url(img/upfeathers.png) repeat;
	}
	</style>
	<meta name="title" content="" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection" />
</head>
<body style="background-attachment:fixed" topmargin="0">
<div id="wrapper">
<?php require 'bloks/header.php'; ?>
 <div id="middle">
  <div id="container">
  <div id="content">
	 <h1 align="center" style="color:dark;">&nbsp;</h1>
	 <h1 align="center" style="color:dark;">GrinAgroKapital</h1>
	 <div id="inline">
<h2>Онлайн заявка</h2>
<form id="contact" action="#" method="post" name="contact">
<input id="name" class="txt" name="name" type="name" placeholder="Ваше имя" />
 <input id="phone" class="txt" name="phone" type="phone" placeholder="Ваш телефон" /> 
<input id="email" class="txt" name="email" type="email" placeholder="Ваш e-mail" /> 
<textarea id="msg" class="txtarea" name="msg" placeholder="Ваше сообщение:"></textarea>
 <button id="send">Отправить</button>
</form>
</div>
	   </div>
        </div>
        </body>
<script type="text/javascript">
  function validateEmail(email) { 
    var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return reg.test(email);
  }

  $(document).ready(function() {
    $(".modalbox").fancybox();
    $("#contact").submit(function() { return false; });
    $("#send").on("click", function(){
      var emailval  = $("#email").val();
      var namevl  = $("#name").val();
      var phonevl  = $("#phone").val();
      var msgval    = $("#msg").val();
      var msglen    = msgval.length;
      var mailvalid = validateEmail(emailval);

      if(mailvalid == false) {
        $("#email").addClass("error");
      }
      else if(mailvalid == true){
        $("#email").removeClass("error");
      }
  if(mailvalid == false) {
        $("#name").addClass("error");
      }
      else if(mailvalid == true){
        $("#name").removeClass("error");
      }
      if(mailvalid == false) {
        $("#phone").addClass("error");
      }
      else if(mailvalid == true){
        $("#phone").removeClass("error");
      }
      if(msglen < 4) {
        $("#msg").addClass("error");
      }
      else if(msglen >= 4){
        $("#msg").removeClass("error");
      }
      
      if(mailvalid == true && msglen >= 4) {
        // если обе проверки пройдены
        // сначала мы скрываем кнопку отправки
        $("#send").replaceWith("<em>отправка...</em>");
        $.ajax({
          type: 'POST',
          url: 'sendmessage.php',
          data: $("#contact").serialize(),
          success: function(data) {
            if(data == "true") {
              $("#contact").fadeOut("fast", function(){
                $(this).before("<p><strong>Успешно! Ваше сообщение отправлено  :)</strong></p>");
                setTimeout("$.fancybox.close()", 1000);
              });
            }
          }
        });
      }
    });
  });
</script>
<?php require 'bloks/sideLeft.php'; ?>
<?php require 'bloks/footer.php'; ?>