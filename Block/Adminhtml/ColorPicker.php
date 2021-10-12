<?php

declare(strict_types=1);

namespace Snippet\SystemConfig\Block\Adminhtml;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ColorPicker extends Field
{
    /**
     * Add color picker in admin configuration
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element): string
    {
        $html = $element->getElementHtml();
        $value = $element->getData('value');

        $html .= '
        <script>
            require([
            "jquery",
            "jquery/colorpicker/js/colorpicker",
            "domReady!"
            ], function ($) {
                let $el = $("#' . $element->getHtmlId() . '");
                $el.css("backgroundColor", "' . $value . '");

                // Attach the color picker
                $el.ColorPicker({
                    color: "' . $value . '",
                    onChange: function (hsb, hex) {
                    $el.css("backgroundColor", "#" + hex).val("#" + hex);
                }
              });
            });
        </script>';
        return $html;
    }
}
