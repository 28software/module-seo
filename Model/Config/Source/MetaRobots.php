<?php
/**
 * Copyright © 28Software (https://28software.com)
 * See LICENSE for the license details.
 */
declare(strict_types = 1);

namespace TESoftware\Seo\Model\Config\Source;

/**
 * @codeCoverageIgnore
 */
class MetaRobots extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public const DEFAULT          = 0;
    public const INDEX_FOLLOW     = 1;
    public const NOINDEX_FOLLOW   = 2;
    public const INDEX_NOFOLLOW   = 3;
    public const NOINDEX_NOFOLLOW = 4;

    /**
     * Retrieve All options
     *
     * @return array
     */
    public function getAllOptions()
    {
        return [
            [
                'value' => self::DEFAULT,
                'label' => __('-- Use default --'),
            ],
            [
                'value' => self::INDEX_FOLLOW,
                'label' => __('INDEX, FOLLOW'),
            ],
            [
                'value' => self::NOINDEX_FOLLOW,
                'label' => __('NOINDEX, FOLLOW '),
            ],
            [
                'value' => self::INDEX_NOFOLLOW,
                'label' => __('INDEX, NOFOLLOW'),
            ],
            [
                'value' => self::NOINDEX_NOFOLLOW,
                'label' => __('NOINDEX, NOFOLLOW'),
            ],
        ];
    }
}
