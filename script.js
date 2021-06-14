function addOpinionButton() {
const addbtn = document.getElementById('add-btn');
const submitbtn= document.getElementById('submit-btn');
submitbtn.addEventListener("click", (btn) => {
const form = document.querySelector('.myform');
form.classList.add('hide');
console.log(btn);
btn.target.classList.add('hide') });
addbtn.addEventListener("click", (btn) => {
const form = document.querySelector('.myform');
form.classList.remove('hide');
console.log(btn);
btn.target.classList.add('hide') });}




function hover(){
    const el = document.querySelectorAll('.container');
    el.forEach((el)=>{el.addEventListener("mouseover", (event) => {
				if (event.target.classList.contains('container') == true) {
					unexpandAll();
					if (event.target.classList.contains('hovered')==true) { console.log('wszedles tu'); event.target.querySelector('.chart_container').classList.remove('hide');};
					if(event.target.classList.contains('hovered')==false) {console.log('hovered=false');event.target.querySelector('.buttons').classList.remove('hide');};
					event.target.classList.add('active');

					};
				 }
			)})

}

function unexpandAll() {
	document.querySelectorAll('.container').forEach((el) => {console.log('git'); el.classList.remove('active');});
	document.querySelectorAll('.chart_container').forEach((el) => {el.classList.add('hide');});
	document.querySelectorAll('.buttons').forEach((el)=>{el.classList.add('hide')});
}


function buildChart(id){
    console.log('hello chart');
            const downvotes=document.getElementById(id).querySelector('#downvote').innerHTML;
            console.log(typeof downvotes);
            let down = parseInt(downvotes);
            console.log(down, typeof down, downvotes);
            const upvotes=document.getElementById(id).querySelector('#upvote').innerHTML;
            console.log(document.getElementById(id).querySelector('.myChart'));
            let myChart = document.getElementById(id).querySelector('.myChart').getContext('2d');
            const color = '';

                  let barChart = new Chart(myChart, {
                          type:'pie',
                          data:{ 
                              labels:['głosy na nie', 'głosy na tak'],
                            datasets:[{
                                    label: 'głosy',
                                    data:[
                                        downvotes,
                                        upvotes
                            ],
                        backgroundColor:['rgb(165, 42, 42)','rgb(51, 153, 51)' ],
                        borderWidth:4,
                        borderColor:'black'
                                }]
                          },
                          options: { responsive: true,
    maintainAspectRatio: false
				                          }
                                                          }
                                                    
);

};

$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var id = $(this).data('id');
			$votebutton = $(this);
			var upvote = $(this).data('vote');


			$.ajax({
				url: 'voting.php',
				type: 'post',
				data: {
					'upvote': upvote,
					'opinion_id': id
				},
				success: function(response){
						$votebutton.parent().parent().parent().find('span#upvote').text(response);
						$votebutton.parent().addClass('hide');
						$votebutton.parent().parent().parent().find('div.chart_container.hide').removeClass('hide');
						buildChart(id);
						$votebutton.parent().parent().parent().addClass('hovered');



									}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var id = $(this).data('id');
			var downvote = $(this).data('vote');
		    $votebutton = $(this);

			$.ajax({
				url: 'voting.php',
				type: 'post',
				data: {
					'downvote': downvote,
					'opinion_id': id
				},
				success: function(response){
						console.log('ihha');
						$votebutton.parent().parent().parent().find('span#downvote').text(response);
						$votebutton.parent().addClass('hide');
						
						$votebutton.parent().parent().parent().find('div.chart_container.hide').removeClass('hide');
						$votebutton.parent().parent().parent().addClass('hovered');
						console.log($votebutton.parent().parent().parent());
						buildChart(id);

					
									}
			});
		});
	});
