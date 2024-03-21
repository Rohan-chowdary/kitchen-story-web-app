<?php

require "core.php";

require_once __DIR__ . '/classes/dompdf/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Get Item Id
$idItem = clearGetData(getItemId());

if(empty($idItem)){

	//header('Location: '. $urlPath->home());
}

// Details
$itemDetails = getRecipeById($connect, $idItem);

if(empty($itemDetails)){
	
	header('Location: '. $urlPath->error());
}

$ingredients =  explode(',', $itemDetails["recipe_ingredients"]);
$instructions =  explode(',', $itemDetails["recipe_instructions"]);

// Title
$titleSeoHeader = getSeoTitle($translation['tr_1']);

ob_start();

require './views/print.view.php';

$html = ob_get_contents();

ob_end_clean();

$dompdf->loadHtml($html);
$dompdf->set_option('isRemoteEnabled', TRUE);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();

?>