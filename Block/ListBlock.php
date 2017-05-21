<?php

namespace Fisheye\BlueFootList\Block;

use Gene\BlueFoot\Block\Entity\PageBuilder\Block\AbstractBlock;

/**
 * Class for BlueFoot List Page Builder Block
 */
class ListBlock extends AbstractBlock
{
    /**
     * Get list title text
     *
     * @return string
     */
    public function getListTitle()
    {
        return $this->stripTags($this->getEntity()->getData('list_title'));
    }

    /**
     * Get list style (e.g. disc, square etc.)
     *
     * @return string
     */
    public function getListStyle()
    {
        return $this->getEntity()->getData('list_style');
    }
}
