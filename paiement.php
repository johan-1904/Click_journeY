<?php

include('getapikey.php');
$transaction = '1234567890ABCDEF';
$montant = 1645;
$vendeur = 'MI-1_C';
$retour = 'http://localhost:5454/retour.php';

$api_key = getAPIKey($vendeur);
echo $api_key;
echo '<br>';
echo is_numeric($montant);

$control = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $retour . "#");



echo('<form action="https://www.plateforme-smc.fr/cybank/" method="POST">');
echo('<input type="hidden" name="transaction" value="' . $transaction . '">');
echo('<input type="hidden" name="montant" value="' . $montant . '">');
echo('<input type="hidden" name="vendeur" value="' . $vendeur . '">');
echo('<input type="hidden" name="retour" value="' . $retour . '">');
echo('<input type="hidden" name="control" value="' . $control . '">');
echo('<input type="submit" value="Valider et payer">');
echo('</form>');

?>
