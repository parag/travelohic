<br/>
<h2>Wished By</h2>
<ul id="grid">
<?
$w = new Wishe();
$w->where('campaign_id', $campaign_id)->get();
$count = 0;
foreach($w->all as $wish)
{
	$usr = new Account();
	$usr->where('id', $w->user_id)->get();
	$userpic = base_url()."/images/profile/".$usr->photo;
	if($usr->fb_uis!="")
	{
		$userpic = "https://graph.facebook.com/".$usr->fb_uis."/picture";
	}
	echo "<li><a href = \"".site_url('accounts/wishlist/'.$usr->id)."\"><img src=\"".$userpic."\"/></a></li>";
	$count++;
}
?>
</ul>
<?
if($count==0)
	echo "None yet. Be the first to wish.";
else
	echo "Click on user to watch his/her wishlist";
?>
