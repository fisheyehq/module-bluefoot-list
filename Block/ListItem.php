<?php

namespace Fisheye\BlueFootList\Block;

use Gene\BlueFoot\Block\Entity\PageBuilder\Block\AbstractBlock;

/**
 * Class for BlueFoot List Item Page Builder Block
 */
class ListItem extends AbstractBlock
{
    /**
     * Get list item text
     *
     * @return string
     */
    public function getItemText()
    {
        return $this->stripTags($this->getEntity()->getData('list_item_text'));
    }

    /**
     * Get list item icon
     *
     * @return string
     */
    public function getItemIcon()
    {
        return $this->stripTags($this->getEntity()->getData('list_item_icon'));
    }

    /**
     * Get list item link URL
     *
     * @return string
     */
    public function getItemLinkUrl()
    {
        return $this->escapeXssInUrl($this->getEntity()->getData('list_item_url'));
    }

    /**
     * Get list item link target
     *
     * @return string
     */
    public function getItemLinkTarget()
    {
        return $this->getEntity()->getData('target_blank');
    }
}
