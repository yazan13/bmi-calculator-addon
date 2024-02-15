<?php
/**
 * Plugin Name: BMI Calculator Addon
 * Description: A Gutenberg block addon for calculating BMI.
 * Author: Yazan Monther
 * Version: 1.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Enqueues the block styles.
 * @return void
 */
function bmi_calculator_enqueue_styles(): void
{
    wp_enqueue_style(
        'bmi-calculator-addon-style',
        plugins_url('style.css', __FILE__),
        [],
        '1.0'
    );
}
add_action('enqueue_block_assets', 'bmi_calculator_enqueue_styles');

/**
 * Renders the BMI Calculator shortcode.
 * 
 * @return string The BMI Calculator HTML markup.
 */
function bmi_calculator_render_shortcode(): string
{
    wp_enqueue_script(
        'bmi-calculator-addon-script',
        plugins_url('bmi-calculator-addon.js', __FILE__),
        ['wp-blocks', 'wp-editor'],
        '1.0',
        true
    );

    ob_start(); ?>

    <div class="bmi-calculator">
        <h3>BMI Calculator</h3>
        <label for="bmi-weight">Weight (kg):</label>
        <input type="number" id="bmi-weight" name="bmi-weight" onchange="calculateBMI()" placeholder="e.g., 65">
        <br>
        <label for="bmi-height">Height (cm):</label>
        <input type="number" id="bmi-height" name="bmi-height" onchange="calculateBMI()" placeholder="e.g., 165">
        <br>
        <p id="bmi-result">BMI: </p>
    </div>

    <?php
    return ob_get_clean();
}

// Registers the BMI Calculator shortcode: [bmi_calculator]
add_shortcode('bmi_calculator', 'bmi_calculator_render_shortcode');
?>
