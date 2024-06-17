# Magento 2 KvaPay Plugin

## Installation via Composer

You can install Magento 2 KvaPay plugin via [Composer](http://getcomposer.org/). Run the following command in your terminal:

1. Go to your Magento 2 root folder.

2. Enter following commands to install plugin:

    ```bash
    composer require kvapay/magento2-plugin
    ```
   Wait while dependencies are updated.

3. Enter following commands to enable plugin:

    ```bash
    php bin/magento module:enable KvaPay_Merchant --clear-static-content
    php bin/magento setup:upgrade
    ```

## Plugin Configuration

Enable and configure KvaPay plugin in Magento Admin under `Stores / Configuration / Sales / Payment Methods / Bitcoin and Altcoins via KvaPay`.

