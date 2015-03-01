<!DOCTYPE html>
<html lang="en">
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.css">

	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>FinanceMyLife</title>
</head>

<body>
	<div class="first_div">
		<div id="header">
			<div class="logo">
				<p>FinanceMyLife</p>
			</div>
		</div>
		<div class="main_title">
			<h1>LET'S FINDANCE YOUR LIFE</h1>
		</div>
		<div class="main_title_sub_title">
			<p>A simple after graduation life planner.</p>
		</div>
		<div class="pos_get_started" id="link" href="#">
			<div class="get_started">
				<h3>Get Started</h3>
			</div>
		</div>
	</div>
	<div class="info_intro_text">
			<p>With three simple questions FinanceMyLife can help you in your transition from college to the real world.</p>
	</div>

	<div class="info_div">
		<div class="info_box info_1">
			<p>hello world</p>
		</div>
		<div class="info_box info_2"></div>
		<div class="info_box info_3"></div>
	</div>



	<div class="questionare_block">
		<div class="questionare_block_field">
				<div class="input_question">City:</div>
				<form action="action_page.php" method="get">
					<input type="text" placeholder="City you want to live in." id="city_textfield">
				<br>
				<div class="input_question">State:</div>
					<input type="text" placeholder="State you want to live in." id="state_textfield">
				<br>
				<div class="input_question">Job:</div>
					<input type="text" placeholder="Job you're looking to apply to." id="job_textfield">
				<br>
				<div class="input_question">Debt:</div>
					<input type="text" placeholder="School and other debts" id="debt_textfield">
				<br><br>

				<button id="plan_my_life" onclick="presentLifePlan()">Submit</button>
			</form>
		</div>
	</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		function scrollToAnchor(aid){
	    	var aTag = $("div[class='"+ aid +"']");
	    	$('html,body').animate({scrollTop: aTag.offset().top},'slow');
		}
		$("#link").click(function() {
	   		scrollToAnchor('questionare_block');
		});

		function presentLifePlan() {
			echo "Yo";
			$("#plan_my_life").click(function(event) {
				event.preventDefault();
				$(".alert").hide();
					$.get("action_page.php?city_textfield="+$("#city_textfield").val()+"&state_textfield="+$("#state_textfield").val()+"&job_textfield="+$("#job_textfield").val()+"&debt_textfield="+$("#debt_textfield").val(), function(data) {


						if(data =="") {
							$("#fail").fadeIn();
						}
						else {
							$("#success").html(data).fadeIn();
						}
				}
				else {
					$
					$("#noCity").fadeIn();
				}

			})
		}
	</script>

</body>
</html>
