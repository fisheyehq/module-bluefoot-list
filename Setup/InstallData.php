<?php

namespace Fisheye\BlueFootList\Setup;

use Gene\BlueFoot\Api\ContentBlockGroupRepositoryInterface;
use Gene\BlueFoot\Api\Data\ContentBlockGroupInterface;
use Gene\BlueFoot\Api\Data\ContentBlockGroupInterfaceFactory;
use Gene\BlueFoot\Model\Installer\File as InstallerFile;
use Magento\Framework\Filesystem\Io\File as IoFile;
use Magento\Framework\Module\Dir\Reader;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class to install data for list builder BlueFoot block
 */
class InstallData implements InstallDataInterface
{
    /**
     * @var ContentBlockGroupInterfaceFactory
     */
    protected $contentBlockGroupInterfaceFactory;

    /**
     * @var ContentBlockGroupRepositoryInterface
     */
    protected $contentBlockGroupRepository;

    /**
     * @var Reader
     */
    protected $moduleReader;

    /**
     * @var IoFile
     */
    protected $ioFile;

    /**
     * @var InstallerFile
     */
    protected $fileInstaller;

    /**
     * InstallData constructor.
     *
     * @param ContentBlockGroupInterfaceFactory $contentBlockGroupInterfaceFactory
     * @param ContentBlockGroupRepositoryInterface $contentBlockGroupRepositoryInterface
     * @param Reader $moduleReader
     * @param IoFile $ioFile
     * @param InstallerFile $fileInstaller
     */
    public function __construct(
        ContentBlockGroupInterfaceFactory $contentBlockGroupInterfaceFactory,
        ContentBlockGroupRepositoryInterface $contentBlockGroupRepositoryInterface,
        Reader $moduleReader,
        IoFile $ioFile,
        InstallerFile $fileInstaller
    ) {
        $this->contentBlockGroupInterfaceFactory = $contentBlockGroupInterfaceFactory;
        $this->contentBlockGroupRepository = $contentBlockGroupRepositoryInterface;
        $this->moduleReader = $moduleReader;
        $this->ioFile = $ioFile;
        $this->fileInstaller = $fileInstaller;
    }

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->addContentBlockGroup();
        $this->installData($setup);
        $setup->endSetup();
    }

    /**
     * Add Fisheye content block group (menu section)
     */
    protected function addContentBlockGroup()
    {
        /** @var ContentBlockGroupInterface $group */
        $group = $this->contentBlockGroupInterfaceFactory->create();
        $group->setCode('fisheye')
            ->setName('Fisheye')
            ->setIcon('<i class="fa fa-chevron-down"></i>')
            ->setSortOrder('50');
        $this->contentBlockGroupRepository->save($group);
    }

    /**
     * Install list page builder blocks and attributes from specified JSON file
     *
     * @param ModuleDataSetupInterface $setup
     */
    protected function installData(ModuleDataSetupInterface $setup)
    {
        $file = $this->moduleReader->getModuleDir(false, 'Fisheye_BlueFootList') . DIRECTORY_SEPARATOR . 'Setup' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'install-blocks-attributes.json';

        if ($this->ioFile->fileExists($file)) {
            $this->fileInstaller->install($file, $setup);
        }
    }
}
