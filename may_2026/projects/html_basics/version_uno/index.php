<?php //this lets you code in ph
//have to suffer through echo hell because of it system being shit
echo "<!DOCTYPE html>"; //declares html - correct structure

echo "<html lang = 'en'>";

    echo "<head>";
       echo "<title>it is i </title>";

    echo "</head>";

    echo "<body>";
        echo "<h1> this echo nonsense is hurting me mentally</h1>";
        echo "<hr>"; //adds a line and 2 whitespace above and below
        echo "<p>text</p>"; //paragraphs
        echo "</br>"; //break tags

        echo "<em>text</em>"; //italics
        echo "</br>";
        echo "<i>text</i>"; //italics
        echo "</br>";

        echo "<u>text</u>"; //underline
        echo "</br>";

        echo "<b>text</b>"; //bold
        echo "</br>";
        echo "<strong>text</strong>"; //bold
        echo "</br>";

        echo "<a href = 'page.php'>page 2</a>"; //href links
        echo "</br>";
        echo "<a href = 'page2.php'>page 3</a>";
        echo "</br>";

        echo "<table>"; //table
            echo "<tr>"; //table row
                echo "<td>text</td>"; //table row items
                echo "<td>text</td>";
                echo "<td>text</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>text</td>";
                echo "<td>text</td>";
                echo "<td>text</td>";
            echo "</tr>";
        echo "</table>";

        echo "</br>";
        echo "<img src = 'glados_potatOS.jpg' alt='picture of glados potato'>"; //image
        echo "</br>";

        echo "<ul>"; //unordered list
            echo "<li>text</li>"; //list item
        echo "</ul>";
        echo "</br>";

        echo "<ol>"; //ordered list
        echo "<li>text</li>"; //list item
        echo "</ol>";
        echo "</br>";

    echo "</body>";

echo "</html>";

?>