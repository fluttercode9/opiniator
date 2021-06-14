<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ANKIETONATOR</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="styles.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
<script src="jquery-3.6.0.min.js"></script>
<script src = "script.js"></script>


  </head>
  <body>
    <h1>(nie?)popularna opinia</h1>
    

<?php
require_once "voting.php";
require_once "dodaj_opinie.php";
?>
<button onclick='myFunction' id='add-btn' type='button' class='submit-button'> Dodaj opinie! </button>
<section class="opinie">
<?php 
require_once "opinions_section.php";
?>
<div class='pagination'> <?php require_once "pagination.php";?> </div>    
</section>


<?php echo "<script scr=\"script.js\">  addOpinionButton();
hover();
 </script>" ?>
<footer>
  <p>Author:	Krzysztof Górski</p>
</footer>

  </body>
</html>

