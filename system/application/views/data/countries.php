<?php
$countries = new Countrie();
$countries->get();
foreach($countries->all as $cont)
{
	echo "<option value = '".$cont->id."'>".$cont->country."</option>";
}
?>
