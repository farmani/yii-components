<?php
/** news feed mini object
 * 
 * @author Christian Salazar christiansalazarh@gmail.com
 */
class NewsReaderItem {
	public $title;
	public $link;
}
/** the news feed main object
 * 
 * 
 * @author Christian Salazar christiansalazarh@gmail.com
 */
class NewsReader {
	
	public static function echoNews($url) {
		header("Content-type: application/json");
		$data = NewsReader::cacheRecovery();
		if($data != null){
			echo $data;
		}else{
			$data = CJSON::encode(NewsReader::read($feed_url,false));
			NewsReader::cacheStore($data);
			echo $data;
		}
	}
	
	
	/** read news from a feed and returns it as an array:
	 * @example
	 * most simple usage on an action:<br/>
	 * <code>
	 * 	public function actionAjaxNewsReader() {<br/>
		$ar = NewsReader::read( "http://rismedia.com/category/rrein-press-release/feed/");<br/>
		echo CJSON::encode($ar); }<br/>
	 * </code>
	 * @param string $url
	 * @param array {NewsReaderItem array}
	 */
	public static function read($url){
		$ar = array();
		$xml = simplexml_load_file($url, null, LIBXML_NOCDATA );
		$defaultChannel = $xml->{"channel"};
		if($defaultChannel != null)
		foreach($defaultChannel->children() as $c){
			if($c->getName() == 'item'){
				$item = new NewsReaderItem();
				$item->title = "".$c->title;
				$item->link = "".$c->link;
				$ar[] = $item;
			}
		}
		return $ar;
	}
	public static function getCacheFileName(){
		return "assets/newsreader.cache";
	}	
	public static function cacheStore($jsondata){
		$f = @fopen(self::getCacheFileName(),"wb");
		if($f != null){
			@fwrite($f,$jsondata,strlen($jsondata));
			@fclose($f);
		}
	}
	public static function cacheRecovery(){
		$f = @fopen(self::getCacheFileName(),"rb");
		if($f != null){
			$jsondata = @fread($f, filesize(self::getCacheFileName()));
			@fclose($f);
			if($jsondata != null)
				return $jsondata;
		}
		return null;
	}
}