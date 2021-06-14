<?php
if(isset($_POST['SubmitButton'])){ 
	$input = $_POST['opinion_content']; 


	if(empty($input)){
		$message = "Wprowadź opinię";
    		echo "<p>$message</p>";	}
 	else if(strlen($input)>100){
        	$message = "Za długo!";
        	echo "<p>$message</p>";}
	else if(strlen($input)<8) {
        	$message = "za krótko!";
        	echo "<p>$message</p>";}

	else {
        	require_once "../../db_connection.php";
       		$connect = new PDO($db_pg, $user, $password);
        	$sql = "insert into opinie (opinion_content, upvotes, downvotes) values (:input, 0, 0)";
        	$result = $connect->prepare($sql);
        	$result->execute(['input'=>$input]);
        	$message = "Sukces! Wprowadziłeś: ".$input;
		echo $message;}


}    
?>




<form class='myform hide' action="index.php" method="post">
	<div class="pageTitle title">Wprowadź tekst </div>
      <div class="secondaryTitle title">ankietka tak/nie//za/przeciw</div>
      <textarea   class='message formEntry' type="text" name="opinion_content"/></textarea>
      <input id='submit-btn' class='submit-button' type="submit" name="SubmitButton"/>
</form>        
</section>
  </body>
</html>