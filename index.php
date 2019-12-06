<?php
function copyright(int $year) {
    var_dump($year);
    // return "&copy; $year BeCode";
    echo "&copy; $year BeCode";

}
//print the copyright
copyright(date('Y'));
