
<?php
exec('chcp 65001');


function getword ($filecontent) { //Берется случайное слово в строке слов через запятую
    $wordsArr = explode(",", $filecontent);
    $randomnumber = rand(0, count($wordsArr) - 1);
    $word = $wordsArr[$randomnumber];

    if ($randomnumber != 0) { // Если это не первое слово убираем пробел в начале
        $word = substr($word, 2);
    }
    return $word;
}

function printGallow1() {
    echo "___________\n";
    echo "|         |\n";
    echo "          |\n";
    echo "          |\n";
    echo "          |\n";
    echo "          |\n";
    echo "__________|_\n";
}

function printGallow2() {
    echo "   ___________\n";
    echo "   |         |\n";
    echo "   0         |\n";
    echo "             |\n";
    echo "             |\n";
    echo "             |\n";
    echo "   __________|_\n";
}

function printGallow3() {
    echo "   ___________\n";
    echo "   |         |\n";
    echo "   0         |\n";
    echo "   |         |\n";
    echo "   |         |\n";
    echo "  / \        |\n";
    echo "   __________|_\n";
}

function printGallow4() {
    echo "   ___________\n";
    echo "   |         |\n";
    echo " \ 0 /       |\n";
    echo "   |         |\n";
    echo "   |         |\n";
    echo "__/_\___     |\n";
    echo "|______|_____|_\n";
}

function printGallow5() {
    echo "   ___________\n";
    echo "   |         |\n";
    echo " \ 0 /       |\n";
    echo "   |         |\n";
    echo "   |         |\n";
    echo "__/_\___     |\n";
    echo "/ _____/_____|_\n";
}

function printGallow6() {
    echo "   ___________\n";
    echo "   |         |\n";
    echo " \ 0 /       |\n";
    echo "   |         |\n";
    echo "   |         |\n";
    echo "  /_\        |\n";
    echo "  ___________|_\n";
}

function printGallow7() {
    echo "   ___________\n";
    echo "   |         |\n";
    echo " \ X /       |\n";
    echo "   |         |\n";
    echo "   |         |\n";
    echo "  /_\        |\n";
    echo "  ___________|_\n";
    echo " END GAME       ";
}


function startGame() {
    $filecontent = file_get_contents("words.txt");
    $word = getword($filecontent);

    echo ("Угадай слово:");
    for($i = 0; $i < count($word); $i++) {
        echo "*";
    }
    

}


?>