<?php
/**
 * Copyright © 28Software (https://28software.com)
 * See LICENSE for the license details.
 */
declare(strict_types = 1);

namespace TESoftware\Seo\Plugin;

use Magento\Framework\App\Request\Http;
use Magento\Framework\Registry;
use Magento\Framework\View\Page\Config as PageConfig;
use Magento\Framework\View\Page\Config\RendererInterface;
use TESoftware\Seo\Model\Config\Source\MetaRobots as MetaRobotsSource;

class AddProductMetaRobots
{
    private PageConfig $pageConfig;

    private const META_ROBOTS = [
        MetaRobotsSource::INDEX_FOLLOW     => 'INDEX,FOLLOW',
        MetaRobotsSource::NOINDEX_FOLLOW   => 'NOINDEX,FOLLOW',
        MetaRobotsSource::INDEX_NOFOLLOW   => 'INDEX,NOFOLLOW',
        MetaRobotsSource::NOINDEX_NOFOLLOW => 'NOINDEX,NOFOLLOW',
    ];
    private Http $request;
    private Registry $registry;

    public function __construct(
        Http $request,
        PageConfig $pageConfig,
        Registry $registry
    ) {
        $this->request = $request;
        $this->pageConfig = $pageConfig;
        $this->registry = $registry;
    }

    /**
     * @param RendererInterface $subject
     *
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeRenderMetadata(RendererInterface $subject): array
    {
        if ($this->getFullActionName() === 'catalog_product_view') {
            $product = $this->registry->registry('current_product');
            $metaRobotsKey = (int)$product->getData('meta_robots');
            if (isset(self::META_ROBOTS[$metaRobotsKey])) {
                $this->pageConfig->setRobots(self::META_ROBOTS[$metaRobotsKey]);
            }
        }

        return [];
    }

    /**
     * Get full action name
     *
     * @return string
     */
    public function getFullActionName()
    {
        return $this->request->getFullActionName();
    }
}
