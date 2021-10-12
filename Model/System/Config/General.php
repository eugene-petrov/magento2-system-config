<?php

declare(strict_types=1);

namespace Snippet\SystemConfig\Model\System\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Store\Model\ScopeInterface;

class General
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var EncryptorInterface
     */
    private $encryptor;

    /**
     * @var string[]|null
     */
    private $data;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param EncryptorInterface $encryptor
     * @param string[]|null $data
     */
    public function __construct(ScopeConfigInterface $scopeConfig, EncryptorInterface $encryptor, $data = [])
    {
        $this->scopeConfig = $scopeConfig;
        $this->encryptor = $encryptor;
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool) $this->getValue('enabled');
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->getValue('api_url');
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->encryptor->decrypt($this->getValue('api_key'));
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getValue('email');
    }

    /**
     * @return string
     */
    public function getCountries(): string
    {
        return $this->getValue('countries');
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->getValue('time');
    }

    /**
     * @param string $configName
     * @return string
     */
    private function getValue(string $configName): string
    {
        $xmlConfigPath = $this->data[$configName] ?? '';
        if (!$xmlConfigPath) {
            return '';
        }

        return (string) $this->scopeConfig->getValue($xmlConfigPath, ScopeInterface::SCOPE_STORE);
    }
}
