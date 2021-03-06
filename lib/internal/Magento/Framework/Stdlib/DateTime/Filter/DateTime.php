<?php
/**
 * Date/Time filter. Converts datetime from localized to internal format.
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\Stdlib\DateTime\Filter;

class DateTime extends Date
{
    /**
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate
     */
    public function __construct(\Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate)
    {
        parent::__construct($localeDate);
        $this->_localToNormalFilter = new \Zend_Filter_LocalizedToNormalized(
            [
                'date_format' => $this->_localeDate->getDateTimeFormat(
                    \Magento\Framework\Stdlib\DateTime\TimezoneInterface::FORMAT_TYPE_SHORT
                ),
            ]
        );
        $this->_normalToLocalFilter = new \Zend_Filter_NormalizedToLocalized(
            ['date_format' => \Magento\Framework\Stdlib\DateTime::DATETIME_INTERNAL_FORMAT]
        );
    }
}
