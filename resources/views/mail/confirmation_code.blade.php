<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Box</title>
    <style>
    .vcode-input {
    width: 40px;
    height: 40px;
    text-align: center;
    font-size: 18px;
}

.container {
    width: 800px;
    margin: 0 auto;
    padding: 100px;
    background: #FFF;
}
    </style>
 
</head>

<body>
    <div class="container" align="center">


        <div class="card shadow" style="width: 30rem; height:20rem ;">

            <form action="{{route('mail.confirmation')}}" method="POST">
            @csrf
                <label for="vcode1" class="mt-3">Enter 6-digit verification code</label>
                <div class="vcode" id="vcode" style="margin-top:70px">
                    <input type="phone" class="vcode-input" name=digit1 maxlength="1" id="vcode1">
                    <input type="phone" class="vcode-input" name=digit2 maxlength="1">
                    <input type="phone" class="vcode-input" name=digit3 maxlength="1">
                    <input type="phone" class="vcode-input" name=digit4 maxlength="1">
                    <input type="phone" class="vcode-input" name=digit5 maxlength="1">
                    <input type="phone" class="vcode-input" name=digit6 maxlength="1">
                </div>
                <input type="reset" class="btn btn-secondary  mr-3" value="Reset" style="margin-top:80px;">
                <input type="submit" class="btn btn-primary  mr-3 " value="Confirm" style="margin-top:80px;">
            </form>
        </div>
    </div>
    <script>
    var vcode = (function(){
    //cache dom
    var $inputs = $("#vcode").find("input");
  
    //bind events
    $inputs.on('keyup', processInput);
    
    //define methods
    function processInput(e) {
      var x = e.charCode || e.keyCode;
      if( (x == 8 || x == 46) && this.value.length == 0) {
        var indexNum = $inputs.index(this);
        if(indexNum != 0) {
          $inputs.eq($inputs.index(this) - 1).focus();
        }
      }
      
      if( ignoreChar(e) ) 
        return false;
      else if (this.value.length == this.maxLength) {
        $(this).next('input').focus();
      }
    }
    function ignoreChar(e) {
      var x = e.charCode || e.keyCode;
      if (x == 37 || x == 38 || x == 39 || x == 40 )
        return true;
      else 
        return false
    }
    
  })();
  
    
    </script>
</body>

</html>