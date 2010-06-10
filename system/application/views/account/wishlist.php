<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="title" content="<?=$title?>" /> 
		<meta name="description" content="<?=$description?>" /> 
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <title><?=$title?></title>
		<link rel="icon" href="<?=base_url()?>images/favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset-fonts-grid.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/messagescreen.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/dark-hive/jquery-ui-1.8.1.custom.css">
        <style>
        // overwrite
        	.ui-tabs { position: absolute; padding: .2em; zoom: 1; height: 400px;} /* position: relative prevents IE scroll bug (element with position: relative inside container with overflow: auto appear as "fixed") */
			.ui-tabs .ui-tabs-nav { margin: 0; padding: .2em .2em 0; }
			.ui-tabs .ui-tabs-nav li { list-style: none; float: left; position: relative; top: 1px; margin: 0 .2em 1px 0; border-bottom: 0 !important; padding: 0; white-space: nowrap; }
			.ui-tabs .ui-tabs-nav li a { float: left; padding: .5em 1em; text-decoration: none; }
			.ui-tabs .ui-tabs-nav li.ui-tabs-selected { margin-bottom: 0; padding-bottom: 1px; }
			.ui-tabs .ui-tabs-nav li.ui-tabs-selected a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-state-processing a { cursor: text; }
			.ui-tabs .ui-tabs-nav li a, .ui-tabs.ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-selected a { cursor: pointer; } /* first selector in group seems obsolete, but required to overcome bug in Opera applying cursor: text overall if defined elsewhere... */
			.ui-tabs .ui-tabs-panel { display: block; border-width: 0; padding: 1em 1.4em; background: none; height: 400px;}
			.ui-tabs .ui-tabs-hide { display: none !important; }
        </style>
    </head>
    <body>
    	<div id="left">
    		<div id="map">
    		</div>
    	</div>
		<div id="right">
			<div class="box">
                <div class="box" style="">
                	<?php 
                		$userpic = base_url()."/images/profile/".$a->photo;
						if($a->fb_uis!="")
						{
							$userpic = "https://graph.facebook.com/".$a->fb_uis."/picture";
						}
                	?>
                	<img src="<?php echo $userpic; ?>" align="left"/>
                     <label>
                        <span><small>Name</small></span>
                        <?php echo $a->name; ?>
                    </label>
					 <label>
                        <span><small>Country</small></span>
                        <?php 
                        	$cid = $a->country_id;
                        	$co = new Countrie();
                        	$co->where('id',$cid)->get();
                        	echo $co->country;
                        ?>
                    </label>
                </div>
            </div>
            <div>
            <br/><br/><br/><br/><br/>
        <div id="tabs"> 
			<ul> 
				<li><a href="#wishlist"><img src="http://labs.google.com/ridefinder/images/mm_20_orange.png">WISHLIST</a></li> 
				<li><a href="#tabs-2"><img src="http://labs.google.com/ridefinder/images/mm_20_green.png">VISITED</a></li> 
			</ul> 
			<div id="wishlist">
				<ul id="grid">
				<?
				$w = new Wishe();
				$w->where('user_id', $a->id)->get();
				$count = 0;
				$wishes_mark = "[";
				foreach($w->all as $wish)
				{
					$c = new Campaign();
					$c->where('id', $wish->campaign_id)->get();
					$pic = base_url()."images/bgsmall/".$c->photo;
					$url = site_url('destination/index/'.$c->nickname);
					echo "<li><a href=".$url."><img src=\"".$pic."\" height=50px/></a></li>";
					if($count)
						$wishes_mark = $wishes_mark.",";
					$wishes_mark = $wishes_mark."[";
					$wishes_mark = $wishes_mark."'".$c->name."', '".$c->description."', '".$url."', '".$pic."',".$c->lat.",".$c->lng;
					$wishes_mark = $wishes_mark."]";
					$count++;
				}
				$wishes_mark = $wishes_mark."]";
				if($count==0)
					echo "No destination added in wishlist yet.";
				else
					echo "Click on destination to add to your wishlist.";
				?>
				</ul>
			</div> 
			<div id="tabs-2">
				<ul id="grid">
				<?
				$w = new Visited();
				$w->where('user_id', $a->id)->get();
				$count = 0;
				$visited_mark = "[";
				foreach($w->all as $wish)
				{
					$c = new Campaign();
					$c->where('id', $wish->campaign_id)->get();
					$pic = base_url()."images/bgsmall/".$c->photo;
					$url = site_url('destination/index/'.$c->nickname);
					echo "<li><a href=".$url."><img src=\"".$pic."\" height=50px/></a></li>";
					if($count)
						$visited_mark = $visited_mark.",";
					$visited_mark = $visited_mark."[";
					$visited_mark = $visited_mark."'".$c->name."', '".$c->description."', '".$url."', '".$pic."',".$c->lat.",".$c->lng;
					$visited_mark = $visited_mark."]";
					$count++;
				}
				$visited_mark = $visited_mark."]";
				if($count==0)
					echo "No destination visited yet.";
				else
					echo "Click on destination to add to visited list.";
				?>
				</ul>
			</div> 
		</div>
    </div>
			
	</div>
		<div id="menu">
            <ul>
                <li>
                    <a href="#">home</a>
                </li>
				
            </ul>
        </div>
		
		<div id="copyrights">copyrights &copy; travelohic.com</div>
    </body>
