<?php 
	function getContent() {
		$fakeDb = array("Ut condimentum mi vel tellus. Suspendisse laoreet. Fusce ut est sed dolor gravida convallis. Morbi vitae anlor gravida convalis. e anlor gravida convallis. Morbi villis. Morbi vitae ante. ",
				"Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean rmentum. Aliquam porttitor mauris sit ametttitor mauris sitignissim pellentesque felis",
				"Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar a purus. Sed vel lacus.",
				"Fusce accumsan mollis erola");
		
		return $fakeDb[rand(0, count($fakeDb) - 1)];
	}
	
	function getWidth() {
		$classes = array("w1", "w2");
		return $classes[rand(0, count($classes) - 1)];
	}
?>

<style>
#myContainer {
	overflow: auto;
	background: #ddd;
	padding: 10px;
	box-shadow: inset 2px 2px 7px #aaa;
	width: 900px;
	margin: 0 auto;
}

.box {
	float: left;
	margin: 10px;
	background: #eee;
	padding: 10px;
	border-bottom: 2px solid #bbb;
}

.w1 {
	width: 110px;
	width: 260px;
}

.w2 {
	width: 260px;
}

</style>

<div id="myContainer">
	<?php $toShow = rand(3, 6); ?>
	<?php for ($i = 0; $i < $toShow; $i++): ?>
		<div class="box <?= getWidth(); ?>"><?= $i + 1; ?>) <?= getContent(); ?></div>
	<?php endfor; ?>
</div>

<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="jquery.masonry.min.js"></script>
<script>
$(function(){
	$("#myContainer").masonry({
		itemSelector: ".box",
		columnWidth: 300,
		isAnimated: true
	});
});

$("body").click(function(){
	$(".box").last().after($(".box").first());
	var clones = $(".box");
	var len = clones.length;

	for (var i = 0; i < 3; i++) {
		var clone = $(clones[parseInt(Math.random() * len)]).clone();
		$(clone).text($(clone).text() + $(clone).text().substr(3, parseInt(Math.random() * $(clone).text().length)));
		$(".box").last().before(clone);
	}
	$("#myContainer").masonry("reload");
});
</script>
