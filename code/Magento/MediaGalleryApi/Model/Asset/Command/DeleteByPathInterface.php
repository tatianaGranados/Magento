<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\MediaGalleryApi\Model\Asset\Command;

/**
 * A command represents the media gallery asset delete action. A media gallery asset is filtered by path value.
 * @deprecated 101.0.0 use \Magento\MediaGalleryApi\Api\DeleteAssetsByPathInterface instead
 * @see \Magento\MediaGalleryApi\Api\DeleteAssetsByPathsInterface
 */
interface DeleteByPathInterface
{
    /**
     * Delete media asset by path
     *
     * @param string $mediaAssetPath
     * @return void
     */
    public function execute(string $mediaAssetPath): void;
}
