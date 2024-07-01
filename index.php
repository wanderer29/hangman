
<?php
exec('chcp 65001');

function getwordcount ($filecontent) { //Считается количество слов через запятую в строке
    $wordcount = 0;
    for ($i = 0; $i < strlen($filecontent); $i++) {
        if ($filecontent[$i] == ',') $wordcount++;
    }
    if ($wordcount != 0) $wordcount++;
    return $wordcount;
}

function getword ($filecontent) { //Берется случайное слово в строке слов через запятую
    $wordcount = getwordcount($filecontent);
    $randomnumber = rand (0, $wordcount);
    $word = "";
    $currentwordnum = 0;

    for ($i = 0; $i < strlen($filecontent); $i++) { //Считываем случайное слово
        if ($filecontent[$i] == ',') $currentwordnum++;
        if ($currentwordnum == $randomnumber && $filecontent[$i] != ',') $word .= $filecontent[$i];
        
    }

    if ($randomnumber != 0) { // Если это не первое слово убираем пробел в начале
        $word = substr($word, 2);
    }
    return $word;
}

$filecontent = file_get_contents("words.txt");
$word = getword($filecontent);


?>