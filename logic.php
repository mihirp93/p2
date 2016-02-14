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
    function getSymbolsSwitchValue() {
    ##############################################################################
    # Purpose of this function is to return the value of the Symbols checkbox.
    # On - Checkbox was selected to include special symbols in the xkcd password.
    # Off - Checkbox was not selected. 
        
        if (isset($_GET["includeSymbols"])) {
            $symbolsSwitchValue = $_GET["includeSymbols"]; 
        }
        else {
            $symbolsSwitchValue = "off";
        }
           
        return $symbolsSwitchValue;
    }
    # getSymbolsSwitchValue()
        
    ##############################################################################
    function getNumbersSwitchValue() {
    ##############################################################################
    # Purpose of this function is to return the value of the Numbers checkbox.
    # On - Checkbox was selected to include numbers in the xkcd password.
    # Off - Checkbox was not selected. 
        if (isset($_GET["includeNumbers"])) {
            $numbersSwitchValue = $_GET["includeNumbers"];
        }
        else {
            $numbersSwitchValue = "off";
        }
           
        return $numbersSwitchValue;
    }
    # getNumbersSwitchValue()
    
    # to hold the generated password.
    $generatedPassword = "";
    
    # list of words
    $words = array("hello", "world", "this", "is", "a", "test");
    
    # list of numbers.
    $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    
    # list of special symbols.
    $symbols = array('~', '!', '#', '$', '%', '^', '&', '*');
    
    # Number of words desired in the password.
    $numOfWords = getNumberOfWords();
    if ($numOfWords === -1){
        $isIncorrectNum = 1;
        $numOfWords = 3;
    }
    else {
        $isIncorrectNum = 0;
    }

    # Should symbols be included in the password?
    $includeSymbols = getSymbolsSwitchValue();
    
    # Should numbers be included in the password? 
    $includeNumbers = getNumbersSwitchValue();

    # random keys to select random words from the word list.
    $randKeys = array_rand($words, $numOfWords);
    
    # number of random keys 
    $randLen = count($randKeys);
    
    if ($randLen === 1) {
        $generatedPassword = $words[$randKeys];
    }
    else {
        for ($i = 0; $i < $randLen; $i++) {
            if ($i > 0) {
                $generatedPassword = $generatedPassword."-";
            }
            $generatedPassword = $generatedPassword.$words[$randKeys[$i]];
        }
    }
    
    # append a special symbol to the password.
    if ($includeSymbols === "on") {
        $randomSymbol = $symbols[array_rand($symbols,1)];
        $generatedPassword = $generatedPassword.$randomSymbol;
    }
    
    # append a numbe to the password.
    if ($includeNumbers === "on") {
        $randomNumber = $numbers[array_rand($numbers,1)];
        $generatedPassword = $generatedPassword.$randomNumber;
    }
    
?>