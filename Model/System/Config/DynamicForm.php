<?php

declare(strict_types=1);

namespace Snippet\SystemConfig\Model\System\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\Serialize\Serializer\Json;

class DynamicForm
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var Json
     */
    private $json;

    /**
     * @var string[]|null
     */
    private $data;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param Json $json
     * @param string[]|null $data
     */
    public function __construct(ScopeConfigInterface $scopeConfig, Json $json, $data = [])
    {
        $this->scopeConfig = $scopeConfig;
        $this->json = $json;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getValues(): array
    {
        $xmlConfigPath = $this->data['values'] ?? '';
        if (!$xmlConfigPath) {
            return [];
        }

        return $this->json->unserialize($this->scopeConfig->getValue($xmlConfigPath, ScopeInterface::SCOPE_STORE));
    }
}
