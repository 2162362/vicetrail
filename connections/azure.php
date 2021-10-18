<?php
//webhook must be created in azure service beforehand

function postAzureWebhook($array, $webhook){
    $postdata = json_encode(
        $array
    );
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $postdata
        )
    );
    $context  = stream_context_create($opts);
    return file_get_contents($webhook, false, $context);
}
?>