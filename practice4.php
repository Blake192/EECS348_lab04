<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") { // must be a POST request
    // validate input
    if (!isset($_POST['size']) || !is_numeric($_POST['size'])) { // they must send size and size most be a number
        echo "<p>Error: Invalid input. Please enter a valid number.</p>";
        return;
    }

    $size = intval($_POST['size']);
    
    if ($size <= 0) { // must be positive (dont want to be like limp biscuit and 'break stuff')
        echo "<p>Error: Please enter a positive number.</p>";
        return;
    }

    // debug: echo "<p>Valid input: $size</p>";
} else {
    echo "<p>No form submission detected.</p>";
    return; // must have form submission
}

// now that input is validated we can start making our table in peace
// (you should always always always validate php input)
echo "<table border='1' cellspacing='0' cellpadding='5'>";

// create the header row with an empty top left cell
echo "<tr><th> </th>";
for ($i = 1; $i <= $size; $i++) {
    echo "<th>$i</th>";
}
echo "</tr>";

// Create each multiplication row
for ($row = 1; $row <= $size; $row++) {
    echo "<tr>"; // new row
    echo "<th>$row</th>"; // row header
    for ($col = 1; $col <= $size; $col++) {
        echo "<td>" . ($row * $col) . "</td>"; // add cell with proper multiplication results from row and column
    }
    echo "</tr>";
}

echo "</table>";

?>
