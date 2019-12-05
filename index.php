<?php
// === Final exercise ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!


$arr = [];

function combineNames($str1 = "", $str2 = "") {
    $params = [$str1, $str2];
    // zo ampersand toegevoegd om te kunnen asignen (zie ook vorige oefening)
    foreach($params as &$param) {
        if ($param == "") {
            // $param = "test";
            $param = randomHeroName();
        }
    }
    // var_dump($params[0]);
    // var_dump($params[1]);
    // echo implode($params, " - ");
    return implode($params, " - ");
}


function randomGenerate($arr, $amount) {
    for ($i = $amount; $i > 0; $i--) {
        array_push($arr, randomHeroName());
    }

    return $amount;
}

    // deze functie selecteert telkens 1 naam en geeft dit door als parameter aan combinenames
function randomHeroName()
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    // var_dump($heroes);
    // $randname = $heroes[rand(0,count($heroes))][rand(0, 10)];
    // inschatting problemen: heroes is een multidimensionele array waarbij de eerste, denk ik de array firstnames of lastnames aanspreekt en de tweede iets willekeurigs uithaalt.
    // overigens, met die random komt het voor dat we 2 namen uit lastnames samen zetten
    $randname = $heroes[rand(0,1)][rand(0, 10)];
    // var_dump($randname);
    // echo $randname;
    // return bevolkt parameters, echo print gewoon maar way
    return $randname;
}

echo "Here is the name: " . combineNames();
?>

