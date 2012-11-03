document.addEvent("domready", function(){

	$$("#nav a").addEvent("click", function(e){
		e.stop();

		var url = this.get("href");
		document.id("content").load(url);

		return false;
	});
});