function greetAccordingToTime() {
    var currentTime = new Date();
    var currentHour = currentTime.getHours();
    var greeting;
  
    if (currentHour < 12) {
      greeting = "Good morning!";
    } else if (currentHour < 18) {
      greeting = "Good afternoon!";
    } else {
      greeting = "Good evening!";
    }
  
    return greeting;
  }
  
  var greetPopup = document.getElementById("popup");
  var greetingElement = document.getElementById("greeting-message");
  var continueBtn = document.getElementById("continue-btn");
  var cancelBtn = document.getElementById("cancel-btn");
  
  // Function to handle continue button click
  function handleContinue() {
    greetPopup.style.display = "none";
    // Continue with further actions, like redirecting to another page
  }
  
  // Function to handle cancel button click
  function handleCancel() {
    greetPopup.style.display = "none";
    // Perform cancel actions or stay on the current page
  }
  
  // Call the function to get the greeting
  var greetingMessage = greetAccordingToTime();
  greetingElement.textContent = greetingMessage;
  greetPopup.style.display = "block";
  continueBtn.addEventListener("click", handleContinue);
  cancelBtn.addEventListener("click", handleCancel);