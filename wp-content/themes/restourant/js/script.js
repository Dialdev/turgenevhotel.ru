function windowSize(){
    if (jQuery(window).width() <= '1020'){
        jQuery('.my-catalog').css("margin","0 34px");
        jQuery('.content_site').css("width","730px");
		jQuery('.show_menu li:nth-child(3n + 2)').css("margin","15px 45px");
    } else {
       jQuery('.my-catalog').css("margin","0 54px");
	   jQuery('.content_site').css("width","770px");
	   jQuery('.show_menu li:nth-child(3n + 2)').css("margin","15px 65px");
    }
	 console.log(23)
	var ww1 = jQuery('.containers').width();
	setTimeout(function() {
		if (jQuery(window).width() <= '1150'){
			jQuery('.main_slider_nomers .nivoSlider .nivo-caption').width(ww1 - 420);
		} else {
			jQuery('.main_slider_nomers .nivoSlider .nivo-caption').width(ww1 - 590);
		}
		if (jQuery(window).width() <= '1150'){
			jQuery('.main_slider_restoraunt .nivoSlider .nivo-caption').width(ww1 - 420);
			jQuery('.akcia .cap').width(ww1 - 420);
		} else if (jQuery(window).width() <= '1499'){
			jQuery('.main_slider_restoraunt .nivoSlider .nivo-caption').width(ww1 - 590);
			jQuery('.akcia .cap').width(ww1 - 590);
		}
		else {
			jQuery('.main_slider_restoraunt .nivoSlider .nivo-caption').width(ww1 - 1000);
			jQuery('.akcia .cap').width(ww1 - 1010);
		}
	}, 500);
	var ht1 = jQuery('.sidebar').height();
	if (ht1 > 600 && ht1 < 1080){
		var gpt = jQuery('.custom-logo-link').height() + jQuery('#nav_menu-2').height() + jQuery('#text-2').height() + jQuery('#search-3').height();
		var it = (ht1 - gpt)/2.3;
		jQuery('#nav_menu-2').css({'padding-top': it});
		jQuery('#search-3').css({'padding-bottom': it});
	} else if (ht1 > 1080){
		jQuery('#nav_menu-2').css({'padding-top': '200px', 'padding-bottom': '200px'});
	} else {
		jQuery('#nav_menu-2').css('padding','0');
	}
	
	jQuery('.polzunok').click(function(){
		var t = jQuery('.main-bg').height();
		jQuery('html, body').animate({scrollTop: t},500);
	})
	
}
jQuery(window).on('load resize ready',windowSize);

