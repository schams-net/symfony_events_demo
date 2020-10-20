<?php
declare(strict_types=1);
namespace SchamsNet\SymfonyEventsDemo\EventListener;

/*
 * TYPO3 Symfony Events Demo
 *
 * (c)2020 by Michael Schams <schams.net>
 * https://schams.net
 */

use \TYPO3\CMS\Core\Log\LogManager;
use \TYPO3\CMS\Core\Resource\Event\AfterFileAddedEvent;
use \TYPO3\CMS\Core\Resource\Event\AfterFileReplacedEvent;
use \TYPO3\CMS\Core\Resource\File;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Event listener class to process added/replaced files on upload.
 */
class FileProcessorListener
{
    /**
     * @access public
     * @var \TYPO3\CMS\Core\Log\Logger
     */
    public $logger;

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {
        /** @var $logger \TYPO3\CMS\Core\Log\Logger */
        $this->logger = GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__);
    }

    /**
     * Method is executed when a new file is added
     * See: Configuration/Services.yaml
     *
     * @access public
     * @param AfterFileAddedEvent $event
     */
    public function invokeAfterFileAdded(AfterFileAddedEvent $event): void
    {
        if ($event->getFile() instanceof File) {
            // Do something with the image
            $this->writeFileMetaData($event->getFile());
        }
    }

    /**
     * Method is executed when a file is replaced
     * See: Configuration/Services.yaml
     *
     * @access public
     * @param AfterFileReplacedEvent $event
     */
    public function invokeAfterFileReplaced(AfterFileReplacedEvent $event): void
    {
        if ($event->getFile() instanceof File) {
            // Do something with the image
            $this->writeFileMetaData($event->getFile());
        }
    }

    /**
     * Write file meta data into log
     *
     * @access private
     * @param File $file
     */
    private function writeFileMetaData(File $file): void
    {
        $this->logger->info('UID: ' . $file->getUid());
        $this->logger->info('Name: ' . $file->getName());
        $this->logger->info('Mime type: ' . $file->getMimeType());
        $this->logger->info('Size: ' . $file->getSize());
    }
}
