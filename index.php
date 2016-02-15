<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/styles.css"/>
        <link type="text/css" rel="stylesheet" href="css/forms.css"/>
        <link type="text/css" rel="stylesheet" href="css/buttons.css"/>
        
        <title>P2 - xkcd password generator</title>
        <?php require("logic.php"); ?>
    </head>
    <body>
        <div class="container">
            <h1 class="heading">xkcd Password Generator</h1>
            <div class="password_display">
                <?php echo $generatedPassword; ?>
            </div>
            <form class="pure-form pure-form-aligned">
                <fieldset>
                    <label for="numOfWords">How many words?</label>
                    <input type="text" name="numOfWords"  required autocomplete="off" maxlength="1"/>
                    <br><br>
                    <label><input type="checkbox" name="includeNumbers"/> Include Numbers</label>
                    <label><input type="checkbox" name="includeSymbols"/>  Include Symbols </label>
                    <label><input type="checkbox" name="useCamelCase"/> Camelcase</label>
                    <br><br>
                    <label for="delimiter">Delimiter</label>
                    <select name="delimiter">
                        <option value="">None</option>
                        <option value="-" selected>hyphen</option>
                        <option value=".">period</option>
                        <option value=",">comma</option>
                    </select>
                    <br><br>
                    <input type="submit" class="pure-button pure-button-primary" value="Generate"/>
                </fieldset>
            </form>
            <?php
                if ($isIncorrectNum === 1) {
                    echo "<div class='errorDisplay'>Invalid number. Defaulting to 3 words...</div>";
                }
            ?>   
        </div>
        <img src="images/password_strength.png"/>
    </body>
</html>