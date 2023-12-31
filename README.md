# Magento 2: Search Orders by Phone

## Overview

The "Magento 2: Search Orders by Phone" module extends the functionality of the Magento 2 REST API by adding a new endpoint that allows searching of orders using a phone number. 

Magento 2 does not have any built-in functionality to search orders by the telephone number (associated with the shipping address). This module addresses this limitation, providing an efficient way to locate orders associated with a specific telephone number.

## Installation

1. Navigate to the root of your Magento 2 directory:  
    ```
    cd your/magento/root
    ```

2. Clone the repository into your Magento 2's `app/code` directory. Ensure the contents of the repository are added into a directory called `agnoStack/OrderSearchByPhone`. (i.e. `app/code/agnoStack/OrderSearchByPhone/`):
    ```
    git clone https://github.com/agnostack/magento-search-orders-by-phone.git app/code/agnoStack/OrderSearchByPhone
    ```

3. Enable the module:
    ```
    php bin/magento module:enable agnoStack_OrderSearchByPhone
    ```

4. "Upgrade" your Magento installation and clear cache. This step is needed to make sure that the module's data setup scripts run properly:
    ```
    php bin/magento setup:upgrade
    php bin/magento setup:di:compile
    php bin/magento setup:static-content:deploy -f
    php bin/magento cache:clean
    php bin/magento cache:flush
    ```

Now the module is successfully installed on your Magento server.

## How to Test

After installing the module, you can test the functionality by sending a GET request to the new endpoint `/V1/orders/phone/:phone`. Replace `:phone` with the phone number you are searching for.

Remember, this is an admin REST API endpoint, so you'll need to pass an authorization token in the request header. 

You can obtain an admin token by calling the `/V1/integration/admin/token` API with the admin username and password.

An example of the cURL request might look like this:

```bash
curl -X GET "http://<your magento host>/rest/V1/orders/phone/1234567890" -H "Authorization: Bearer <admin-token>"
```

Replace `<your magento host>` with your Magento host URL and `<admin-token>` with the token you received from the /V1/integration/admin/token API.

## Support

For any further questions, issues, or feedback - please reach out to us at [support@agnostack.com](mailto:support@agnostack.com).

NOTE: This code is provided as-is and will be community maintained. If you find an issue, problem and/or would like to see additional functionality included please open an Issue and raise a Pull Request with desired changes.
