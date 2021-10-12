<?php

declare(strict_types=1);

namespace Snippet\SystemConfig\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;

class Ranges extends AbstractFieldArray
{
    /**
     * @var TaxColumn
     */
    private $taxRenderer;

    /**
     * @inheridoc
     */
    protected function _prepareToRender()
    {
        $this->addColumn('from_qty', ['label' => __('From'), 'class' => 'required-entry']);
        $this->addColumn('to_qty', ['label' => __('To'), 'class' => 'required-entry']);
        $this->addColumn('price', ['label' => __('Price'), 'class' => 'required-entry']);
        $this->addColumn('tax', [
            'label' => __('Tax'),
            'renderer' => $this->getTaxRenderer()
        ]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    /**
     * @inheridoc
     */
    protected function _prepareArrayRow(DataObject $row)
    {
        $options = [];

        $tax = $row->getTax();
        if ($tax !== null) {
            $options['option_' . $this->getTaxRenderer()->calcOptionHash($tax)] = 'selected="selected"';
        }

        $row->setData('option_extra_attrs', $options);
    }

    /**
     * @return TaxColumn
     * @throws LocalizedException
     */
    private function getTaxRenderer(): TaxColumn
    {
        if (!$this->taxRenderer) {
            $this->taxRenderer = $this->getLayout()->createBlock(
                TaxColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }

        return $this->taxRenderer;
    }
}
