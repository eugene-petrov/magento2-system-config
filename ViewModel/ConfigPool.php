<?php

declare(strict_types=1);

namespace Snippet\SystemConfig\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Snippet\SystemConfig\Model\System\Config\DynamicForm;
use Snippet\SystemConfig\Model\System\Config\FrontendModel;
use Snippet\SystemConfig\Model\System\Config\General;

class ConfigPool implements ArgumentInterface
{
    /**
     * @var DynamicForm
     */
    private $dynamicForm;

    /**
     * @var FrontendModel
     */
    private $frontendModel;

    /**
     * @var General
     */
    private $general;

    /**
     * @param DynamicForm $dynamicForm
     * @param FrontendModel $frontendModel
     * @param General $general
     */
    public function __construct(DynamicForm $dynamicForm, FrontendModel $frontendModel, General $general)
    {
        $this->dynamicForm = $dynamicForm;
        $this->frontendModel = $frontendModel;
        $this->general = $general;
    }

    /**
     * @return DynamicForm
     */
    public function getDynamicFormConfig(): DynamicForm
    {
        return $this->dynamicForm;
    }

    /**
     * @return FrontendModel
     */
    public function getFrontendModelConfig(): FrontendModel
    {
        return $this->frontendModel;
    }

    /**
     * @return General
     */
    public function getGeneralConfig(): General
    {
        return $this->general;
    }
}
