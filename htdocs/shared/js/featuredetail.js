var featureDetail;
function FeatureDetail(){
	// images [{ src:xxx , defaultX:xxx , titles:[xxxx,xxxx]}];
	this.$articles = new Array();

	this.currentIndex = 0;
};

FeatureDetail.prototype = {
	init:function(){
		var scope = this;
		this.setButton();


		$('.feature .list_sentence li').each(function(i,e){
			var $article = $(e);
			$article.css({
				'position':'absolute',
				'top':0,
				'left':980*i
			});
			$article.defaultX = 980*i;
			scope.$articles.push($article);
		})
		this.update(0);

	},
	update:function(index){
		var len = this.$articles.length;
		if(this.currentIndex>=len) this.currentIndex = 0;
		if(this.currentIndex<0) this.currentIndex=len-1;

		for(var i=0 ; i<len ; i++){
			var $article = this.$articles[i];
			var targetX = $article.defaultX-980*this.currentIndex;
			$($article).stop().animate({'left':targetX},1000,'easeInOutExpo');
		}
		var $currentArticle=this.$articles[this.currentIndex];
		$('#content_body_inner .list_sentence').stop().animate({
			'height':$currentArticle.height()
		},1000,'easeOutExpo');
		this.setPosition();
	},
	setButton:function(){
		var scope = this;

		$(".feature .next , .feature .prev").find('img').css({
			'opacity':0.5
		});

		$(".feature .next , .feature .prev").hover(function(){
			$(this).find('img').stop().animate({
				'opacity':1
			});
		},function() {
			$(this).find('img').stop().animate({
				'opacity':0.5
			});
		});
		$('.feature .next').click(function(){
			scope.update(++scope.currentIndex);
		});
		$('.feature .prev').click(function(){
			scope.update(--scope.currentIndex);
		});
	},
	setPosition:function(){
		var targetY = $(window).height()/2-$('#content_body').offset().top+$(document).scrollTop()-15;
		$(".feature .next , .feature .prev").css({
			'top':targetY
		});
	},
	onResize:function(){
		this.setPosition();

	},
	onScroll:function(){
		this.setPosition();
	}
}

featureDetail = new FeatureDetail();
// jQuery Ready
$(function(){
	featureDetail.init();
});
// window Ready
$(window).load(function () {
});
//window resize
$(window).resize(function () {
	featureDetail.onResize();
});
$(window).scroll(function () {
	featureDetail.onScroll();
});
