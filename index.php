<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/styles.css">
        <title>P2 - xkcd password generator</title>
        <?php require("logic.php"); ?>
    </head>
    <body>
        <h1>xkcd Password Generator</h1>
        <div class="password">
            <?php echo $generatedPassword; ?>
        </div>
        <form>
            <fieldset>
                <label for="numOfWords">Number of Words</label>
                <input type="text" name="numOfWords"  required autocomplete="off"/>
                <br>
                <br>
                <label for="includeNumbers">Include Numbers</label>
                <input type="checkbox" name="includeNumbers"/>
                <br>
                <br>
                <label for="includeSymbols">Include Symbols</label>
                <input type="checkbox" name="includeSymbols"/>
                <br>
                <br>
                <label for="useCamelCase">Camelcase</label>
                <input type="checkbox" name="useCamelCase"/>
                <br>
                <br>
                <label for="delimiter">Delimiter</label>
                <select name="delimiter">
                    <option value="">None</option>
                    <option value="-" selected>hyphen</option>
                    <option value=".">period</option>
                    <option value=",">comma</option>
                </select>
                <br>
                <br>
                <input type="submit" value="Generate"/>
            </fieldset>
        </form>
        <?php
            if ($isIncorrectNum === 1) {
                echo "<div class='errorDisplay'>Invalid number. Defaulting to 3 words...</div>";
            }
        ?>
    </body>
</html>