<html>

<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src='https://cdn.jsdelivr.net/gh/naptha/tesseract.js@v1.0.14/dist/tesseract.min.js' type="text/javascript"></script>
  <script src='testOCR.js' type="text/javascript"></script>
  <title>Test OCR</title>
</head>

<body>

<input type="file" onchange="previewFile()" placeholder="Choisir une image" accept="image/jpeg, image/jpg, image/png"/>
<br>

<!--essayer de masquer l'image via css-->
<img id="texteScan" src="" height="200" alt="Image preview...">

<br>
<button id="runOCR" onClick="OCR()">Scanner</button>
<br>

<!--ajouter un spinner-->
<img id="spinner" display: hidden>

<div id="ocr_results">
<textarea name="description"></textarea>
</div>

</body>
</html>