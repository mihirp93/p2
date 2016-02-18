<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap CSS -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
        
        <!-- Custom CSS -->
        <link type="text/css" rel="stylesheet" href="css/styles.css"/>

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
                        <?php for($i = 0; $i < $numOfPasswords; $i++){
                            echo "<tr>";
                            echo "<td>";
                            echo $i + 1;
                            echo "</td>";
                            echo "<td>";
                            $len = strlen($passwords[$i]);
                            for($j = 0; $j < $len; $j++){
                                $char = substr($passwords[$i],$j,1);
                                if(isSeparator($char)){
                                    echo "<span class='separator'>";
                                    echo $char;
                                    echo "</span>";
                                }
                                else {
                                    echo $char;
                                }
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
                if ($isIncorrectNum === 1) {
                    echo "<div class='errorDisplay'>Invalid number. Thus, Default criteria will be used.</div>";
                }
            ?>  
            <br>
            <br>
            <form action="index.php" method="GET">
                <div class="form-group">
                    <label class="control-label wordsPrompt">
                        How many words?(Max 9)
                        <br>
                        <input type="text" name="numOfWords" required autocomplete="off" maxlength="1" size="2" class="numInput"/>
                    </label>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label class="number checkBoxFont"><input type="checkbox" name="includeNumbers"/>Include a number</label>  
                    </div>
                    <div class="checkbox">
                        <label class="symbol checkBoxFont"><input type="checkbox" name="includeSymbols"/>Include a symbol</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkBoxFont"><input type="checkbox" name="useCamelCase"/>Apply camelcase</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="formLabel">
                        Delimiter
                        <select name="delimiter" class="selectOption">
                            <option value="">None</option>
                            <option value="-" selected>hyphen</option>
                            <option value=".">period</option>
                            <option value=",">comma</option>
                        </select>
                    </label>
                </div>
                <button type="submit" class="myButton">Generate</button>
            </form>
             
        </div>
        <img src="images/password_strength.png" alt="Xkcd password strength image" id="xkcdImage"/>
        <footer class="myFooter">
            <p>&copy; Mihir Patel 2016</p>
        </footer>
    </body>
</html>