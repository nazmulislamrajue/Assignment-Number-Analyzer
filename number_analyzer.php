<?php

// Greet the user
echo "=== Welcome to Number Analyzer ===\n";

// Start a loop that keeps running until the user wants to exit
while (true) {
    // Ask the user to enter numbers or type 'exit' to quit
    echo "\nEnter a list of numbers separated by spaces (or type 'exit' to quit): ";
    
    // Read the user input from the terminal
    $input = trim(fgets(STDIN));

    // Check if the user wants to exit
    if (strtolower($input) === 'exit') {
        echo "Exiting... Goodbye!\n";
        break; // Stop the loop
    }

    // Break the input string into individual parts using spaces
    $inputParts = explode(' ', $input);

    // Create an empty array to store valid numbers
    $numbers = [];

    // A flag to track whether the input is valid
    $isValid = true;

    // Go through each part and check if it's a number
    foreach ($inputParts as $item) {
        // Check if the input is a number
        if (is_numeric($item)) {
            // Convert to number and add to the array
            $numbers[] = (float)$item;
        } else {
            // If anything is not a number, set isValid to false
            $isValid = false;
            break; // Stop checking further
        }
    }

    // If the input was invalid or the array is empty, show an error
    if (!$isValid || empty($numbers)) {
        echo "❌ Invalid input! Please enter only numbers separated by spaces.\n";
        continue; // Go back to the start of the loop
    }

    // Now let's calculate the results
    $max = max($numbers); // Highest number
    $min = min($numbers); // Lowest number
    $sum = array_sum($numbers); // Total of all numbers
    $average = $sum / count($numbers); // Average value

    // Show the results
    echo "\n=== Results ===\n";
    echo "Maximum: $max\n";
    echo "Minimum: $min\n";
    echo "Sum: $sum\n";
    echo "Average: " . number_format($average, 2) . "\n"; // Round to 2 decimal places
}
