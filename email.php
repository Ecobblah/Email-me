<?php

$info="";
if($_POST){
    if(mail($_POST['email'],$_POST['subject'],$_POST['body'],"emmanuelcobbtesthostingpackage-com.stackstaging.com") ){
      $info = '<div class="alert alert-success  " style="Display:block;" role="alert">
        <span  >Email have been sent!</span>
      </div>';
      $_POST = array();
    }
    else{
      $info ='<div class="alert alert-danger " style="Display:block;" role="alert">
      <span  id = "hide-sub">Email was not sent</span>
      </div>';
      $_POST = array();
    }
}
?>
<!doctype html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Email</title>
    <style media="screen">
      #hide-email{
        display:none;
      }
      #hide-quest{
        display:none;
      }
      #hide-sub{
        display:none;
      }
      .alert{
        display:none;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <h1>Get in touch!</h1>
      <div id ="ser" ><?php echo $info; ?></div>
      <div class="alert alert-danger  " role="alert">
        <strong>Error(s):</strong>
        <span  id = "hide-email">Email address is empty</span>
        <span  id = "hide-sub">Subject is empty</span>
        <span id = "hide-quest">Body is empty</span>
      </div>
      <form method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name = "email"type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Subject</label>
          <input name = "subject"type="text" class="form-control" id="subject" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">What would you like to ask us?</label>
          <textarea name = "body" class="form-control" id="question" rows="3"></textarea>
        </div>
        <input class="btn btn-primary" id="submit" type="submit" data-dismiss="alert"  value="Submit">
      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script type="text/javascript">
      $("#submit").click(function (e){
        $("#ser").html('');
        var isQuest = $('#question').val() == '';
        var isSub = $('#subject').val() == '';
        var isEmail = $('#email').val() == '';
        if( (isQuest || isSub || isEmail) ){
          $(".alert").css("display","block");
          $('.alert').show();
          if(isQuest){
            $("#hide-quest").css("display","block");
          }
          else{
            $("#hide-quest").css("display","none");
          }
          if(isEmail){
            $("#hide-email").css("display","block");
          }
          else{
            $("#hide-email").css("display","none");
          }
          if(isSub){
            $("#hide-sub").css("display","block");
          }
          else{
            $("#hide-sub").css("display","none");
          }
          return false;
        }
        else{
          $(".alert").css("display","none");
          $(".alert").parent().alert('close');
        }
      });
    </script>
  </body>

</html>
