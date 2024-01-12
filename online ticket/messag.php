<!DOCTYPE html>
<html>
<head>
  <title>transport</title>
  <link rel="stylesheet" type="text/css" href="messag.css">
</head>
<body>
    <div id="popup" class="popup">
        <h1 id="greeting-message"></h1>
        <p>Do you want to continue?</p>
        <a href="home page.html"><button id="continue-btn">Continue</button></a>
        
        <button onclick="closePage()">Cancel</button>

<script>
function closePage() {
  window.close();
}
</script>
      </div>
      
  <script src="messag.js"></script>
</body>
</html>