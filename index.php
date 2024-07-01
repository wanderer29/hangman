
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

$filecontent = file_get_contents("words.txt");
$word = getword($filecontent);



?>