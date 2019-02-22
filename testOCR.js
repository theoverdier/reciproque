$("#texteScan").hide();

function OCR(myImage){
    //var img = document.querySelector('input');

    //détecter langue image
    /*Tesseract.detect(img)
        .then(function(langue){
        console.log(langue);
    });*/

    Tesseract.recognize(myImage)
      .then(function(result) {
          $("#spinner").hide();
          document.querySelector('textarea[name=description]').value = result.text;
      })
    ;
};

function previewFile() {
    var preview = document.querySelector('img');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();
  
    reader.onloadend = function () {
      preview.src = reader.result;
    }
  
    if (!file) {
      preview.src = '';
      return;
    }

    reader.readAsDataURL(file);
    $("#spinner").show();

    setTimeout(function() {
      OCR(preview);
    }, 10);
}

