<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Wait!</title>
</head>
<body>


   <h1> Please wait we are verifying your credientials! </h1>
    <div id="loading"></div>



</body>
</html>

<script>




$(document).ready(function(){


     setInterval(function(){

        $.ajax({
                url: "{{url('/user/checkActiveSession')}}",
                method:"get",
                success: function(data){

                  data = parseInt(data);

                  if(data == 1){

                    window.location.href = "{{url('/')}}";

                  }
                }

            });

         }, 3000);

})

</script>



<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:100);

body { margin-top: 100px; background-color: #137b85; color: #fff; text-align:center; }

h1,h2,h3 {
  font: 2em 'Roboto', sans-serif;
  margin-bottom: 40px;
}

#loading {
  display: inline-block;
  width: 50px;
  margin-top: 30px;
  height: 50px;
  border: 3px solid rgba(255,255,255,.3);
  border-radius: 50%;
  border-top-color: #fff;
  animation: spin 1s ease-in-out infinite;
  -webkit-animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
  to { -webkit-transform: rotate(360deg); }
}
@-webkit-keyframes spin {
  to { -webkit-transform: rotate(360deg); }
}


</style>
