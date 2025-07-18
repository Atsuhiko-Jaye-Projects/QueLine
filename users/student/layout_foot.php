</div>
</div>
</body>
</html>


<script>
function shouldShowModal() {
  const now = new Date();
  const manilaTime = new Date(
    now.toLocaleString("en-US", { timeZone: "Asia/Manila" })
  );

  const hours = manilaTime.getHours();
  const minutes = manilaTime.getMinutes();

  // Check for exactly 7:30 PM
  if (hours === 19 && minutes === 08) {
    return true;
  }

  // Block showing modal from 7:31 PM to 1:00 AM
  if (
    (hours === 19 && minutes > 08) || // 7:31–7:59 PM
    (hours >= 20 && hours <= 23) ||   // 8:00 PM – 11:59 PM
    (hours === 0 && minutes <= 59) || // 12:00 AM – 12:59 AM
    (hours === 1 && minutes === 0)    // exactly 1:00 AM
  ) {
    return false;
  }

  // Show modal outside blocked time
  return true;
}

function checkModalDisplay() {
  if (shouldShowModal()) {
    document.getElementById("myModal").style.display = "flex";
  } else {
    document.getElementById("myModal").style.display = "none";
  }
}

// Run on load
checkModalDisplay();

// Then check every minute
setInterval(checkModalDisplay, 1000);
</script>







