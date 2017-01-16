<?php
function insertValuesFromPostRequestIntoArray($numberOfInputFields, $postArray = [])
{
    $niz = [];
    $collection = collect($postArray);
    for ($i = 0; $i < $numberOfInputFields; $i++) {
        $niz[$i] = $collection->every($numberOfInputFields, $i);
    }
    return $niz;
}