<?php

$secret = "litkits2020!!";

$address = "mgska8kmckmr3JQ8yhNqigLeeCWcqM29iM";

$invoice = 101;

$callback = "https://localhost/eCommerceTeamCS.github.io/index.html/callback.php?".invoice."$secret=".$secret;

$bitAPI = json_decode(file_get_contents(), true);




?>
