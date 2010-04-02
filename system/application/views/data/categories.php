<?php
$cg = new Categorie();
$cg->get();
foreach($cg->all as $cat)
{
	echo "<option value = '".$cat->id."'>".$cat->name."</option>";
}
?>
