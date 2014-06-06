/****************************************************************
	Window load event
 ****************************************************************/
$(window).load(function() {

	//Hide loader
	$('#loader').fadeOut(500, function() {
		$('#loader').hide();

		// Start twitter feed plugin
		$("#twitter-ticker").tweet({
			
			username     : "HIDDEN_BMX",
			page         : 1,
			avatar_size  : 32,
			count        : 20,
			loading_text : "loading tweets..."
			
		}).bind("loaded", function() {
			var ul = $(this).find(".tweet_list");
			var ticker = function() {
				setTimeout(function() {
					var top = ul.position().top;
					var h = ul.height();
					var incr = (h / ul.children().length);
					var newTop = top - incr;
					if (h + newTop <= 0) newTop = 0;
					ul.animate( {top: newTop}, 500 );
					ticker();
				}, 5000);
			};
			ticker();
        })

 	});
 	
});

/****************************************************************
	Document ready event
 ****************************************************************/
$(document).ready(function(){

	function getURLParameter(name) {
    	return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||false;
	}	
/****************************************************************
	AUTOGENARATED DEMO CODE, IGNORE IT PLEASE
 ****************************************************************/
var newParameters=[4,11,5,5,1,7,7,1,0,1,0,0,1];
var paramPos={usescroll:4,show_topnav:7,reduce_animation:8,show_cd:9,leading_zeros:10,test_callback:11,show_arrows:12};
var demolinks = ['demo-orange','demo-red','demo-magenta','index','demo-blue2','demo-green1','demo-green2','demo-yellow'];
var newOptions = getURLParameter('options');
if (newOptions) {newOptions = newOptions.split(':').map(Number);if (newOptions.length == newParameters.length) {newParameters = newOptions;}}
$('#pallete').find('#pal'+newParameters[0]).addClass('clicked');$('#overtype').find('#over'+newParameters[1]).addClass('clicked');
$('#overlay_imgopacity option:nth-child('+(newParameters[2]+1)+')').prop("selected", true);$('#overlay_bgopacity option:nth-child('+(newParameters[3]+1)+')').prop("selected", true);
if (newParameters[4] == 1) {$('#usescroll').find('.chkbox-inner').addClass('clicked');}
$('#easing_type option:nth-child('+(newParameters[5]+1)+')').prop("selected", true);$('#easing_time option:nth-child('+(newParameters[6]+1)+')').prop("selected", true);
if (newParameters[7] == 1) {$('#show_topnav').find('.chkbox-inner').addClass('clicked');}if (newParameters[8] == 1) {$('#reduce_animation').find('.chkbox-inner').addClass('clicked');}	
if (newParameters[9] == 1) {$('#show_cd').find('.chkbox-inner').addClass('clicked');}if (newParameters[10] == 1) {$('#leading_zeros').find('.chkbox-inner').addClass('clicked');}		
if (newParameters[11] == 1) {$('#test_callback').find('.chkbox-inner').addClass('clicked');}if (newParameters[12] == 1) {$('#show_arrows').find('.chkbox-inner').addClass('clicked');}	
$(".chzn-select").chosen();
$('#overlay_imgopacity').change(function() {newParameters[2] = this.selectedIndex;});$('#overlay_bgopacity').change(function() {newParameters[3] = this.selectedIndex;});
$('#easing_type').change(function() {newParameters[5] = this.selectedIndex;});$('#easing_time').change(function() {newParameters[6] = this.selectedIndex;});
$('#settings-inner').click(function() {if ($(this).attr("class") == 'opened') {$('#settings').animate({ left: 0 }, 250);} else {$('#settings').animate({ left: 340 }, 250);}$(this).toggleClass('opened');});
$('#pallete li').click(function() {$('#pallete li').removeClass('clicked');$(this).addClass('clicked');newParameters[0] = $(this).index()+1;});
$('#overtype li').click(function() {$('#overtype li').removeClass('clicked');$(this).addClass('clicked');newParameters[1] = $(this).index()+1;});
$('.chkbox').click(function() {$(this).find('.chkbox-inner').toggleClass('clicked');var clicked = ($(this).find('div').attr("class") == 'chkbox-inner clicked') ? 1 : 0;var changeParam = paramPos[$(this).attr('id')];newParameters[changeParam] = clicked;});
$('.new-settings').click(function() {var newurl = demolinks[newParameters[0]-1]+'.html?options='+newParameters.join(':');window.location.href = newurl;});
var demo_easing = ['linear','swing','jswing','easeOutQuad','easeOutCubic','easeOutQuart','easeOutQuint','easeOutSine','easeOutExpo','easeOutCirc','easeOutElastic','easeOutBack','easeOutBounce','easeInOutQuad','easeInOutCubic','easeInOutQuart','easeInOutQuint','easeInOutSine','easeInOutExpo','easeInOutCirc','easeInOutElastic','easeInOutBack'],
demo_time = [700,750,800,850,900,950,1000,1050,1100,1150,1200],demo_opacity = ['0.0','0.1','0.2','0.3','0.4','0.5','0.6','0.7','0.8','0.9','1.0'],
animation_show = true,
animation_init = true,
navigation_show = false,		
countdown_show = false,
arrows_show = false,
scroll_animated = ((newParameters[4] == 1)) ? true : false,
scroll_easing = ((demo_easing.length >= newParameters[5]) ? demo_easing[newParameters[5]-1] : 'easeOutCirc'),
scroll_duration = ((demo_time.length >= newParameters[6]) ? demo_time[newParameters[6]-1] : 900),
countdown_date = (new Date()).getTime() + 10*24*60*60*1000,
countdown_triforce = (newParameters[10] == 1) ? true : false,
countdown_call = function(){},
overlay_src = 'images/overlays/'+newParameters[1]+'.png',
overlay_imgopacity = ((demo_opacity.length >= newParameters[2]) ? demo_opacity[newParameters[2]-1] : '0.8'),
overlay_bgopacity = ((demo_opacity.length >= newParameters[3]) ? demo_opacity[newParameters[3]-1] : '0.2'),
vegas_backgrounds = [{ src : 'images/backgrounds/SUBROSA_Nick_Bullen_.jpg', fade : 2500 },{ src : 'images/backgrounds/cover201406.jpg',    fade : 2500 }],
form_msg = {normal : 'Address ({EMAIL}) is added',err_server : 'Unexpected server error',err_ajax : 'Please try again later...',err_incorrect : 'Please enter the correct address'},
height_care	= false;
if (newParameters[11] == 1) {countdown_date = (new Date()).getTime() + 5*1000;countdown_call = function(){alert('Time is up!\nYou can use redirect here, or any other function...')};}
var page_width = $(window).width(),page_height = $(window).height(),
full_height = $('.full_height'),vcentred = $('.vcentered'),formState = $('#formstate'),
formNormal = formState.html(),section_list = ['home', 'getintouch', 'subscribe'],
countdown_sel = '#countdown',countdown_txt = '#counttype',countdown_parent = '#timer-holder',
content_wrap = $('#content-wrap').css("background-color"),full_viewport = $('html,body'),unique_call = false,
is_mobile = ($('#ismobile').css('display') == 'none') ? true : false;
		
/****************************************************************
	Internal functions 
 ****************************************************************/
	function validMail(email) {
  		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  		return regex.test(email);
	} // validMail
	
	function scut(sel) {return sel.substr(1)}
	
	function sorc(sel) {
  		return (sel.indexOf('#') === -1) ? 'class' : 'id'; 
	} // sorc

	function toggleCSS (sel, dir, up, invert) {
		dir = (invert) ? dir : !dir;
		
		if (up) {
			var show_t = 'showDown',
				hide_t = 'hideUp';
		} else {
			var show_t = 'showUp',
				hide_t = 'hideDown';			
		}

		if (dir) {
			sel.removeClass(show_t);
			sel.animate({ opacity: 0 }, 500);
			sel.addClass(hide_t);
		} else {
			sel.removeClass(hide_t);
			sel.animate({ opacity: 1 }, 500);
			sel.addClass(show_t);
		}
	} // toggleCSS

	function setupPage(sel) {
		$(sel).css("height", page_height);
		$(sel).find('.ancor-out').css('top', page_height / 2);
	} // setupPage
	
	function correctHeight() {
		full_height.each(function(k, sel) {
			if (height_care) {
				if ($(sel).height() < page_height) {
					setupPage(sel);
				}

			} else {
				setupPage(sel);
			} // if (height_care)
		});
	} // correctHeight

	function correctVCenter() {
		vcentred.each(function(k, sel) {
			$(sel).css('padding-top', ($(sel).parent().height() - $(sel).height()) / 2);
		});
	} // correctVCenter

	function formStateChange(msg, ms, selfc) {
		selfc = (selfc === undefined) ? false : true;
		formState.animate({ opacity: 0 },{
			duration: 100,
			complete: function(){
				formState.html(msg);
				formState.animate({ opacity: 1 }, {
					duration: 200,
					complete: function(){
						if (!selfc) {
							formStateChange(formNormal, 1, true);
						}
					}
				}).delay(ms);
     		}
		});
	} // formStateChange

/****************************************************************
	Event holders
 ****************************************************************/
	// Navigaton and arrow clicks
	if (scroll_animated) {
		$('a[href*=#]').click(function() {
			$.scrollTo($($(this).attr("href")), {
        		duration : scroll_duration,
        		easing   : scroll_easing,
        		axis     : 'y'
    		});
    		return false;
		})
	}

	// Ajax form submit
   	$("#sb-submit").click( function(e) {
		var sbemail = $("#sb-email").val();
		if (sbemail != unique_call ) {
			unique_call = sbemail;			
			if (validMail(sbemail)) {
				$.ajax({
					type: "POST",
					url: "subscribe.php",
					data: 'sbemail='+ sbemail,
					success: function(msg) {
						if(msg=='Added') {
							formStateChange(form_msg['normal'].replace('{EMAIL}', sbemail), 2000);
						} else {
							formStateChange(form_msg['err_server'], 2000);
						}
					},
					error: function() {
						formStateChange(form_msg['err_ajax'], 2000);
					}
				});
			} else {
				formStateChange(form_msg['err_incorrect'].replace('{EMAIL}', sbemail), 1000);
			}
		}
		return false;
	});
	
	// Resize event
	$(window).resize(function(){
		page_width = $(window).width();
		page_height = $(window).height();
  		correctHeight();
  		correctVCenter();
	});	
	
/****************************************************************
	Initialization
 ****************************************************************/
	// Let's disable animation for mobile devices 
	if (is_mobile) {
		animation_show = false;
		animation_init = false;
	}
	
	if (!arrows_show) {
		$('.arrow-wrap').hide();
	}
	// Correct page background
	if (content_wrap.indexOf('rgba') !== -1) {
		$('#content-wrap').css("background-color", content_wrap.substring(0,(content_wrap.lastIndexOf(',')+1))+overlay_bgopacity+')');
	}

	// Create animation triggers
	$.each(section_list, function(i, sel){
		$('#'+sel).prepend('<div id="'+sel+'-in" class="ancor-in"></div>');  // reserved 
		$('#'+sel).append('<div id="'+sel+'-out" class="ancor-out"></div>'); // main triggers (#home-out, #getintouch-out, #subscribe-out)
	});
	
	// Create countdown
	if (countdown_show) {
		
		//Fix markup
		$(countdown_parent).append('<div '+sorc(countdown_sel)+'="'+scut(countdown_sel)+'" class="hidden-phone"></div>');
		$(countdown_parent).append('<div '+sorc(countdown_txt)+'="'+scut(countdown_txt)+'" class="hidden-phone"></div>');		

		//Start plugin
		$(countdown_sel).countdown({
			timestamp : countdown_date,
			callback  : countdown_call,
			triforce  : countdown_triforce,
			txt_sltr  : countdown_txt
		});
		
	} // if (countdown_show)
	
	// Height correction
	correctHeight();
	correctVCenter();

	if (animation_show || animation_init) {
		
		// Get animation selectors
		var	top_f1  = $('#home').find('.fade1'), 
			top_f2  = $('#home').find('.fade2'),
			top_f3  = $('#home').find('.logo'),
			git_f1  = $('#getintouch').find('.fade1'),
			git_f2  = $('#getintouch').find('.fade2'),
			sub_f1  = $('#subscribe').find('.fade1'),
			sub_f2  = $('#subscribe').find('.fade2');
			
		// Hide #geiintouch and #subscribe animated elements
		if (animation_show) {
			git_f1.css({ opacity: 0 });
			git_f2.css({ opacity: 0 });
			sub_f1.css({ opacity: 0 });
			sub_f2.css({ opacity: 0 });
		}
			
		if (animation_init) {
			
			// Hide #home animated elements
			top_f1.css({ opacity: 0 });
			top_f2.css({ opacity: 0 });
			top_f3.css({ opacity: 0 });
			
			// Initial #home animation			
			toggleCSS( top_f1, false, true,  true );
			toggleCSS( top_f2, false, false, true );
			top_f3.animate({ opacity: 1  }, 1500);
			
		} // if (animation_init)
		
	} // if (animation_show || animation_init)
	
	// Setup animation waypoints
	if (animation_show) {
		
		$('#home-out').waypoint(function(event, dir) {
			dir = (dir === 'down') ? true : false;
			toggleCSS( top_f1, dir, true,  true );
			toggleCSS( top_f2, dir, false, true );
			toggleCSS( git_f1, dir, true,  false );
			toggleCSS( git_f2, dir, false, false );
		});

		$('#getintouch-out').waypoint(function(event, dir) {
			dir = (dir === 'down') ? true : false;
			toggleCSS( git_f1, dir, true,  true );
			toggleCSS( git_f2, dir, false, true );
			toggleCSS( sub_f1, dir, true,  false );
			toggleCSS( sub_f2, dir, false, false );
		});
		
	} // if (animation_show)
	
	// Setup navigation waypoint
	if (navigation_show) {

		var top_nav = $('#top-header');
	
		$('#home-out').waypoint(function(event, dir) {
			dir = (dir === 'down') ? true : false;
			top_nav.animate({ top: ((dir) ? '0' : '-70px') }, 800);
			
		});
		
	} // if (navigation_show)
	
	// Start Vegas plugin
	$.vegas('slideshow', {
			backgrounds : vegas_backgrounds,
			loading     : false
		})('overlay', {
			src         : overlay_src,
			opacity     : overlay_imgopacity 
	});

});


