<?php
    
    # number of passwords to generate
    $numOfPasswords = 10;

    # list of numbers.
    $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    
    # list of special symbols.
    $symbols = array('~', '!', '#', '$', '%', '^', '&', '*');
    
    #####################################################################
    function isNumber($n) {
    #####################################################################
    # Determine if the passed character is an element stored in the global
    # array of numbers. If it is, return true. Otherwise, return false.
        $numCount = count($GLOBALS["numbers"]);
        for($i = 0; $i < $numCount; $i++){
            if ($n === $GLOBALS["numbers"][$i])
            {
                return true;
            }
        }
        return false;
    }
    
    ##############################################################################
    function isSymbol($c) {
    ##############################################################################
    # Determine if the passed character is a special symbol by checking to see
    # if it exists in the symbols array. If it is, return true. Otherwise, return
    # false.
        $symbCount = count($GLOBALS["symbols"]);
        for($i = 0; $i < $symbCount; $i++){
            if ($c === $GLOBALS["symbols"][$i])
            {
                return true;
            }
        }
        return false;
    }
    
    ###############################################################################
    function isSeparator($c){
    ###############################################################################
    # Determine if the passes character is one of the delimited characters.
    # If it is, then return true. Otherwise, return false.
        if($c == '-' or $c == '.' or $c == ','){
            return true;
        }
        else {
            return false;
        }
    }

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
    function getCamelCaseCheckBoxValue() {
    ##############################################################################
    # Purpose of this function is to return the value of the camelcase checkbox.
    # On - Checkbox was selected to generate password using camelcase format.
    # Off - Checkbox was not selected. 
        
        if (isset($_GET["useCamelCase"])) {
            $camelCaseValue = $_GET["useCamelCase"]; 
        }
        else {
            $camelCaseValue = "off";
        }
           
        return $camelCaseValue;
    }
    # getSymbolsCheckBoxValue()
    
    ##############################################################################
    function getDelimiter() {
    ##############################################################################
    # Get the delimter selected by the user. Default delimter is a hyphen('-').
    
        if (isset($_GET["delimiter"])) {
            $delimiter = $_GET["delimiter"];        
        }
        else {
            # set default delimiter to '-'
            $delimiter = "-";
        }
        return $delimiter;
    }
    # getDelimiter()
    
    ##############################################################################
    function generatePassword($numWords, $numbersSwitch, $symbolsSwitch,
                              $camelCaseSwitch, $num, $symb, $separator) {
    ##############################################################################
    # Generate a password based on the criteria provided as follows :
    # 1. How many word to include in the password?
    # 2. Should numbers be included?
    # 3. Should special symbols be included?
    # 4. Should the password be formatted in a camelcase format?
    # 5. Should the words by delimited by a character?
        
        # hold the generated password. 
        $password = "";
        
        # load list of words from a text file
        $words = file("data/nolls-word-list.txt",FILE_IGNORE_NEW_LINES);

        # random keys to select random words from the word list.
        $randKeys = array_rand($words, $numWords);
        
        # number of random keys 
        $randLen = count($randKeys);
        
        if ($randLen === 1) {
            $randomWord = $words[$randKeys];
            if ($camelCaseSwitch === "on") {
                $randomWord = ucfirst($randomWord);
            }
            $password = $randomWord;
        }
        else {
            for ($i = 0; $i < $randLen; $i++) {
                $randomWord = $words[$randKeys[$i]];
                if ($camelCaseSwitch === "on") {
                    $randomWord = ucfirst($randomWord);  
                }
                
                if ($i > 0) {
                    $password = $password.$separator;
                }
                $password = $password.$randomWord;
            }
        }
        
        # append a number to the password.
        if ($numbersSwitch === "on") {
            $randomNumber = $num[array_rand($num,1)];
            $password = $password.$randomNumber;
        }
        
        # append a special symbol to the password.
        if ($symbolsSwitch === "on") {
            $randomSymbol = $symb[array_rand($symb,1)];
            $password = $password.$randomSymbol;
        }
        
        # return the generated password
        return $password;
    }
    # generatePassword()

    # Number of words desired in the password.
    $numOfWords = getNumberOfWords();
    if ($numOfWords <= 0
        or $numOfWords > 9){
        $isIncorrectNum = 1;
        $numOfWords = 4;
    }
    else {
        $isIncorrectNum = 0;
    }
    # Should numbers be included in the password? 
    $includeNumbers = getNumbersCheckBoxValue();
    
    # Should symbols be included in the password?
    $includeSymbols = getSymbolsCheckBoxValue();
    
    # Should the password be in camelcase format?
    $camelCaseFlag = getCamelCaseCheckBoxValue();
    
    # Get delimiter.
    $delimChar = getDelimiter();
    
    # Generate passwords.
    $passwords = [];
    for ($i = 0; $i < $numOfPasswords; $i++) {
        $passwords[$i] = generatePassword($numOfWords,$includeNumbers,$includeSymbols,
                                          $camelCaseFlag, $numbers, $symbols, $delimChar);
    }
?>