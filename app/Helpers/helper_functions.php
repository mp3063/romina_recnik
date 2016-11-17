<?php
function insertValuesFromPostRequestIntoArray($numberOfInputFields, $postArray = [])
{
    $collection = [];
    for ($i = 0; $i < $numberOfInputFields; $i++) {
        if (count($postArray) > $numberOfInputFields) {
            $newArray = null;
            $newArray[] = $postArray[$i];
            $newArray[] = $postArray[$i + $numberOfInputFields];
            $collection[$i] = $newArray;
        } else {
            $newArray = null;
            $newArray[] = $postArray[$i];
            $collection[$i] = $newArray;
        }
    }
    
    return $collection;
}