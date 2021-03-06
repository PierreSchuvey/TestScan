<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>qrcode-reader usage example</title>
  <link rel="stylesheet" href="dist/css/qrcode-reader.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <style>
    body {
      font-family: 'Lato', sans-serif;
    }
  </style>
</head>

<body>

<h1>Test du Scan QR code</h1>

<form>

  <input id="single" type="text" size="50"> 
  <button type="button" class="qrcode-reader" id="openreader-single"
    data-qrr-target="#single"
    data-qrr-audio-feedback="false"
    data-qrr-qrcode-regexp="^https?:\/\/">Activer le scan</button>

</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="dist/js/qrcode-reader.min.js?v=20190604"></script>

<script>

  $(function(){

    // overriding path of JS script and audio
    $.qrCodeReader.jsQRpath = "dist/js/jsQR/jsQR.min.js";
    $.qrCodeReader.beepPath = "dist/audio/beep.mp3";

    // bind all elements of a given class
    $(".qrcode-reader").qrCodeReader();

    // bind elements by ID with specific options
    $("#openreader-multi2").qrCodeReader({multiple: true, target: "#multiple2", skipDuplicates: false});
    $("#openreader-multi3").qrCodeReader({multiple: true, target: "#multiple3"});

    // read or follow qrcode depending on the content of the target input
    $("#openreader-single2").qrCodeReader({callback: function(code) {
      if (code) {
        window.location.href = code;
      }
    }}).off("click.qrCodeReader").on("click", function(){
      var qrcode = $("#single2").val().trim();
      if (qrcode) {
        window.location.href = qrcode;
      } else {
        $.qrCodeReader.instance.open.call(this);
      }
    });


  });

</script>


</body>
</html>
