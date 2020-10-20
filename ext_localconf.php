<?php

/*
 * TYPO3 Symfony Events Demo
 *
 * (c)2020 by Michael Schams <schams.net>
 * https://schams.net
 */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Configure logging
$logging = [
    \TYPO3\CMS\Core\Log\LogLevel::INFO => [
        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
            'logFile' => 'debug.log'
        ]
    ]
];

// @codingStandardsIgnoreLine
$GLOBALS['TYPO3_CONF_VARS']['LOG']['SchamsNet']['SymfonyEventsDemo']['EventListener']['writerConfiguration'] = $logging;
unset($logging);
