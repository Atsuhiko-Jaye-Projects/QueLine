<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title><?php echo $page_title; ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link href="../../src/output.css" rel="stylesheet">
<link href="libs/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="page-title">
    <h2>ONLINE QUEUING</h2>
  </div>
  
  <div class="page-titles">
    <h2>MANAGEMENT SYSTEM</h2>
  </div>

  <div class="containers">
    <?php 

      if ($page_title == "QQMS-Forgot Password") {
        echo "<div class='FP-container'>";
        echo "<div class='forgot-pass-form-box' id='forgot-password-form'>";

      }else if ($page_title =="OQMS-Sign-in") {
        echo "<div class='signin-container'>";
        echo "<div class='signin-form-box' id='signin-form'>";
      }

      else if ($page_title =="OQMS-Sign-up") {
        echo "<div class='signin-container'>";
        echo "<div class='signin-form-box' id='signin-form'>";
      }


      
    
    
    ?>