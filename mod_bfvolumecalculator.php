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

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

/** @var object $params */

global $bfvolumecalculatorModuleId;
if($bfvolumecalculatorModuleId)
{
	echo '<p>' . Text::_('MOD_BFVOLCALC_DUPLICATEMODULE') . '</p>';
	return;
}
$bfvolumecalculatorModuleId = true;

echo '<noscript><p>' . Text::_('MOD_BFVOLCALC_NOJAVASCRIPT') . '</p></noscript>';

require ModuleHelper::getLayoutPath('mod_bfvolumecalculator', $params->get('layout', 'default'));
