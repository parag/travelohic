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
        <h1>WISHLIST</h1>
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
			echo "<li><a href=".$url."><img src=\"".$pic."\"/></a></li>";
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
<script type="text/javascript">
var markers = <?php echo $wishes_mark; ?>;
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
  }

  function setMarkers(map, markers) {
	  for (var i=0; i<markers.length; i++){
		  var marker = markers[i];
		  var tLatLng = new google.maps.LatLng(marker[4], marker[5]);
		  var image = new google.maps.MarkerImage('http://labs.google.com/ridefinder/images/mm_20_green.png',
			      // This marker is 20 pixels wide by 32 pixels tall.
			      new google.maps.Size(20, 20),
			      // The origin for this image is 0,0.
			      new google.maps.Point(0,0),
			      // The anchor for this image is the base of the flagpole at 10,10.
			      new google.maps.Point(0, 20));
					  
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
	  }
  }

</script>
