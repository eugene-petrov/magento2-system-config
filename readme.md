[![ExtDN M2 Coding Standard](https://github.com/eugene-petrov/magento2-system-config/actions/workflows/coding-standard.yml/badge.svg?branch=main)](https://github.com/eugene-petrov/magento2-system-config/actions/workflows/coding-standard.yml)
[![ExtDN M2 Mess Detector](https://github.com/eugene-petrov/magento2-system-config/actions/workflows/mess-detector.yml/badge.svg?branch=main)](https://github.com/eugene-petrov/magento2-system-config/actions/workflows/mess-detector.yml)
[![ExtDN M2 PHPStan](https://github.com/eugene-petrov/magento2-system-config/actions/workflows/phpstan.yml/badge.svg?branch=main)](https://github.com/eugene-petrov/magento2-system-config/actions/workflows/phpstan.yml)

***Snippet_SystemConfig***

Task: Create a stores > configuration config

**How to install**
- composer require eugene-petrov/magento2-system-config
- php bin/magento module:enable Snippet_SystemConfig
- php bin/magento setup:upgrade
- php bin/magento clean:cache

**Example**

How it looks like in backend:
![backend](./.readme/backend.png)
![backend](./.readme/backend_1.png)

How it looks like in frontend http://{host.name}/snippet/config:
![frontend](./.readme/frontend.png)

[Magento DevDocs reference:](https://devdocs.magento.com/)

- [system.xml reference](https://devdocs.magento.com/guides/v2.4/config-guide/prod/config-reference-systemxml.html)
- [Creating a dynamic row system config](https://devdocs.magento.com/guides/v2.4/ext-best-practices/tutorials/dynamic-row-system-config.html)
