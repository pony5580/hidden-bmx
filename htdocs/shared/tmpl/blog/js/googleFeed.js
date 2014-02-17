//var isIE = (document.documentElement.getAttribute("style") == document.documentElement.style);


//API本体を読み込む
google.load("feeds", "1");

// 初期化関数を定義する
function initialize() {
	
	<mt:Entries lastn="20">
	
	<MTIfNonEmpty tag="entrydatabloger_feed">
	
	var blog<$mt:EntryID$> = new google.feeds.Feed('<MTentrydatabloger_feed>');
	
	blog<$mt:EntryID$>.setNumEntries(1);
	
	//設定処理終了後実行されるので注意
	blog<$mt:EntryID$>.load(function(result) {
		if (!result.error) {
			var container = document.getElementById('blog-<$mt:EntryID$>');					
			for (var i = 0; i < result.feed.entries.length; i++) {
				var entry = result.feed.entries[i];
				var attributes = ["publishedDate", "title", "link"];
				
				var date = new Date(entry.publishedDate);
				
				//alert(date.getMonth());				
					
					var pDate = document.createElement("p");
					pDate.setAttribute("class", "date");	
					pDate.appendChild(document.createTextNode(entry['publishedDate']));
					
					
				
					var pTxt = document.createElement("a");
					pTxt.href = entry['link'];
					pTxt.appendChild(document.createTextNode(entry['title']));
					
					var alink = document.createElement("p");
					alink.setAttribute("class", "txt");
					alink.appendChild(pTxt);
	

				container.appendChild(pDate);
				container.appendChild(alink);
			}
		}
		
		
	});
	
	</MTIfNonEmpty>
	
	</mt:Entries>
		
}

// 定義した関数をイベントハンドラとして登録する
google.setOnLoadCallback(initialize);