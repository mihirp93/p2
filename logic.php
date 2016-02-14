<?php

    ##############################################################################
    function getNumberOfWords() {
    ##############################################################################
    # Purpose of this function is to return the value that was entered in the
    # number of words text field.If an invalid number was entered, then the
    # function will return -1 to signal to the calling function that there
    # was an invalid input.
        
        if (isset($_GET["numOfWords"])) {
            if (is_numeric($_GET["numOfWords"])) {
                $numWords = $_GET["numOfWords"];
            }
            else {
                $numWords = -1;
            }
        }
        else {
            # This will execute when the page is loaded for the first time.
            # So, default the number of words to 4.
            $numWords = 4;
        }
            
        # return the number of words
        return $numWords;
    }
    # getNumberOfWords()
    
    ##############################################################################
    function getNumbersCheckBoxValue() {
    ##############################################################################
    # Purpose of this function is to return the value of the Numbers checkbox.
    # On - Checkbox was selected to include numbers in the xkcd password.
    # Off - Checkbox was not selected.
    
        if (isset($_GET["includeNumbers"])) {
            $numbersValue = $_GET["includeNumbers"];
        }
        else {
            $numbersValue = "off";
        }
           
        return $numbersValue;
    }
    # getNumbersCheckBOxValue()
        
    ##############################################################################
    function getSymbolsCheckBoxValue() {
    ##############################################################################
    # Purpose of this function is to return the value of the Symbols checkbox.
    # On - Checkbox was selected to include special symbols in the xkcd password.
    # Off - Checkbox was not selected. 
        
        if (isset($_GET["includeSymbols"])) {
            $symbolsValue = $_GET["includeSymbols"]; 
        }
        else {
            $symbolsValue = "off";
        }
           
        return $symbolsValue;
    }
    # getSymbolsCheckBoxValue()
    
    ##############################################################################
    function generatePassword($numWords,$numbersSwitch, $symbolsSwitch) {
    ##############################################################################
    # Purpose of this function is to generate a password based on the criteria
    # provided.
        
        # hold the generated password. 
        $password = "";
        
        # list of words
        $words = array("hello", "world", "this", "is", "a", "test");
    
        # list of numbers.
        $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    
        # list of special symbols.
        $symbols = array('~', '!', '#', '$', '%', '^', '&', '*');
        
        # random keys to select random words from the word list.
        $randKeys = array_rand($words, $numWords);
        
        # number of random keys 
        $randLen = count($randKeys);
        
        if ($randLen === 1) {
            $password = $words[$randKeys];
        }
        else {
            for ($i = 0; $i < $randLen; $i++) {
                if ($i > 0) {
                    $password = $password."-";
                }
                $password = $password.$words[$randKeys[$i]];
            }
        }
        
        # append a number to the password.
        if ($numbersSwitch === "on") {
            $randomNumber = $numbers[array_rand($numbers,1)];
            $password = $password.$randomNumber;
        }
        
        # append a special symbol to the password.
        if ($symbolsSwitch === "on") {
            $randomSymbol = $symbols[array_rand($symbols,1)];
            $password = $password.$randomSymbol;
        }
        
        # return the generated password
        return $password;
    }

    # Number of words desired in the password.
    $numOfWords = getNumberOfWords();
    if ($numOfWords === -1){
        $isIncorrectNum = 1;
        $numOfWords = 3;
    }
    else {
        $isIncorrectNum = 0;
    }
    # Should numbers be included in the password? 
    $includeNumbers = getNumbersCheckBoxValue();
    
    # Should symbols be included in the password?
    $includeSymbols = getSymbolsCheckBoxValue();
    
    # Generate a password 
    $generatedPassword = generatePassword($numOfWords,$includeNumbers,$includeSymbols);

?>