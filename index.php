<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap CSS -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
        
        <!-- Custom CSS -->
        <link type="text/css" rel="stylesheet" href="css/styles.css"/>
        
        <!-- PHP logic file -->
        <?php require("logic.php"); ?>
        <meta charset="utf-8"/>
        <title>P2 - xkcd password generator</title>
    </head>
    <body>
        <div class="myContainer">
            <h1 class="heading">xkcd Password Generator</h1>
            <div class="passwordDisplay">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Password</th>
                        </tr>
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
            <form>
                <div class="form-group">
                    <label class="control-label">
                        How many words?(Max 9)
                        <input type="text" name="numOfWords" required autocomplete="off" maxlength="1" size="2"/>
                    </label>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label class="number"><input type="checkbox" name="includeNumbers"/>Include a number</label>  
                    </div>
                    <div class="checkbox">
                        <label class="symbol"><input type="checkbox" name="includeSymbols"/>Include a symbol</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="useCamelCase"/>Apply camelcase</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>
                        Delimiter
                        <select name="delimiter">
                            <option value="">None</option>
                            <option value="-" selected>hyphen</option>
                            <option value=".">period</option>
                            <option value=",">comma</option>
                        </select>
                    </label>
                </div>
                <button type="submit" class="myButton">Generate</button>
            </form>
            <?php
                if ($isIncorrectNum === 1) {
                    echo "<div class='errorDisplay'>Invalid number. Defaulting to 3 words...</div>";
                }
            ?>   
        </div>
        <img src="images/password_strength.png" alt="Xkcd password strength image" id="xkcdImage"/>
        <footer class="myFooter">
            <p>&copy; Mihir Patel 2016</p>
        </footer>
    </body>
</html>