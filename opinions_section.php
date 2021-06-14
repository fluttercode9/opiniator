<?php	
	 require_once "../../db_connection.php";
      	 $connect = new PDO($db_pg, $user, $password);
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }
        else{
            $page = 1;

        }
	$perpage=5;
        $start_from = ($page-1)*$perpage;
        $sql = "select * from opinie order by opinion_id desc limit :perpage offset :start_from";
        $result = $connect->prepare($sql);
      	 $result->execute(['perpage'=>$perpage, 'start_from'=>$start_from]);






	    foreach ($result as $opinion) {
		$string = $opinion['opinion_date'];
		$date =  substr($string, 0, -7);
	    print "

            <article class='container' id={$opinion['opinion_id']}>
            	<span class='date'>{$date}</span>"."<br>

                <div class='cont'>

                        <div class='opinion-text'>
				<p>{$opinion['opinion_content']}</p>
			</div>

                        <div class='buttons hide'>
                        	<div class='like' data-id='{$opinion['opinion_id']}' data-vote='{$opinion['upvotes']}'></div> 
                        	<div class='unlike' data-id='{$opinion['opinion_id']}' data-vote='{$opinion['downvotes']}'></div> 			
                        </div>
                
            
                </div>
                <div class='chart_container hide'>

			<span id='downvote' class='hide'>{$opinion['downvotes']}</span>
			<span id='upvote' class='hide'>{$opinion['upvotes']}</span>
                        <canvas class='myChart'> </canvas>
                </div>
                

            </article><br><br>";
	}

		






 ?>