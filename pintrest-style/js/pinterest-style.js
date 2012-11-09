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
