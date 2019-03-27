<!DOCTYPE html>
<html lang="fr">
<head>
<!-- Required meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="description de la page">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>Document</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Other CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- External CSS -->
<link rel="stylesheet" href="css/style.css">

<!-- Custom CSS -->
<style>


</style>

</head>
<body>

<!-- CONTENT START -->

<div class="container">
<div class="row">
<div class="col-12">




<form method="POST">
<input name="nom">
<input type="submit">
</form>



</div>
</div>
</div>

<!-- CONTENT END -->

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Custom JS (parallax, etc) -->


<!-- JS File -->
<script src="js/main.js"></script>

<!-- InPage JS -->
<script>

</script>

<script>
$(function () {
  
  $('form').on('submit', function (e) {
    
    e.preventDefault();
    
    $.ajax({
      type: 'post',
      url: 'test1post.php',
      data: $('form').serialize(),
      success: function (data) {
        alert('form was submitted');
        $("#data2").html(data);
      }
    });
    
  });
  
});

</script>

</body>
</html>

<div id="data2"></div>

<!-- 
$(document).ready(function(){
  $('.button').click(function(){
    var clickBtnValue = $(this).val();
    var ajaxurl = 'ajax.php',
    data =  {'action': clickBtnValue};
    $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      document.getElementById("myDiv").innerHTML=response;
      alert("action performed successfully");
    });
  });
}); -->