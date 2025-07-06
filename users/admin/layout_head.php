<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title;?> - Queuing Management System</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="../../libs/css/admin.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
   <style>
  body {



  }
</style>

<body class="bg-white min-h-screen flex flex-col">
  <div class="flex flex-1 overflow-hidden">
    <?php include_once "sidebar.php"; ?>
       <main class="flex-1 flex flex-col overflow-auto">
        <?php include_once "templates/header.php"; ?>
        <section class="px-6 md:px-10 pt-10 mt-[-10px]">
          <h1 class="text-[#0D3B66] text-3xl font-bold uppercase text-shadow select-none"><?php echo $page_title; ?></h1>
        </section>
        


