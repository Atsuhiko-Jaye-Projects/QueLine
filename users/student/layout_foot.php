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
  // if (hours === 7 && minutes === 30) {
  //   return true;
  // }

  // // Block showing modal from 7:31 PM to 1:00 AM
  // if (
  //   (hours === 7 && minutes > 31) || // 7:31–7:59 PM
  //   (hours >= 8 && hours <= 5) ||   // 8:00 PM – 11:59 PM
  //   (hours === 0 && minutes <= 59) || // 12:00 AM – 12:59 AM
  //   (hours === 1 && minutes === 0)    // exactly 1:00 AM
  // ) {
  //   return false;
  // }

  // // Show modal outside blocked time
  // return true;
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

<script>
  document.getElementById("showModalBtn").addEventListener("click", function () {
  document.getElementById("receipt_modal").style.display = "flex";
});

  document.getElementById("returnBtn").addEventListener("click", function () {
  document.getElementById("receipt_modal").style.display = "none";
});

document.getElementById("printBtn").addEventListener("click", function () {
  window.print();
});
</script>






