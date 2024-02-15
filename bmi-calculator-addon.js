/**
 * Calculates BMI (Body Mass Index) based on weight and height input.
 * @returns {void}
 */
function calculateBMI() {
    // Retrieves weight and height from input fields
    let weight = document.getElementById('bmi-weight').value;
    let height = document.getElementById('bmi-height').value;
    
    // Checks if weight and height are valid numbers
    if (!isNaN(parseFloat(weight)) && !isNaN(parseInt(height))) {
        // Calculates BMI and displays the result
        let bmi = (weight / ((height * height) / 10000)).toFixed(2);
        document.getElementById('bmi-result').innerText = 'BMI: ' + bmi;
    }
}
