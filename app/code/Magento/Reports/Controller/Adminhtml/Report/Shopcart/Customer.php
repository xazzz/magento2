<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Reports\Controller\Adminhtml\Report\Shopcart;

class Customer extends \Magento\Reports\Controller\Adminhtml\Report\Shopcart
{
    /**
     * Customer shopping carts action
     *
     * @return void
     */
    public function execute()
    {
        $this->_initAction()->_setActiveMenu(
            'Magento_Reports::report_shopcart_customer'
        )->_addBreadcrumb(
            __('Customers Report'),
            __('Customers Report')
        )->_addContent(
            $this->_view->getLayout()->createBlock('Magento\Reports\Block\Adminhtml\Shopcart\Customer')
        );
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Customer Shopping Carts'));
        $this->_view->renderLayout();
    }
}