</html>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?=base_url()?>js/jquery.min.js"></script>
<script src="<?=base_url()?>js/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() {
	$("#tabs").tabs();
});
var markers = <?php echo $wishes_mark; ?>;
var visited = <?php echo $visited_mark; ?>;
initialize();
  function initialize() {
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
      zoom: 2,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.HYBRID
    };
    var map = new google.maps.Map(document.getElementById("map"), myOptions);
    setMarkers(map, markers);
    setVisited(map, visited);
  }

  function setMarkers(map, markers) {
	  for (var i=0; i<markers.length; i++){
		  var marker = markers[i];
		  var tLatLng = new google.maps.LatLng(marker[4], marker[5]);
		  var image = new google.maps.MarkerImage('http://labs.google.com/ridefinder/images/mm_20_orange.png',
			      // This marker is 20 pixels wide by 32 pixels tall.
			      new google.maps.Size(20, 20),
			      // The origin for this image is 0,0.
			      new google.maps.Point(0,0),
			      // The anchor for this image is the base of the flagpole at 10,10.
			      new google.maps.Point(0, 20));
					  
		  var overMarker = createMarker(map, marker, image);
	  }
  }
  function setVisited(map, markers) {
	  for (var i=0; i<markers.length; i++){
		  var marker = markers[i];
		  var image = new google.maps.MarkerImage('http://labs.google.com/ridefinder/images/mm_20_green.png',
			      // This marker is 20 pixels wide by 32 pixels tall.
			      new google.maps.Size(20, 20),
			      // The origin for this image is 0,0.
			      new google.maps.Point(0,0),
			      // The anchor for this image is the base of the flagpole at 10,10.
			      new google.maps.Point(0, 20));
		  var overMarker = createMarker(map, marker, image);
	  }
  }

  function createMarker(map, marker, image) {
	  var tLatLng = new google.maps.LatLng(marker[4], marker[5]);
	  var overMarker = new google.maps.Marker({
		  position: tLatLng,
	  	  map: map,
	  	  icon: image,
  	  	  title: marker[0]
	  });
	  var contentString = "<div class='mapcontent'><h3><a href='"+marker[2]+"'>"+marker[0]+"</a></h3><br/><img src='"+marker[3]+"' align='left'><div id='content'>"+marker[1]+"</div></div>";
	  var infoWindow = new google.maps.InfoWindow({
		  content: contentString,
		  maxWidth: 400
	  });
	  google.maps.event.addListener(overMarker, 'click', function() {
		  infoWindow.open(map, overMarker);
	  });
	  return overMarker;
    }
</script>
