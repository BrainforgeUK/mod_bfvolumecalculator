<?php
/**
 * @package		Module for pond / aquarium volume calculator
 * @subpackage	mod_bfvolumecalculator
 * @author		brainforge.co.uk
 * @copyright	Copyright (C) 2010-2012 Jonathan Brain. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

/** @var object $params */

include_once __DIR__ . '/default_script.php';

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
?>
<form id="bfvolume-calculator" method="post" action="#">
    <table class="bfvolume-calculator<?php echo $moduleclass_sfx ?>" summary="Volume Calculator">
        <tr>
            <th>
                <label for="cal_shape" accesskey="S">
                    <?php echo Text::_('MOD_BFVOLCALC_SHAPE_LABEL'); ?>
                </label></th>
            <td>
                <select name="cal_shape" id="cal_shape" size="1" tabindex="1" onchange="bfvolume_recalculate();">
                  <option value="R" selected="selected"><?php echo Text::_('MOD_BFVOLCALC_RECTANGLE_OPT'); ?></option>
                  <option value="C"><?php echo Text::_('MOD_BFVOLCALC_CIRCLE_OPT'); ?></option>
                </select>
            </td>
            <td>
                <select name="cal_size_units" id="cal_size_units" size="1" tabindex="2" onchange="bfvolume_recalculate();">
                  <option value="1"><?php echo Text::_('MOD_BFVOLCALC_MILLIMETRES_OPT'); ?></option>
                  <option value="10"><?php echo Text::_('MOD_BFVOLCALC_CENTIMETRES_OPT'); ?></option>
                  <option value="1000" selected="selected"><?php echo Text::_('MOD_BFVOLCALC_METRES_OPT'); ?></option>
                  <option value="25.4"><?php echo Text::_('MOD_BFVOLCALC_INCHES_OPT'); ?></option>
                  <option value="304.8"><?php echo Text::_('MOD_BFVOLCALC_FEET_OPT'); ?></option>
                </select>
            </td>
        </tr>
        
        <tr id="cal_diameter_row" >
            <th>
                <label id="cal_diameter_lab" for="cal_diameter" accesskey="L">
                    <?php echo Text::_('MOD_BFVOLCALC_DIAMETER'); ?>
                </label>
            </th>
            <td>
                <input type="text" tabindex="3" id="cal_diameter" name="cal_diameter" size="10" maxlength="10"
                       onchange="bfvolume_recalculate();" disabled="disabled" autocomplete="off"/>
            </td>
            <td>&nbsp;</td>
        </tr>

        <tr id="cal_length_row" >
            <th>
                <label id="cal_length_lab"  for="cal_length" accesskey="L">
                    <?php echo Text::_('MOD_BFVOLCALC_LENGTH'); ?>
                </label>
            </th>
            <td>
                <input type="text" tabindex="4" id="cal_length" name="cal_length" size="10" maxlength="10"
                       onchange="bfvolume_recalculate();" autocomplete="off"/>
            </td>
            <td>&nbsp;</td>
        </tr>

        <tr id="cal_width_row" >
            <th>
                <label id="cal_width_lab"  for="cal_width" accesskey="W">
                    <?php echo Text::_('MOD_BFVOLCALC_WIDTH'); ?>
                </label>
            </th>
            <td>
                <div id="div_width_label">
                    <input type="text" tabindex="5" id="cal_width" name="cal_width" size="10" maxlength="10"
                           onchange="bfvolume_recalculate();"  autocomplete="off"/>
                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
        
        <tr>
            <th>
                <label for="cal_depth" accesskey="D">
                    <?php echo Text::_('MOD_BFVOLCALC_DEPTH'); ?>
                </label></th>
            <td>
                <input type="text" tabindex="6" id="cal_depth" name="cal_depth" size="10" maxlength="10"
                       onchange="bfvolume_recalculate();" autocomplete="off"/>
            </td>
            <td>&nbsp;</td>
        </tr>
        
        <tr>
            <th>
                <label for="cal_volume" accesskey="V">
                    <?php echo Text::_('MOD_BFVOLCALC_VOLUME'); ?>
                </label>
            </th>
            <td>
                <input type="text" readonly="readonly" tabindex="7" id="cal_volume" name="cal_volume" size="10"
                       maxlength="10" autocomplete="off"/>
            </td>
            <td>
                <select name="cal_volume_units" id="cal_volume_units" size="1" tabindex="8" onchange="bfvolume_recalculate();">
                  <option value="1000000" selected="selected"><?php echo Text::_('MOD_BFVOLCALC_LITRES_OPT'); ?></option>
                  <option value="4546000"><?php echo Text::_('MOD_BFVOLCALC_GALLONS_OPT'); ?></option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td style="text-align:center;" colspan="3">
                <input type="submit" value="<?php echo Text::_('MOD_BFVOLCALC_RECALCULATE');?>" style="width:150px;"
                       onclick="bfvolume_recalculate(); return false;" autocomplete="off"/>
            </td>
        </tr>
    </table>
</form>