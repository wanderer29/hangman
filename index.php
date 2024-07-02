
<?php
    $filecontent = file_get_contents("words.txt");


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

    function openLetter($guessWord, $word, $input) { //Открытие в слове угаданных букв
        $word = strtolower($word);
        $input = strtolower($input);

        if (checkLetter($word, $input)) {
            for ($i = 0; $i < strlen($word); $i++) {
                if ($word[$i] == $input) {
                    $guessWord[$i] = $input;
                }
            }
        }
        return $guessWord;
    }

    function checkLetter($word, $input) { //Проверка наличия буквы в слове
        $word = strtolower($word);
        $input = strtolower($input);
  
        if (strpos($word, $input) !== false) {
            return true;
        }
        return false;
    }

    function startGame($filecontent) { 
        while (true) {
            $word = getword($filecontent);
            $guessWord = "";
            $missCount = 0;
    
            echo ("Угадай слово:\n");
            for ($i = 0; $i < strlen($word); $i++){
                $guessWord .= "*";
            }
            echo $guessWord;
            echo "\n";
            
            while (true) {
                $handle = fopen("php://stdin", "r");
                $input = trim(fgets($handle));
                fclose($handle);
    
                if (checkLetter($word, $input)) {
                    $continue = false;
                    for ($i = 0; $i < strlen($guessWord); $i++) {
                        if ($guessWord[$i] == '*') $continue = true; 
                    }
                    if ($continue) {
                        echo "Вы угадали букву!\n";
                        $guessWord = openLetter($guessWord, $word, $input);
                        for ($i = 0; $i < strlen($guessWord); $i++) {
                            if ($guessWord[$i] == '*') $continue = true; 
                            else $continue = false;
                        }
                        if ($continue == false) {
                            echo "Вы выиграли!\n";
                            break;
                        }
                    }
                }
                else {
                    echo "Неправильная буква!\n";
                    $missCount++;
                    if ($missCount > 6) {
                        echo "LOOOSE!\n";
                        printGallow7();
                        break;
                    }
                    else {
                        switch ($missCount) {
                            case 1: 
                                printGallow1();
                                break;
                            case 2: 
                                printGallow2();
                                break;
                            case 3:
                                printGallow3();
                                break;
                            case 4:
                                printGallow4();
                                break;
                            case 5:
                                printGallow5();
                                break;
                            case 6:
                                printGallow6();
                                break;
                        }
                    }
                }
                echo $guessWord;
                echo "\n";
            }
            echo "Start new game? [Y/n]";
                while (true) {
                $handle = fopen("php://stdin", "r");
                $input = trim(fgets($handle));
                fclose($handle);

                if ($input == 'n' || $input == 'N') return;
                else if ($input == 'y' || $input == 'Y') {
                    break;
                }
            }
        }
    }
    
    startGame($filecontent);
?>