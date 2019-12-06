<?php
// edit: hier alles gekopieerd van junior.php.broken + dan telkens in index.php elke oefening 1 voor 1 getest en dan hier teruggeplakt

declare(strict_types=1);


// Below are several code blocks, read them, understand them and try to find whats wrong.
// Once this exercise is finished, we'll go over the code all together and we can share how we debugged the following problems.
// Try to fix the code every time and good luck ! (write down how you found out the answer and how you debugged the problem)
// =============================================================================================================================

// === Exercise 1 ===
// Below we're defining a function, but it doesn't work when we run it.
// Look at the error you get, read it and it should tell you the issue...,
// sometimes, even your IDE can tell you what's wrong
echo "Exercise 1 starts here:";

// aangezien deze functie doorheen de oefeningen terugkomt, zal het wel met het ingeven van variabelen in de functie bedoeld zijn
function new_exercise($x) {
    // opmerkelijk: $x definiëren buiten de functie die het aanroept werkt niet !
    $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
    echo $block;

}
// je moet de functie nog aanspreken
new_exercise(1);


new_exercise(2);
// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
// array is 0-indexed
$monday = $week[0];

echo $monday;


new_exercise(3);
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

// 't waren gelijk gekke quotes en die ! stopt gelijk de uitvoering
$str = "Debugged ! Also very fun";
// en om alles af te drukken heb ik het bereik variabel gemaakt van 0 tot lengte van de string
echo substr($str, 0, strlen($str));


new_exercise(4);
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

// oplossing: In order to be able to directly modify array elements within the loop precede $value with &. In that case the value will be assigned by reference. 
foreach($week as &$day) {
    $day = substr($day, 0, strlen($day)-3);
    // echo $day . " ";
}

print_r($week);

// moeten opzoeken: https://www.php.net/manual/en/control-structures.foreach.php
// $arr = array(1, 2, 3, 4);
// foreach ($arr as &$value) {
//     $value = $value * 2;
// }
// // $arr is now array(2, 4, 6, 8)
// echo($value); // break the reference with the last element


$arr = [];
for ($letter = 'a'; $letter <= 'z'; $letter++) {
    //echo $letter;
    array_push($arr, $letter);
    // ik weet niet of dit de juiste oplossing is; ik weet zelfs niet goed waarom het maar bleef lopen.
    // ik vermoed: dat het is omdat als het de beurt is aan letter is z, en er wordt gecheckt, id kleiner dan of gelijk aan z, dat het doorgaat, maar dan dat de $letter++ als volgende stap aa heeft en in de error log staat dat de reden is dat het gestopt is omwille van teveel memory gebruik dus zou dat eindeloos blijven lopen zijn anders
    if ($letter == 'z') {
    break;
    }
}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array


new_exercise(6);
// === Final exercise ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!

// DEBUGGER TOOLS HEBBEN ME BEPERKT GEHOLPEN. WAS VOORAL VAR-DUMP EN STAP VOOR STAP WERKEN DIE HIELPEN

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

new_exercise(7);
// was probleem met dat year integer moest zijn, terwijl date als string werd doorgestuurd
function copyright($year) {
    // return "&copy; $year BeCode";
    echo "&copy; $year BeCode";

}
//print the copyright
copyright(date('Y'));

new_exercise(8);
function login(string $email, string $password) {
    if($email == 'john@example.be' || $password == 'pocahontas') {
        // edit: ik vind het gemakkelijker, visueler werken met echo
        // MAAR er was nog een probleem, namelijk of Smith wel zou worden uitgevoerd en daarom heb ik de echo's verplaatstst van in de functie naar het aanroepen van de variabelen die functie op hun beurt aanreoepen 
        //return 'Welcome John';
        // echo 'Welcome John';
        //return ' Smith';
        // echo ' Smith';
        // edit: er kan maar 1 return-statement zijn
        return 'Welcome John Smith';
    }
    // er was geen else-statement
    else {
    return 'No access';
    // echo 'No access';
}
}
//should great the user with his full name (John Smith)
$login = login('john@example', 'pocahontas');
echo $login;
//no access edit: want is example.BE of pocahantas
$login = login('john@example', 'dfgidfgdfg');
echo $login;
//no access
$login = login('wrong@example', 'wrong');
echo $login;


new_exercise(9);
// edit: groot deel van oplossing op basis van http://www.hackingwithphp.com/4/7/5/finding-a-string-within-a-string
function isLinkValid(string $link)
{
    $unacceptables = array('https:', '.doc', '.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');
    foreach ($unacceptables as $unacceptable) {
        // var_dump($unacceptable);
        // var_dump($link);
        // var_dump(strpos($link, $unacceptable));
        if (strpos($link, $unacceptable) !== false) {
            // echo 'Unacceptable   Found<br />';
            return 'Unacceptable Found<br />';
            }
    }
// edit: die returns zijn ambetant, want ze stoppen de boel. ik dacht oorspronkelijk met if en else te moeten werken, maar deze structuur is prima, net omdat return de boel stopt
    return 'Acceptable<br />';
}

//invalid link
// isLinkValid('http://www.google.com/hack.pdf');
$test1 = isLinkValid('http://www.google.com/hack.pdf');
echo $test1;
//invalid link 
// isLinkValid('https://google.com');
$test2 = isLinkValid('https://google.com');
echo $test2;
//VALID link
// isLinkValid('http://google.com');
$test3 = isLinkValid('http://google.com');
echo $test3;
//VALID link
// isLinkValid('http://google.com/test.txt');
$test4 = isLinkValid('http://google.com/test.txt');
echo $test4;


new_exercise(10);
//Filter the array $areTheseFruits to only contain valid fruits
//do not change the arrays itself
$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];
//from here on you can change the code
// echo count($areTheseFruits);
// moeten vastzetten in variabele, want die unset fuckte met de lengte van de array
$fixed_count = count($areTheseFruits);
// edit: zero-indexed dus < i.p.v. <= gebruikt
for($i=0; $i < $fixed_count; $i++) {
    // echo $i;
    // echo $areTheseFruits[$i];
    if(!in_array($areTheseFruits[$i], $validFruits)) {
        // echo "NOPE";
        // echo ($areTheseFruits[$i]);
        // probleem, denk ik : wordt uit de array gegooid om dan weer de loop te gaan bevolken ..
        // nu was de debugger xdebug in IDE wel interessant omdat het toonde hoe de variabele in lengte wel minder werd, doch de verschillende elementen bleven hun indexnummer behouden!
        unset($areTheseFruits[$i]);
        
    }
}
var_dump($areTheseFruits);//do not change this
?>