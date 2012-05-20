/** NewsReader Feed.
 * 
 * require: 
 * 	1-Yii Component NewsReader.php
 * 	2-jquery
 * 
 * URL:
 * https://github.com/christiansalazar/yii-components
 * 
 * CSS LAYOUT:
 * 
 * <ul class='newsreader'>
 * 	<li><div>news title...</div><a href='news link'>read more</a></li>
 * </ul>
 * 
 * 
 * @author:  Christian Salazar christiansalazarh@gmail.com
 */
function NewsReaderClient(options){
	
	var div = $('#'+options.div);
	var ul_id = options.div+"_list";
	
	// special css style applied to div, for scrolling...
	div.css("overflow","auto");
	div.css("height",options.max_div_height);
	
	div.html("");
	div.append("<img src='"+options.waitimage+"'>");
	div.append("&nbsp;loading News, please wait...");
	
	// jquery
	$.getJSON(options.action+options.feed, function(data) {
		div.html("");
		div.html("<ul class='newsreader' id='"+ul_id+"'></ul>");
		var ul = $("#"+ul_id);
		
		$.each(data, function(key,  newsreaderitem) {
			  var oddeven = key % 2 ? 'odd' : 'even'; 
			  ul.append("<li class='"+oddeven+"'><div>"+newsreaderitem.title+"</div><a href='"+
					  newsreaderitem.link
					  +"' target='"+options.a_target+"'>"+options.readmorelabel+"</a></li>");
		  });
		});
}
