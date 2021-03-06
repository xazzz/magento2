<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Catalog\Model\Product\Configuration\Item;

/**
 * Product configurational item interface
 */
interface ItemInterface
{
    /**
     * Retrieve associated product
     *
     * @return \Magento\Catalog\Model\Product
     */
    public function getProduct();

    /**
     * Get item option by code
     *
     * @param   string $code
     * @return  \Magento\Catalog\Model\Product\Configuration\Item\Option\OptionInterface
     */
    public function getOptionByCode($code);

    /**
     * Returns special download params (if needed) for custom option with type = 'file''
     * Return null, if not special params needed'
     * Or return \Magento\Framework\Object with any of the following indexes:
     *  - 'url' - url of controller to give the file
     *  - 'urlParams' - additional parameters for url (custom option id, or item id, for example)
     *
     * @return null|\Magento\Framework\Object
     */
    public function getFileDownloadParams();
}
