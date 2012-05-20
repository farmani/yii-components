JQUERY NEWS READER version 1.0 
------------------------------

This component shows news in your website using a standard news feed readed from a Yii ajax action.  This action can
be cached, so using your own logic you can return the cached feed or the hot feed from its original location.

autor: 
Christian Salazar christiansalazarh@gmail.com


USAGE:
-----

<u style='color: red;'><b>(for SCREENSHOT, view file screenshot.gif)</b></u>
<img src='https://github.com/christiansalazar/yii-components/raw/master/news-reader/screenshot.gif' >


full example usage in your Yii instalation:

1. Copy the component NewsReader.php into your components folder.

2. Copy the JS folder into your root path.

3. Prepare an action, as an example, in your SiteController, using this code:
`public function actionAjaxNewsReader($feed_url) {
	NewsReader::echoNews($url);
}`

4. Test your action, it must output only JSON DATA. 
`http://yourhost/yourapp/index.php?r=site/ajaxnewsreader&feed_url=http://rismedia.com/category/rrein-press-release/feed/`

5. In your view, were you need the feed, use a code like this:<br/><br/>
`<script src='js/newsreader/newsreader-client.js'></script>`<br/>
`<link rel="stylesheet" type="text/css" href="js/newsreader/newsreader-client.css" />`<br/>
`<div><h1>News</h1>`<br/>
`<div id='newslist'></div>`<br/>
`  <script>new NewsReaderClient( { `<br/>
`	div: "newslist", `<br/>
`	waitimage: "images/loading.gif",`<br/>
`	action: "index.php?r=site/ajaxNewsReader&feed_url=",`<br/>
`	feed: "http://rismedia.com/category/rrein-press-release/feed/",`<br/>
`	readmorelabel: "read more",`<br/>
`	a_target: "_blank",`<br/>
`	max_div_height: "245px",`<br/>
`	}`<br/>
`  );`<br/>
`</script>`<br/>
`</div>`<br/>
