<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/styles.css">
        <title>P2 - xkcd password generator</title>
    </head>
    <body>
        <h2>xkcd Password Generator</h2>
        <form>
            <fieldset>
                <label for="numOfWords">Number of Words</label>
                <input type="text" name="numOfWords"/>
                <br>
                <label for="includeSymbols">Include Symbols</label>
                <input type="checkbox" name="includeSymbols"/>
                <br>
                <label for="includeNumbers">Include Numbers</label>
                <input type="checkbox" name="includeNumbers"/>
                <br>
                <input type="submit" name="generatePasswords" value="Generate"/>
            </fieldset>
        </form>
    </body>
</html>