var lasts = "";
(function($) {
	
	/*$(".cart_good_img .fon_bg3 a, .fancybox").fancybox();*/

	$('#nav_menu-2 .menu > li').each(function(){
		if ($(this).find('.sub-menu').length > 0){
			$(this).html('<span class="open_l not_l"></span>' + $(this).html());
		}	
	})
	if ($('.current-menu-item:visible') || $('.current-menu-parent:visible')){
		$('.current-menu-item').find("span").addClass("f");
		$('.current-menu-parent').find("span").addClass("f");
	}
	$("#nav_menu-2").on('click','.open_l',function(){
		$(this).removeClass("f");
		if ( $(this).hasClass("ok_po") ) {
			var opens = $(this).parents('.menu-item');
			$(this).removeClass("ok_po");
			$(opens).find('.sub-menu').finish().slideUp('slow');
		} else {
			if ($(lasts).get(0) == $(this).get(0)){
				if ( $(this).hasClass("ok_po") ) {
					var opens = $(this).parents('.menu-item');
					$(opens).find('.sub-menu').finish().slideUp('slow');
					$(this).removeClass("ok_po");
				} else {
					var opens = $(this).parents('.menu-item');
					$(opens).find('.sub-menu').finish().slideDown('slow');
					$(this).addClass("ok_po");	
				}
			} else {
				$('.sub-menu').finish().slideUp('slow');
				$(this).addClass("ok_po");
				$(lasts).removeClass("ok_po");
				var opens = $(this).parents('.menu-item');
				$(lasts).find('.sub-menu').finish().slideUp('slow');
				//$(opens).find('.sub-menu').show();
				var timer;
				timer = setTimeout(function(){
					$(opens).find('.sub-menu').finish().slideDown('slow');
				},250);
				lasts = $(this);
			}
		}	
	})
	
	 /*$.datepicker.regional['ru'] = {
			closeText: 'Закрыть',
			prevText: '&#x3C;Пред',
			nextText: 'След&#x3E;',
			currentText: 'Сегодня',
			monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
			'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
			monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
			'Июл','Авг','Сен','Окт','Ноя','Дек'],
			dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
			dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
			dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
			weekHeader: 'Нед',
			dateFormat: 'dd-mm-yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['ru']);
	$("#zaezd").datepicker({showWeek:true, firstDay:1});
	$("#vyezd").datepicker({showWeek:true, firstDay:1});*/
	/* $('#zaezd,#zaezd_n').datepicker({ 
			closeText: 'Закрыть',
			prevText: '<Пред',
			nextText: 'След>',
			currentText: 'Сегодня',
			monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
			monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
			dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
			dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
			dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
			weekHeader: 'Нед',
			dateFormat: 'dd-mm-yy',
			firstDay: 1,
			showAnim: 'slideDown',
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: '',
			minDate: 0
	});
	$('#vyezd,#vyezd_n').datepicker({ 
			closeText: 'Закрыть',
			prevText: '<Пред',
			nextText: 'След>',
			currentText: 'Сегодня',
			monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
			monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
			dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
			dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
			dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
			weekHeader: 'Нед',
			dateFormat: 'dd-mm-yy',
			firstDay: 1,
			showAnim: 'slideDown',
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: '',
			minDate: 1
	}); */

	$('.spec-block__title').click(function(){		
		
		if ($(this).hasClass('spec-block__title_open')){
			$(this).removeClass('spec-block__title_open');
		} else {
			$('.spec-block__title').removeClass('spec-block__title_open');
			$(this).addClass('spec-block__title_open');
		}
		
		if ($(this).next().hasClass('spec-block__hide_open')){
			$(this).next().slideToggle('fast').removeClass('spec-block__hide_open');
		} else {
			$('.spec-block__hide_open').slideToggle('fast').removeClass('spec-block__hide_open');
			$(this).next().slideToggle('fast').addClass('spec-block__hide_open');
		}
	});
	
	$( "body" ).on( "submit", "#wpcf7-f4-o1 form", function() {
		yaCounter42627919.reachGoal('zakaz_zvonka');
		console.log("zakaz_zvonka");
	});
	$( "body" ).on( "click", "#booking__id", function() {
		yaCounter39137518.reachGoal('bronirovanie');
		console.log("bronirovanie ok");
	});
	
})(jQuery)

var i = 0;
jQuery('.open_menus').click(function(){
	jQuery('.shoutdown').toggle(850);
	i++;
	if (i == 1){
		jQuery(this).find('div').css('background-color','#4e272f');
	} else {
		jQuery(this).find('div').css('background-color','#d4b988');
		i = 0;
	}
})

jQuery(function(){
	jQuery('.slid img').each(function(){
		var src = jQuery(this).parents('a').attr('href');
		if (typeof src != "undefined"){
			jQuery('.slid').append('<div class="min_sl"><div></div><a href='+ src +' class="fancybox image" rel="num"><img src='+ jQuery(this).attr("src") +'></a></div>');
		} else {
			jQuery('.slid').append('<div class="min_sl"><div></div><img src='+ jQuery(this).attr("src") +'></div>');
		}
		jQuery(this).remove();
	})
	jQuery('.locale').each(function(){
		jQuery(this).val(location.href);
	})

	
})




