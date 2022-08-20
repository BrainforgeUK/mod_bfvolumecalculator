<?php
/**
 * @package		Module for pond / aquarium volume calculator
 * @subpackage	mod_bfvolumecalculator
 * @author		brainforge.co.uk
 * @copyright	Copyright (C) 2010-2022 Jonathan Brain. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

?>
<script>
function bfvolume_setfieldstate(id, enabled) {
  var el1 = document.getElementById(id);
  var el2 = document.getElementById(id + '_row');

  if (enabled) {
    el1.removeAttribute('disabled');
    el2.style.display = '';
  }
  else {
    el1.setAttribute('disabled', true);
    el2.style.display = 'none';
  }
} 
 
function bfvolume_recalculate() {
  var shape = document.getElementById('cal_shape').value;
  if (shape == null) return;
  var sizeUnits = document.getElementById('cal_size_units').value;
  if (sizeUnits == null) return;
  var volumeUnits = document.getElementById('cal_volume_units').value;
  if (volumeUnits == null) return;
  
  var length;
  var width;
  var diameter;
  var depth = document.getElementById('cal_depth').value;

  var vol;
  var tmp;

  if (shape == 'R') {
    bfvolume_setfieldstate('cal_length', true);
    bfvolume_setfieldstate('cal_width', true);
    bfvolume_setfieldstate('cal_diameter', false);
    length = document.getElementById('cal_length').value;
    width  = document.getElementById('cal_width').value;
    tmp = length * sizeUnits * width * sizeUnits * depth * sizeUnits;
  }
  else {
    bfvolume_setfieldstate('cal_length', false);
    bfvolume_setfieldstate('cal_width', false);
    bfvolume_setfieldstate('cal_diameter', true);
    diameter = document.getElementById('cal_diameter').value;
    tmp = (sizeUnits * diameter/2) * (sizeUnits * diameter/2) * 3.14159 * depth * sizeUnits;
  }
  if (tmp > 0) {
    pwr = 1;
    while ((Math.round((tmp  * pwr) / volumeUnits) / pwr) == 0) {
      pwr *= 10;
    }
    pwr *= 10;
    vol = Math.round((tmp  * pwr) / volumeUnits) / pwr;
    document.getElementById('cal_volume').value = vol;
  }
  else document.getElementById('cal_volume').value = '';
}

document.addEventListener("DOMContentLoaded", function(event) {
  bfvolume_recalculate();

  var inputs = document.forms["bfvolume-calculator"].getElementsByTagName("input");
  for (i=0; i<inputs.length; i++) {
    inputs[i].addEventListener('keypress', function (event) {
      var valid = true;

      event = event || window.event;
      if (event.keyCode < 48 || event.keyCode > 57) {
        switch(event.keyCode)
        {
          case 0:
          case 8:
            break;
          case 46:
            var target = event.target || event.srcElement;
            var val = document.getElementById(target.id).value;
            valid = (val.indexOf('.') == -1);
            break;
          default:
            valid = false;
            break;
        }
      }

      if (valid) {
        document.getElementById('cal_volume').value = '';
        return;
      }

      event.preventDefault();
    });
  }

  document.getElementById('cal_volume').focus(function(event) {
    document.getElementById('cal_depth').focus();
  });
});
</script>