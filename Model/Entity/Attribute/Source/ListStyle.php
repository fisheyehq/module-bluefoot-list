<?php

namespace Fisheye\BlueFootList\Model\Entity\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class ListStyle extends AbstractSource
{
    /**
     * List style values
     */
    const NONE = 'none';
    const CIRCLE = 'circle';
    const DISC = 'disc';
    const SQUARE = 'square';

    /**
     * Retrieve all options array
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['label' => __('None'), 'value' => self::NONE],
                ['label' => __('Circle'), 'value' => self::CIRCLE],
                ['label' => __('Disc'), 'value' => self::DISC],
                ['label' => __('Square'), 'value' => self::SQUARE]
            ];
        }
        return $this->_options;
    }

    /**
     * Retrieve option array
     *
     * @return array
     */
    public function getOptionArray()
    {
        $options = [];
        foreach ($this->getAllOptions() as $option) {
            $options[$option['value']] = $option['label'];
        }
        return $options;
    }
}
