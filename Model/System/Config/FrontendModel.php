<?php

declare(strict_types=1);

namespace Snippet\SystemConfig\Model\System\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class FrontendModel
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var string[]|null
     */
    private $data;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param string[]|null $data
     */
    public function __construct(ScopeConfigInterface $scopeConfig, $data = [])
    {
        $this->scopeConfig = $scopeConfig;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        $xmlConfigPath = $this->data['color'] ?? '';
        if (!$xmlConfigPath) {
            return '';
        }

        return (string) $this->scopeConfig->getValue($xmlConfigPath, ScopeInterface::SCOPE_STORE);
    }
}
