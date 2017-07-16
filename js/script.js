$(function() {
	'use strict';

    $('#open-icon').on('click', function() {
    	console.log('open');
    	$('#close-icon').fadeIn();
    	$(this).fadeOut();
    	$('#slide-nav').fadeIn();
    });

    $('#close-icon').on('click', function() {
    	$('#open-icon').fadeIn();
    	$(this).fadeOut();
    	$('#slide-nav').fadeOut();
    });

    	var height = $(window).height();
	    var footer = $('#footer').offset().top;

    $(window).scroll(function() {
    	var width = $(window).width();
    	var now = $(window).scrollTop();
    	if(width < 1120) {
    		if(footer < height + now) {
    			$('#slide-top').fadeIn();
    		} else {
    			$('#slide-top').fadeOut();
    		}
    	}
    });

    $('#slide-top').on('click', function() {
    	$('html, body').animate({
    		scrollTop: 0
    	}, 1000);
    });

    var setImg = '#viewer';
    var fadeSpeed = 1000;
    var switchDelay = 6000;
 
    $(setImg).children('img').css({opacity:'0'});
    $(setImg + ' img:first').stop().animate({opacity:'1',zIndex:'20'},fadeSpeed);
 
    setInterval(function(){
        $(setImg + ' :first-child').animate({opacity:'0'},fadeSpeed).next('img').animate({opacity:'1'},fadeSpeed).end().appendTo(setImg);
    },switchDelay);

    $('.modal-open').on('click', function() {
    	$('#overlay').fadeIn();
    	var id = $(this).attr('id');
    	$('.modal').eq(id).fadeIn();
    });

    $('#overlay').on('click', function() {
    	$(this).fadeOut();
    	$('.modal').fadeOut();
    });


    $('#pp-open').on('click', function() {
    	$('#pp-overlay').fadeIn();
    });

    $('#pp-overlay i').on('click', function() {
    	$('#pp-overlay').fadeOut();
    });

    $('#submit_btn').on('click', function() {
    	var name = $('#last-name').val() + $('#first-name').val();
    	var nameKana = $('#last_name_kana').val() + $('#first_name_kana').val();
    	var phone = $('#phone_number').val();
    	var email = $('#mail_address1').val();
    	var checkLoop = false;
    	console.log('s');
    	for (var i = 1; i <= 4; i++) {
    		var checkVal = $('#contact_type' + i + ':checked').val();
    		if (checkVal) {
    			if (!checkLoop) {
	    			var checkBox =  checkVal;
    				checkLoop = true;
    			} else {
    				checkBox = checkBox + '/' + checkVal;
    			}
    		}
    	}
    	var description = $('#description').val();
    	if (!name || !nameKana || !phone || !email || !checkBox || !description) {
    		alert('未入力の内容があります！');
    		return false;
    	}
    	$('#confirm-modal p').eq(0).text(name);
    	$('#confirm-modal p').eq(1).text(nameKana);
    	$('#confirm-modal p').eq(2).text(phone);
    	$('#confirm-modal p').eq(3).text(email);
    	$('#confirm-modal p').eq(4).text(checkBox);
    	$('#confirm-modal p').eq(5).text(description);
    	$('#confirm-layer').fadeIn();
    	$('#confirm-modal').fadeIn();
    });

    $('#confirm-layer').on('click', function() {
    	$(this).fadeOut();
    	$('#confirm-modal').fadeOut();
    });

    var slideSpeed = 2500;

    $('#images-slider').slick({
	    slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: slideSpeed,
	});

});