<?php
$co = new Countrie();
$co->get();
foreach($co->all as $cont)
{
	echo "<option value = '".$cont->id."'>".$cont->country."</option>";
}
?>
