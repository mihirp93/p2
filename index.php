<!DOCTYPE html>
<html>
    <head>
        <!-- Custom CSS -->
        <link type="text/css" rel="stylesheet" href="css/styles.css"/>
        
        <!-- PureCSS -->
        <link type="text/css" rel="stylesheet" href="css/forms.css"/>
        <link type="text/css" rel="stylesheet" href="css/buttons.css"/>
        <link type="text/css" rel="stylesheet" href="css/tables.css"/>
        
        <title>P2 - xkcd password generator</title>
        
        <!-- PHP logic file -->
        <?php require("logic.php"); ?>
    </head>
    <body>
        <div class="container">
            <h1 class="heading">xkcd Password Generator</h1>
            <div class="password_display">
                <table class="pure-table pure-table-bordered password_table">
                    <thead>
                        <th class="table_heading">#</th>
                        <th class="table_heading">Password</th>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < 5; $i++){ ?>
                            <tr>
                            <td>
                            <?php echo $i + 1; ?>
                            </td>
                            <td>
                            <?php echo $passwords[$i]; ?>
                            </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <form class="pure-form">
                <fieldset>
                    <label for="numOfWords">How many words?(Max 9)</label>
                    <input type="text" name="numOfWords" required autocomplete="off" maxlength="1" size="2"/>
                    <br>
                    <br>
                    <label><input type="checkbox" name="includeNumbers"/> Include Numbers</label>
                    <label><input type="checkbox" name="includeSymbols"/>  Include Symbols </label>
                    <label><input type="checkbox" name="useCamelCase"/> Camelcase</label>
                    <br>
                    <br>
                    <label for="delimiter">Delimiter</label>
                    <select name="delimiter">
                        <option value="" selected>None</option>
                        <option value="-">hyphen</option>
                        <option value=".">period</option>
                        <option value=",">comma</option>
                    </select>
                    <br>
                    <br>
                    <input type="submit" class="pure-button pure-button-primary" value="Generate"/>
                </fieldset>
            </form>
            <?php
                if ($isIncorrectNum === 1) {
                    echo "<div class='errorDisplay'>Invalid number. Defaulting to 3 words...</div>";
                }
            ?>   
        </div>
        <img src="images/password_strength.png" id="xkcd_image"/>
    </body>
</html>