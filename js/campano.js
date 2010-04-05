/*
 * @author parag
 */
var base_url = "http://localhost/travelohic/index.php/";
$(document).ready(function(){
    var iter = 0;
    var docHeight = $(document).height();
    var docWidth = $(document).width();
    var minTop = 20;
    var maxTop = docHeight - 74 - 200;
    var minLeft = 0;
    var maxLeft = docWidth - 600;
    var hide_sliders = function(){
        $("div#similiar").hide();
        $("div.slide-right").hide();
		$("div#loginwindow").hide();
    };
    
    hide_sliders();
    commentsPlayer();
    setCommentsContent();
    
    var show_similiar = function(){
        if ($('div#similiar').is(':visible')) {
            // do nothing
        }
        else {
            $("div#similiar").show("slide", {
                direction: "down"
            }, 1000);
        }
    }
    
    var hide_similiar = function(){
        if ($('div#similiar').is(':visible')) {
            $("div#similiar").hide("slide", {
                direction: "down"
            }, 1000);
        }
        else {
            // do nothign
        }
    }
    
    var show_moods = function(){
        if ($('div#moods').is(':visible')) {
            // do nothing
        }
        else {
            $("div#moods").show("slide", {
                direction: "right"
            }, 1000);
        }
    }
    
    var hide_moods = function(){
        if ($('div#moods').is(':visible')) {
            $("div#moods").hide("slide", {
                direction: "right"
            }, 1000);
        }
        else {
            // do nothign
        }
    }
	
	var show_login = function(){
        if ($('div#loginwindow').is(':visible')) {
            // do nothing
        }
        else {
            $("div#loginwindow").show("slide", {
                direction: "left"
            }, 1000);
        }
    }
    
    var hide_login = function(){
        if ($('div#loginwindow').is(':visible')) {
            $("div#loginwindow").hide("slide", {
                direction: "left"
            }, 1000);
        }
        else {
            // do nothign
        }
    }
    
    var show_slidecomments = function(){
        if ($('div#slidecomments').is(':visible')) {
            // do nothing
        }
        else {
            $("div#slidecomments").show("slide", {
                direction: "right"
            }, 1000);
        }
    }
    
    var hide_slidecomments = function(){
        if ($('div#slidecomments').is(':visible')) {
            $("div#slidecomments").hide("slide", {
                direction: "right"
            }, 1000);
        }
        else {
            // do nothign
        }
    }
    
    var toggle_comment1 = function(){
        $("#comments").doTimeout(8000, function(){
            commentsPlayer();
            toggle_comment1();
        });
    }
    toggle_comment1();
    
    $("#opensimiliar").click(function(event){
        hide_moods();
        hide_slidecomments();
        show_similiar();
        event.preventDefault();
    });
    $("#closesimiliar").click(function(event){
        hide_similiar();
        event.preventDefault();
    });
    $("#openmoods").click(function(event){
        hide_similiar();
        hide_slidecomments();
        show_moods();
        event.preventDefault();
    });
    $("#closemoods").click(function(event){
        hide_moods();
        event.preventDefault();
    });
    $("#openslidecomments").click(function(event){
        hide_similiar();
        hide_moods();
        show_slidecomments();
        event.preventDefault();
    });
    $("#closeslidecomments").click(function(event){
        hide_slidecomments();
        event.preventDefault();
    });
    $("#commentbutton").click(function(event){
        var cmnt = $("#commentarea").val();
        var datastring = 'comment=' + cmnt + '&campaign_id=' + campaign_id + '&user_id=0';
        $.ajax({
            type: "POST",
            url: base_url + "destination/addComment",
            data: datastring,
            success: function(){
                alert(datastring);
            }
        });
    });
    $("#content-slider").slider({
        animate: true,
        change: handleSliderChange,
        slide: handleSliderSlide
    });
	$("#closelogin").click(function(event){
        hide_login();
        event.preventDefault();
    });
	$("#openlogin").click(function(event){
        show_login();
        event.preventDefault();
    });
	$("#loginbtn").click(function(event){
		$.ajax({
			type: "POST",
			url: base_url + "accounts/login",
		});
	});
    function handleSliderChange(e, ui){
        var maxScroll = $("#content-scroll").attr("scrollWidth") - $("#content-scroll").width();
        $("#content-scroll").animate({
            scrollLeft: ui.value * (maxScroll / 100)
        }, 1000);
    }
    
    function handleSliderSlide(e, ui){
        var maxScroll = $("#content-scroll").attr("scrollWidth") - $("#content-scroll").width();
        $("#content-scroll").attr({
            scrollLeft: ui.value * (maxScroll / 100)
        });
    }
    
    function commentsPlayer(){
        $("#moving").hide();
        var top = Math.floor(minTop + (maxTop - minTop) * Math.random());
        var left = Math.floor(minLeft + (maxLeft - minLeft) * Math.random());
        var cssObj = {
            'left': left + 'px',
            'top': top + 'px'
        }
        $("#moving").css(cssObj);
        $("#moviecomments").html("<a href=#>" + comments.comments[iter++ % comments.num] + "</a>");
        $("#moving").fadeIn(2000);
    }
    
    function setCommentsContent(){
        var comDiv = "";
        var j = 0;
        while (j < comments.num) {
            comDiv = comDiv + "<div class=\"content-item\">" + comments.comments[j++] + "</div>";
        }
        $("#content-holder").html(comDiv);
    }
});
