var Store;
//$( 'head' ).append('<style type="text/css">.product_viewer .thumbs img { opacity: 0;-moz-opacity:0; }</style>');
function Store(){
};
Store.prototype = {
	init:function(){
		this.setButton();
		this.setNavigation();
	},
	setButton:function(){
		$("#pagetop img").hover(function(){ 
			$(this).fadeTo(100,0.5); 
		},function() {
			$(this).fadeTo(200,1); 
		});
		//scroll
		$('a[href*=#]').click(function(){
			var id = $(this).attr('href');
			if(id=='#'){
				targetY=0;
			}else{
				targetY=$(id).offset().top;
			}
	     	$('html,body').stop().animate({ scrollTop:targetY },1000, 'easeOutExpo');
    	 	return false;
		});
	},
	setNavigation:function(){
		$('#header_global li a:last').css({'border-bottom-style':'solid','border-bottom-width':2});
		
		
		
	},
	setProduct:function(){
		$('.product_viewer .thumbs img').each(function(i, e) {
			var dw = $(this).width();
			var dh = $(this).height();
		
			if(dw>=dh)
			{
				var h=70*dh/dw;
				$(this).css({'width':70 , 'height':h});
			}
		});
		$('.product_viewer .thumbs a').click(function(){
			var nextIMG =$(this).attr('href');
			$('.img_container').find('img').attr('src',nextIMG);
			$('.img_container').find('img').stop().fadeOut(0).fadeIn(500);
			return false;
		});
	}
};
Store = new Store();
// jQuery Ready
$(function(){
	Store.init();
});
// window Ready
$(window).load(function () {
	Store.setProduct();
});

