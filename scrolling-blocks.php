<?php 
$items = array(
		array("title" => "FIRST Candidate", "total_polled" => rand(234, 432)." of ". rand(450, 1000), "candidate_1" => "Candidate ". rand(1, 100), "percentage_1" => rand(1, 100)."%", "candidate_2" => "Candidate 2", "percentage_2" => rand(45, 95)."%"),
		array("title" => "TITLE ". rand(1, 100), "total_polled" => rand(234, 432)." of ". rand(450, 1000), "candidate_1" => "Candidate ". rand(1, 100), "percentage_1" => rand(1, 100)."%", "candidate_2" => "Candidate 2", "percentage_2" => rand(45, 95)."%"),
		array("title" => "TITLE ". rand(1, 100), "total_polled" => rand(234, 432)." of ". rand(450, 1000), "candidate_1" => "Candidate ". rand(1, 100), "percentage_1" => rand(1, 100)."%", "candidate_2" => "Candidate 2", "percentage_2" => rand(45, 95)."%"),
		array("title" => "TITLE ". rand(1, 100), "total_polled" => rand(234, 432)." of ". rand(450, 1000), "candidate_1" => "Candidate ". rand(1, 100), "percentage_1" => rand(1, 100)."%", "candidate_2" => "Candidate 2", "percentage_2" => rand(45, 95)."%"),
		array("title" => "TITLE ". rand(1, 100), "total_polled" => rand(234, 432)." of ". rand(450, 1000), "candidate_1" => "Candidate ". rand(1, 100), "percentage_1" => rand(1, 100)."%", "candidate_2" => "Candidate 2", "percentage_2" => rand(45, 95)."%"),
		array("title" => "TITLE ". rand(1, 100), "total_polled" => rand(234, 432)." of ". rand(450, 1000), "candidate_1" => "Candidate ". rand(1, 100), "percentage_1" => rand(1, 100)."%", "candidate_2" => "Candidate 2", "percentage_2" => rand(45, 95)."%"),
		array("title" => "TITLE ". rand(1, 100), "total_polled" => rand(234, 432)." of ". rand(450, 1000), "candidate_1" => "Candidate ". rand(1, 100), "percentage_1" => rand(1, 100)."%", "candidate_2" => "Candidate 2", "percentage_2" => rand(45, 95)."%"),
		array("title" => "TITLE ". rand(1, 100), "total_polled" => rand(234, 432)." of ". rand(450, 1000), "candidate_1" => "Candidate ". rand(1, 100), "percentage_1" => rand(1, 100)."%", "candidate_2" => "Candidate 2", "percentage_2" => rand(45, 95)."%"),
		array("title" => "TITLE ". rand(1, 100), "total_polled" => rand(234, 432)." of ". rand(450, 1000), "candidate_1" => "Candidate ". rand(1, 100), "percentage_1" => rand(1, 100)."%", "candidate_2" => "Candidate 2", "percentage_2" => rand(45, 95)."%"),
		array("title" => "TITLE ". rand(1, 100), "total_polled" => rand(234, 432)." of ". rand(450, 1000), "candidate_1" => "Candidate ". rand(1, 100), "percentage_1" => rand(1, 100)."%", "candidate_2" => "Candidate 2", "percentage_2" => rand(45, 95)."%")
		);
?>

<style>
#scroller_shell {
	border: 1px solid #c00;
	width: 800px;
	height: 115px;
	margin: 50px auto 0;
	position: relative;
}

#scroller_content {
	overflow: hidden;
	height: 100%;
}

#scroller_wrapper {
	width: 1000px;
	overflow: auto;
}

#scroller_shell .scroller_panel {
	display: block;
	width: 150px;
	height: 110px;
	background: #ddd;
	margin: 5px;
	padding: 0;
	float: left;
}

#scroller_shell .scroller_panel h1 {
	font-weight: 800;
	background: #2652B1;
	color: #fff;
	margin: 0;
	padding: 5px;
	text-align: center;
	font-size: 15px;
	line-height: 15px;
}

#scroller_shell .scroller_panel p {
	overflow: auto;
	background: #fff;
	margin: 0;
	padding: 5px;
	background: #f5f5f5;
}

#scroller_shell .scroller_panel strong {
	display: block;
	float: left;
}

#scroller_shell .scroller_panel span {
	display: block;
	float: right;
}

#scroller_shell .scroller_panel em {
	display: block;
	text-align: right;
	background: #eee;
}

#scroller_shell .scroller_controls {
	position: absolute;
	border: 1px solid #533;
	border-radius: 50px;
	line-height: 15px;
	width: 15px;
	text-align: center;
	background: #c00 !important;
	color: #fff;
	cursor: pointer;
	
	
	/*************************/
	display: none;
}

#scroll_left {
	left: -40px;
	top: 43px;
}

#scroll_right {
	left: 810px;
	top: 43px;
}

</style>
<div id="scroller_shell">
	<p class="scroller_controls" id="scroll_left">&laquo;</p>
	<p class="scroller_controls" id="scroll_right">&raquo;</p>
	<div id="scroller_content">
		<div id="scroller_wrapper">
			<?php foreach ($items as $item): ?>
				<div class="scroller_panel">
					<h1><?= $item["title"]; ?></h1>
					<p><strong><?= $item["candidate_1"]?></strong> <span><?= $item["percentage_1"]; ?></span></p>
					<p><strong><?= $item["candidate_2"]?></strong> <span><?= $item["percentage_2"]; ?></span></p>
					<p><em><?= $item["total_polled"]?></em>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<script src="http://code.jquery.com/jquery.min.js"></script>
<script>
var scrollDelay = 500;
var delyToScroll = 1500;

function scrollCandidates() {
	var marginLeft = parseInt($(".scroller_panel").first().css("margin-left"));

	$(".scroller_panel").first().animate({"margin-left": -155}, scrollDelay, function(){

		$(".scroller_panel").last().after($(".scroller_panel").first());
		$(".scroller_panel").last().css({"margin-left": marginLeft});

		$(".scroller_panel").last().clearQueue();
		setTimeout(scrollCandidates, delyToScroll);
	});
}

setTimeout(scrollCandidates, delyToScroll);
</script>
