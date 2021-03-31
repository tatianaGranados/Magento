<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\BundleGraphQl\Model\Cart;

use Magento\Bundle\Helper\Catalog\Product\Configuration;
use Magento\Catalog\Model\Product;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\GraphQl\Query\Uid;
use Magento\Quote\Model\Quote\Item;
use Magento\Framework\Pricing\Helper\Data;
use Magento\Framework\Serialize\SerializerInterface;

/**
 * Data provider for bundled product options
 */
class BundleOptionDataProvider
{
    /**
     * Option type name
     */
    private const OPTION_TYPE = 'bundle';

    /**
     * @var Data
     */
    private $pricingHelper;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var Configuration
     */
    private $configuration;

    /** @var Uid */
    private $uidEncoder;

    /**
     * @param Data $pricingHelper
     * @param SerializerInterface $serializer
     * @param Configuration $configuration
     * @param Uid|null $uidEncoder
     */
    public function __construct(
        Data $pricingHelper,
        SerializerInterface $serializer,
        Configuration $configuration,
        Uid $uidEncoder = null
    ) {
        $this->pricingHelper = $pricingHelper;
        $this->serializer = $serializer;
        $this->configuration = $configuration;
        $this->uidEncoder = $uidEncoder ?: ObjectManager::getInstance()
            ->get(Uid::class);
    }

    /**
     * Extract data for a bundled cart item
     *
     * @param Item $item
     * @return array
     */
    public function getData(Item $item): array
    {
        $options = [];
        $product = $item->getProduct();

        /** @var \Magento\Bundle\Model\Product\Type $typeInstance */
        $typeInstance = $product->getTypeInstance();

        $optionsQuoteItemOption = $item->getOptionByCode('bundle_option_ids');
        $bundleOptionsIds = $optionsQuoteItemOption
            ? $this->serializer->unserialize($optionsQuoteItemOption->getValue())
            : [];

        if ($bundleOptionsIds) {
            /** @var \Magento\Bundle\Model\ResourceModel\Option\Collection $optionsCollection */
            $optionsCollection = $typeInstance->getOptionsByIds($bundleOptionsIds, $product);

            $selectionsQuoteItemOption = $item->getOptionByCode('bundle_selection_ids');

            $bundleSelectionIds = $this->serializer->unserialize($selectionsQuoteItemOption->getValue());

            if (!empty($bundleSelectionIds)) {
                $selectionsCollection = $typeInstance->getSelectionsByIds($bundleSelectionIds, $product);
                $bundleOptions = $optionsCollection->appendSelections($selectionsCollection, true);

                $options = $this->buildBundleOptions($bundleOptions, $item);
            }
        }

        return $options;
    }

    /**
     * Build bundle product options based on current selection
     *
     * @param \Magento\Bundle\Model\Option[] $bundleOptions
     * @param Item $item
     * @return array
     */
    private function buildBundleOptions(array $bundleOptions, Item $item): array
    {
        $options = [];
        foreach ($bundleOptions as $bundleOption) {
            if (!$bundleOption->getSelections()) {
                continue;
            }

            $options[] = [
                'id' => $bundleOption->getId(),
                'uid' => $this->uidEncoder->encode(self::OPTION_TYPE . '/' . $bundleOption->getId()),
                'label' => $bundleOption->getTitle(),
                'type' => $bundleOption->getType(),
                'values' => $this->buildBundleOptionValues($bundleOption->getSelections(), $item),
            ];
        }

        return $options;
    }

    /**
     * Build bundle product option values based on current selection
     *
     * @param Product[] $selections
     * @param Item $item
     * @return array
     */
    private function buildBundleOptionValues(array $selections, Item $item): array
    {
        $values = [];

        $product = $item->getProduct();
        foreach ($selections as $selection) {
            $qty = (float) $this->configuration->getSelectionQty($product, $selection->getSelectionId());
            if (!$qty) {
                continue;
            }

            $selectionPrice = $this->configuration->getSelectionFinalPrice($item, $selection);
            $optionDetails = [
                self::OPTION_TYPE,
                $selection->getData('option_id'),
                $selection->getData('selection_id'),
                (int) $selection->getData('selection_qty')
            ];
            $values[] = [
                'id' => $selection->getSelectionId(),
                'uid' => $this->uidEncoder->encode(implode('/', $optionDetails)),
                'label' => $selection->getName(),
                'quantity' => $qty,
                'price' => $this->pricingHelper->currency($selectionPrice, false, false),
            ];
        }

        return $values;
    }
}
