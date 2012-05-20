JQUERY NEWS READER version 1.0 
------------------------------


this component shows news in your website reader from a standard news feed, using yii framework.


autor: Christian Salazar christiansalazarh@gmail.com


USAGE:
-----

(for SCREENSHOT, view file screenshot.gif)



full example usage in your Yii instalation:

1. Copy the component NewsReader.php into your components folder.

2. Copy the JS folder into your root path.

3. Prepare an action, as an example, in your SiteController, using this code:
[code]
public function actionAjaxNewsReader($feed_url) {
	NewsReader::echoNews($url);
}
[/code]

4. Test your action, it must work fine, outputing only JSON DATA.
Use your own URL:  
http://coco.com/whtrealty1/index.php?r=site/ajaxnewsreader&feed_url=http://rismedia.com/category/rrein-press-release/feed/


5. In your view, were you need the feed, use a code like this:
[code]
	<div>
		<h1>News</h1>
		<div id='newslist'></div>
		<script>new NewsReaderClient(
			{	div: "newslist", 
				waitimage: "images/loading.gif",
				action: "index.php?r=site/ajaxNewsReader&feed_url=",
				feed: "http://rismedia.com/category/rrein-press-release/feed/",
				readmorelabel: "read more",
				a_target: "_blank",
				max_div_height: "245px",
			}
		);</script>
	</div>
[/code]
