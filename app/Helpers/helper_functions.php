<?php
function insertValuesFromPostRequestIntoArray($numberOfInputFields, $postArray = [])
{
    $niz = [];
    $collection = collect($postArray);
    for ($i = 0; $i < $numberOfInputFields; $i++) {
        $newArray = null;
        $newArray[] = $collection->every($numberOfInputFields, $i);
        $niz[$i] = $newArray;
    }
    
    return $niz;
}