<html>
<body>

<?php
function calculateAreaOfTriangle($a, $b, $c){
    if(!is_numeric($a) || $a <= 0 
    || !is_numeric($b) || $b <= 0
    || !is_numeric($c) || $c <= 0 )
        return -1;
    return $a*$b*(sin($c*M_PI/180))/2;
}

function calculateAreaOfCircle($number) {
    if(!is_numeric($number) || $number <= 0)
      return -1;

        $radius = $number;
    
    return pow($radius, 2) * M_PI;
  }


// what is the area for the radius of 25?
echo("Area of triangle is: " . calculateAreaOfTriangle(5, 10, 60));
echo nl2br ("\nArea of circle is: " . calculateAreaOfCircle(25));

?>

</body>
</html>
