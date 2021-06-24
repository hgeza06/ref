<?php
function haromszog($a, $b, $c, $alfa, $beta, $gamma)
{
    echo "a oldal: " . $a . "<br>";
    echo "b oldal: " . $b . "<br>";
    echo "c oldal: " . $c . "<br><br>";
    echo "alfa szög: " . $alfa . "<br>";
    echo "béta szög: " . $beta . "<br>";
    echo "gamma szög: " . $gamma . "<br><br>";

    if ($a+$b > $c && $a+$c > $b && $b+$c > $a) { //A feltétele annak, hogy szerkeszthető-e a háromszög
        echo "A háromszöget meg lehet szerkeszteni! <br>";
        if ($alfa + $beta + $gamma == 180) { //A 3 szögnek egyenlőnek kell lennie 180-al
            //Szögek vizsgálata
            if ($alfa > $beta && $alfa > $gamma) {
                echo "Az alfa a legnagyobb szög!";
                if ($alfa == 90) {
                    echo " Derékszög";
                } elseif ($alfa > 90) {
                    echo " Tompaszög";
                } elseif ($alfa < 90) {
                    echo " Hegyesszög";
                }
            } elseif ($beta > $alfa && $beta > $gamma) {
                echo "A béta szög a legnagyobb szög!";
                if ($beta == 90) {
                    echo " Derékszög";
                } elseif ($beta > 90) {
                    echo " Tompaszög";
                } elseif ($beta < 90) {
                    echo " Hegyesszög";
                }
            } elseif ($gamma > $alfa && $gamma > $beta) {
                echo "A gamma szög a legnagyobb szög!";
                if ($gamma == 90) {
                    echo " Derékszög";
                } elseif ($gamma > 90) {
                    echo " Tompaszög";
                } elseif ($gamma < 90) {
                    echo " Hegyesszög";
                }
            } else {
                echo "A háromszög minden szöge egyenlő"; //Ha miden érték egyenlő(60)
            }
        } else {
            echo "A háromszög belső szögeinek összege 180!"; //Ha a 3 szög értéke nem éri el a 180 fokot vagy több, mint 180 fok
        }
        //Ha nem teljesül az első feltétel
    } elseif ($a+$b <= $c) {
        echo "A c oldal nagyobb vagy egyenlő az a és b oldalak összegével"; 
    } elseif ($a+$c <= $b) {
        echo "A b oldal nagyobb vagy egyenlő az a és c oldalak összegével";
    } elseif ($b+$c <= $a) {
        echo "Az a oldal nagyobb vagy egyenlő a b és c oldalak összegével";
    }
}
    

haromszog(5, 5, 5, 45, 45, 90);
?>