<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Framework\Notification;

use Magento\TestFramework\Helper\ObjectManager as ObjectManagerHelper;

class NotifierListTest extends \PHPUnit_Framework_TestCase
{
    /** @var ObjectManagerHelper */
    protected $objectManagerHelper;

    /** @var \Magento\Framework\ObjectManagerInterface|\PHPUnit_Framework_MockObject_MockObject */
    protected $objectManager;

    protected function setUp()
    {
        $this->objectManager = $this->getMock('Magento\Framework\ObjectManagerInterface');
        $this->objectManagerHelper = new ObjectManagerHelper($this);
    }

    public function testAsArraySuccess()
    {
        $notifier1 = $this->objectManagerHelper->getObject('Magento\Framework\Notification\NotifierPool');
        $notifier2 = $this->objectManagerHelper->getObject('Magento\Framework\Notification\NotifierPool');
        $notifierList = $this->objectManagerHelper->getObject(
            'Magento\Framework\Notification\NotifierList',
            [
                'objectManager' => $this->objectManager,
                'notifiers' => [$notifier1, $notifier2]
            ]
        );
        $this->setExpectedException('InvalidArgumentException');
        $result = $notifierList->asArray();
        foreach ($result as $notifier) {
            $this->assertInstanceOf('Magento\Framework\Notification\NotifierInterface', $notifier);
        }
    }

    public function testAsArrayException()
    {
        $notifierCorrect = $this->objectManagerHelper->getObject('Magento\Framework\Notification\NotifierPool');
        $notifierIncorrect = $this->objectManagerHelper->getObject('Magento\Framework\Notification\NotifierList');
        $notifierList = $this->objectManagerHelper->getObject(
            'Magento\Framework\Notification\NotifierList',
            [
                'objectManager' => $this->objectManager,
                'notifiers' => [$notifierCorrect, $notifierIncorrect]
            ]
        );
        $this->setExpectedException('InvalidArgumentException');
        $notifierList->asArray();
    }
}
