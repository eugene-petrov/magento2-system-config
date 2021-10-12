<?php

declare(strict_types=1);

namespace Snippet\SystemConfig\Block\Adminhtml\Form\Field;

use Magento\Framework\View\Element\Html\Select;
use Magento\Framework\View\Element\Context;
use Magento\Config\Model\Config\Source\Yesno;

class TaxColumn extends Select
{
    /**
     * @var Yesno
     */
    private $yesno;

    /**
     * @param Context $context
     * @param Yesno $yesno
     * @param array $data
     */
    public function __construct(Context $context, Yesno $yesno, array $data = [])
    {
        parent::__construct($context, $data);
        $this->yesno = $yesno;
    }

    /**
     * Set "name" for <select> element
     *
     * @param string $value
     * @return Select
     */
    public function setInputName(string $value): Select
    {
        return $this->setName($value);
    }

    /**
     * Set "id" for <select> element
     *
     * @param string $value
     * @return Select
     */
    public function setInputId(string $value): Select
    {
        return $this->setId($value);
    }

    /**
     * @inheridoc
     */
    public function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->yesno->toOptionArray());
        }

        return parent::_toHtml();
    }
}
