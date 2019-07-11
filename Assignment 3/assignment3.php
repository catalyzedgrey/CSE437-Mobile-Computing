<html>

<body>

<?php
function _flatten(array &$out, array $array)
{
    if(is_array($array) && count($array)>0){
        foreach($array as $value){

            if(is_array($value)){
                _flatten($out, $value);

            }
            else{
                array_push($out, $value);
                }
        }
    }
    else{
        return 0;
    }
}


function flatten_array(array $array)
{

    $flat = array();
    _flatten($flat, $array);
    return $flat;

}


    
    
    
    //$array = [1, 2, [3], [4, [5, 6], 5, 6], [[7], [8, [9]]], 10, [[[11], 12]]];
    $array = [1, 2, ['a'=>3], [4, [5, 'c'=>6], 5, 6], [[7], [8, ['j'=>9]]], 10, [[[11], 12]]];
    $result = flatten_array($array);
    
    
    print_r($result);

    
?>

</body>

</html>