jQuery(document).ready(function(){
	jQuery('.slid > div').hover(function(){
	  jQuery(this).find('div').hide("fade",{},500);
	},
	function(){
	  jQuery(this).find('div').show("fade",{},500);
	});
	var img_v = jQuery('.slid > div').length;
	if (img_v > 4){
		jQuery('.slid').append('<div class="mini_slider_left"></div><div class="mini_slider_right"></div>');
	}
	var j = 0;
	if (img_v > 4){
	s = 4;
	} else {
		s = img_v
	}
	jQuery('.mini_slider_right').click(function(){
		if ((j + s) < img_v){
			jQuery(".slid .min_sl").eq(j).hide(0);
			jQuery(".slid .min_sl").eq(j + s).show("fade",{}, 650);
			j++;
			console.log(2);
		} else {
		/*console.log((j - 1) + s);
			jQuery(".slid > div").eq((j - 1) + s).hide(0);
			j = 0;
			jQuery(".slid > div").eq(j).show("slide",{"direction":"left"}, 150);
			*/
		}
	})
	jQuery('.mini_slider_left').click(function(){
	if (j == 0){	
		/*jQuery("ul.specials-tovars li").eq(j).hide(0);
		j = (img_v - 1);
		jQuery("ul.specials-tovars li").eq(j).show("slide",{"direction":"right"}, 150);*/
	} else {
		j--;
		jQuery(".slid .min_sl").eq(j + s).hide(0);
		console.log(j + s);
		jQuery(".slid .min_sl").eq(j).show("fade",{}, 650);
		
		}
	})
	jQuery(".slid > .min_sl").hide(0);
	jQuery(".slid > .min_sl:lt(4)").show(200);
	
	jQuery('.brons').click(function(){
		jQuery('.date-in').val(jQuery('#zaezd').val());
		jQuery('.date-out').val(jQuery('#vyezd').val());
	})
	jQuery('.zumbies > br').each(function(){
		jQuery(this).remove();
	})
	
	jQuery('.sam_bron').click(function(){
		jQuery('#brons').find('h2').text('Забронировать номер ' + jQuery(this).val())
		jQuery('.your-rooms').val(jQuery(this).val())
	})
})

function milledy(){ 
	if (jQuery(".polzunok").hasClass("stop")){
		
	} else {
		if (jQuery(".polzunok").hasClass("millis")){
			jQuery(".polzunok").removeClass("millis").addClass("villis");;
			jQuery(".polzunok").css({"bottom":"5%","transition":"1s"});
		} else {
			jQuery(".polzunok").removeClass("villis").addClass("millis");
			jQuery(".polzunok").css({"bottom":"2%","transition":"1s"});
		}
	}	
}
setInterval(milledy, 1200);
jQuery(".polzunok").mouseenter(function(){
	jQuery(".polzunok").addClass("stop");
}).mouseleave(function(){
	jQuery(".polzunok").removeClass("stop");
});

jQuery(document).ready(function(){
	var height_cart_good = jQuery('.cart_good').eq(0).height();
	jQuery('.item_cart .cart_good').each(function(){
		if (height_cart_good < jQuery(this).height()){
			height_cart_good = jQuery(this).height();
		}
	})
	jQuery('.cart_good').height(height_cart_good);
})




/*Слайдер категорий в меню*/

jQuery(document).ready(function(){
	
  jQuery('.menu_parent').slick({
        slidesToShow:8,
        slidesToScroll: 2,
         infinite: true,
  });
	
$(function() {
   $(".fancybox").fancybox({ 
	   'hideOnContentClick' : false,
	   'closeClick' : false
   });
	
});

	/*
$(".fancybox-close").click(function(){
	$.fancybox.close();
});	
*/
	
});


$(".fancybox").click(function(){
	gtag('event', 'заказать', {'event_category': 'звонок', 'event_label': 'успешно'});
	ym(42628189,'reachGoal','zakaz_zvonka');
});