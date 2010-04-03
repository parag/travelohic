<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?=$title?></title>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset-fonts-grid.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/nicescreen.css">
    </head>
    <body>
        <img src="<?=base_url()?>images/bgs/<?=$photo?>" class="bg" />
		<div id="moving"><div id="moviecomments"></div></div>
		<div id="menu">
            <ul>
                <li>
                    welcome Parag!
                </li>
                <li>
                    <a href="#">home</a>
                </li>
                <li>
                    <a href="#moods" id="openmoods">categories</a>
                </li>
                <li>
                    <a href="#comments" id="openslidecomments">comments</a>
                </li>
				<li>
                    <a href="#similiar" id="opensimiliar">similiar</a>
                </li>
            </ul>
        </div>
        <div id="description">
            <span>travelohic.com</span>
            <h1><a href=#><?=$name?></a></h1>
            <div>
                <h2><?=$description?></h2>
            </div>
        </div>
        <div id="similiar">
            testing the related field
			<span id="close-similiar"><a href="#" id="closesimiliar"><img src="<?=base_url()?>/images/icons/close.png"></a></span>
        </div>
		<div id="moods" class="slide-right">
			<span class="close-slider"><a href="#" id="closemoods"><img src="<?=base_url()?>/images/icons/close.png"></a></span>
			<ul>
			<?php
			$cg = new Categorie();
			$cg->get();
			foreach($cg->all as $cat)
			{
				echo "<li class='slidelist'><a href=#>".strtolower($cat->name)."</a></li>";
			}
			?>
			</ul>
		</div>
        <div id="slidecomments" class="slide-right">
        	<span class="close-slider"><a href="#" id="closeslidecomments"><img src="<?=base_url()?>/images/icons/close.png"></a></span>
            <form method = "post" name="commentform" id="commentform">
            	<div class="smallbox">
            		<label>
		                <span>comment</span>
		                <br/>
		                <br/>
		                <textarea class="message" name="commentarea" id="commentarea"></textarea>
		                <br/>
		                <br/>
		                <input type="button" class="button" value="comment" id="commentbutton">
		            </label>
            	</div>
            </form>
			<div id="allcomments">
				<div id="content-slider"></div>
				<div id="content-scroll">
					<div id="content-holder"></div>
					</div>
				</div>
			</div>
        </div>
        <div id="leader">
            <form method="get" action="#">
                <div class="box">
                    <label>
                        <span>name</span>
                        <input type="text" class="input_text" name="name" id="name">
                    </label>
                    <label>
                        <span>email</span>
                        <input type="text" class="input_text" name="email" id="email">
                    </label>
                    <label>
                        <span>phone</span>
                        <input type="text" class="input_text" name="phone" id="email">
                    </label>
                    <label>
                        <span>country</span>
                        <input type="text" class="input_text" name="country" id="country">
                    </label>
                    <label>
                        <span>comment</span>
                        <br/>
                        <br/>
                        <textarea class="message" name="comment" id="comment"></textarea>
                        <br/>
                        <br/>
                        <input type="button" class="button" value="enquire" onclick="alert('test');">
                    </label>
                </div>
            </form>
        </div>
    </body>
</html><!-- time for some javascript-->
<script src="<?=base_url()?>js/jquery.min.js"></script>
<script src="<?=base_url()?>js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>js/jquery.dotimeout.min.js"></script>
<script type="text/javascript">
     $(document).ready(function(){
	 	var iter = 0;
		var docHeight = $(document).height();
		var docWidth = $(document).width();
		var minTop = 20;
		var maxTop = docHeight - 74 - 200;
		var minLeft = 0;
		var maxLeft = docWidth - 600;
	 	var comments = {
			num: <?=$commentsNum?>,
			comments: <?=$commentsStr?>
		};
	 	var hide_sliders=function(){
			$("div#similiar").hide();
			$("div.slide-right").hide();
		};
		
		hide_sliders();
		commentsPlayer();
		setCommentsContent();
		
		var show_similiar=function(){
			if ($('div#similiar').is(':visible')) {
			    // do nothing
			} else {
			    $("div#similiar").show("slide", { direction: "down" }, 1000);
			}
		}
		
		var hide_similiar=function(){
			if ($('div#similiar').is(':visible')) {
			    $("div#similiar").hide("slide", { direction: "down" }, 1000);
			} else {
			    // do nothign
			}
		}
		
		var show_moods=function(){
			if ($('div#moods').is(':visible')) {
			    // do nothing
			} else {
			    $("div#moods").show("slide", { direction: "right" }, 1000);
			}
		}
		
		var hide_moods=function(){
			if ($('div#moods').is(':visible')) {
			    $("div#moods").hide("slide", { direction: "right" }, 1000);
			} else {
			    // do nothign
			}
		}
		
		var show_slidecomments=function(){
			if ($('div#slidecomments').is(':visible')) {
			    // do nothing
			} else {
			    $("div#slidecomments").show("slide", { direction: "right" }, 1000);
			}
		}
		
		var hide_slidecomments=function(){
			if ($('div#slidecomments').is(':visible')) {
			    $("div#slidecomments").hide("slide", { direction: "right" }, 1000);
			} else {
			    // do nothign
			}
		}
		
		var toggle_comment1=function(){
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
		var campaign_id = '<?=$campaign_id?>';
		var datastring = 'comment='+cmnt+'&campaign_id='+campaign_id+'&user_id=0';
		$.ajax({
			type:"POST",
			url:"http://localhost/travelohic/index.php/destination/addComment",
			data:datastring,
			success: function() {
				alert(datastring);
			}
		});
	   });
	   $("#content-slider").slider({
	   	animate:true,
		change:handleSliderChange,
		slide:handleSliderSlide
	   });
	   function handleSliderChange(e, ui)
		{
		  var maxScroll = $("#content-scroll").attr("scrollWidth") - $("#content-scroll").width();
		  $("#content-scroll").animate({scrollLeft: ui.value * (maxScroll / 100) }, 1000);
		}
		
		function handleSliderSlide(e, ui)
		{
		  var maxScroll = $("#content-scroll").attr("scrollWidth") - $("#content-scroll").width();
		  $("#content-scroll").attr({scrollLeft: ui.value * (maxScroll / 100) });
		}
		
		function commentsPlayer()
		{
			$("#moving").hide();
			var top = Math.floor(minTop + (maxTop - minTop)*Math.random());
			var left = Math.floor(minLeft + (maxLeft - minLeft)*Math.random()); 
			var cssObj = {
					      'left' : left + 'px',
					      'top' : top+'px'
					    }
			$("#moving").css(cssObj);
			$("#moviecomments").html("<a href=#>"+comments.comments[iter++ % comments.num]+"</a>");
			$("#moving").fadeIn(2000);
		}
		
		function setCommentsContent()
		{
			var comDiv = "";
			var j = 0;
			while(j<comments.num)
			{
				comDiv = comDiv + "<div class=\"content-item\">" + comments.comments[j++] + "</div>";
			}
			$("#content-holder").html(comDiv);
		}
     });
</script>

