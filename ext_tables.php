<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Magnific Popup only');

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

/**
 * Add extra field showinpreview and some special news controls to sys_file_reference record
 */
$additionalSysFileReferenceColumns = array(
	'jh_magnificpopup_mfponly' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:jh_magnificpopup_mfponly/Resources/Private/Language/locallang.xml:tx_jhmagnificpopupmfponly_tca.jh_magnificpopup_mfponly',
		'config' => array(
			'type' => 'check',
			'default' => 0
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file_reference', $additionalSysFileReferenceColumns);

// add special news palette
$GLOBALS['TCA']['sys_file_reference']['palettes']['newsPalette']['showitem'] .= ',jh_magnificpopup_mfponly';