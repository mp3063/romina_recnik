<?php
function moja($numberOfInputFields, $postArray = [])
{
    $collection = [];
    $countPost = count($postArray);
    if ($countPost > $numberOfInputFields) {
        for ($i = 0; $i < $numberOfInputFields; $i++) {
            $newArray = null;
            $newArray[] = $postArray[$i];
            for (
                $k = $numberOfInputFields - 1; $k < $countPost; $k + $numberOfInputFields
            ) {
                $newArray[] = $postArray[$k];
            }
            $collection[$i] = $newArray;
        }
    } else {
        for ($i = 0; $i < $numberOfInputFields; $i++) {
            $newArray = null;
            $newArray[] = $postArray[$i];
            $collection[$i] = $newArray;
        }
    }
    
    return $collection;
}

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