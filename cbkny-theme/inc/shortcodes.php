<?php
if (!defined('ABSPATH')) exit;

/**
 * [ny_excise_estimator]
 * Simple estimator for NY 9% wholesale excise. Not tax advice.
 */
add_shortcode('ny_excise_estimator', function($atts){
  ob_start(); ?>
  <form id="ny-excise-form" class="grid" style="grid-template-columns:1fr 1fr; align-items:end; gap:1rem;" onsubmit="return false;">
    <label>Wholesale Price (USD)
      <input type="number" step="0.01" min="0" id="ny-wholesale" style="width:100%; padding:.5rem; border:1px solid #ddd; border-radius:.5rem;">
    </label>
    <label>Excise Rate (%) 
      <input type="number" step="0.01" min="0" id="ny-rate" value="9" style="width:100%; padding:.5rem; border:1px solid #ddd; border-radius:.5rem;">
    </label>
    <button class="btn" id="ny-calc">Estimate</button>
  </form>
  <div id="ny-excise-output" class="card" style="margin-top:1rem;" aria-live="polite"></div>
  <?php
  return ob_get_clean();
});

# basic app.js
