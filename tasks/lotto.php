<?php

    function lotto($a,$b,$c,$d,$e)
    {
        $nyeremeny = 320000000;
        $kettes = $nyeremeny / 15000;
        $harmas = $nyeremeny / 1333;
        $negyes = $nyeremeny / 32;

        $tomb = array();
        $tomb1 = array();
        $tomb1[0] = $a;
        $tomb1[1] = $b;
        $tomb1[2] = $c;
        $tomb1[3] = $d;
        $tomb1[4] = $e;
        $metszet = array();

        for ($i = 0; $i < 5;$i++) {
            $tomb[$i] = rand(0, 95);
        }
        
        foreach ($tomb as $value) {
            echo $value . "<br>";
        }

        echo "<br>";

        foreach ($tomb1 as $value1) {
            echo $value1 . "<br>";
        }
    
        $meret = count($tomb);
        $meret1 = count($tomb1);
        $k = 0;

        for($i = 0; $i < $meret; $i++){
            $j = 0;

            while($j < $meret1 && $tomb1[$j] != $tomb[$i]){
                $j++;
            }

            if($j < $meret1){
                $metszet[$k++] = $tomb[$i];   
            }
            
        }
        
        $metszetMeret = $k;
        switch($metszetMeret){
            case 2:
                echo $metszetMeret . " számot találtál el. Az összeg amennyit nyertél : " . round($kettes) . " Ft. Gratulálok!";
            break;
            case 3:
                echo $metszetMeret . " számot találtál el. Az összeg amennyit nyertél : " . round($harmas) . " Ft. Gratulálok!";
            break;
            case 4:
                echo $metszetMeret . " számot találtál el.Az összeg amennyit nyertél : " . round($negyes) . " Ft. Gratulálok!";
            break;
            case 5  :
                echo "Mind az" . $metszetMeret . " számot eltaláltad. Gratulálok, megnyerted a főnyereményt! : " . $nyeremeny . " Ft.";
            break;
            default:
            echo "Sajnos nem nyertél semmit !";
         
        }
        

    }
    lotto(4,23,52,21,12);
  
?>