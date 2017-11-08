$(window).load(function(){
    $(window).stellar();
    $.gsap.enabled(true);
    var notupperbar=$(".container");
    var menu=$("#menu");
    var openmenu=$(".openmenu");
    var animationtime;
    var map;
    //Registration Logic
    $(function () {
        $('#ind-program-select').change(function () {
            $('#subjects > div').hide();
            $('#subjects').find('#' + $(this).val()).show();
        });
        $('#contract').change(function () {
            $('#note > div').hide();
            $('#note').find('#' + $(this).val()).show();
        });
    });
    /*document.getElementById('group').onchange = function() {
        if(this.checked){
            $("#contract").removeAttr("disabled");
        }
        else{
            $("#contract").attr("disabled", true);
        }
    };*/
    $('#group').click(function()
    {
        $('.group-input').removeAttr("disabled");
        $('.ind-input').attr("disabled","disabled");
    });

    $('#individual').click(function()
    {
        $('.group-input').attr("disabled","disabled");
        $('.ind-input').removeAttr("disabled");
    });
    //MobileMenu Logic
    openmenu.click(function(){
		animationtime = 1000;
		if (notupperbar.hasClass("menushown") ){
            notupperbar.removeClass("menushown");
            menu.slideToggle(animationtime,"easeOutQuint",null);
		}
		else {
            notupperbar.addClass("menushown");
            menu.slideToggle(animationtime,"easeOutQuint",null);
		}
  	});
    $(window).resize(function() {
        if($(window).width() >= 800) {
            if (notupperbar.hasClass("menushown") ){
                notupperbar.removeClass("menushown");
                menu.slideToggle(animationtime,"easeOutQuint",null);s
            }
        }
    }).resize();
});
$(document).ready(function() {
	$('.faq li').each(function() {
		var tis = $(this), state = false, answer = tis.next('div').hide().css('height','auto').slideUp();
		tis.click(function() {
			state = !state;
			answer.slideToggle(state);
			tis.toggleClass('active',state);
		});
	});
});
