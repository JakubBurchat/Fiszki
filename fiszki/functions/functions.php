<?php
   function array_swap(&$array,$swap_a,$swap_b){ // swap do values in an array
      list($array[$swap_a],$array[$swap_b]) = array($array[$swap_b],$array[$swap_a]);
   }

   function pass_data_to_javascript($names, $values) { // pass simple data other than strings to javascript
      $index = 0;
      foreach ($names as $name) {
         echo "\n<script>var " . $name . "=" . $values[$index] . ";</script>";
         $index++;
      }
   }

   function pass_data_to_javascript_strings($names, $values) { // pass strings to javascript
      $index = 0;
      foreach ($names as $name) {
         echo "\n<script>var " . $name . '="' . $values[$index] . '";</script>';
         $index++;
      }
   }
?>