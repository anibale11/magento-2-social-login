<?php
/**
 * Ecomteck
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Ecomteck.com license that is
 * available through the world-wide-web at this URL:
 * https://ecomteck.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Ecomteck
 * @package     Ecomteck_SocialLogin
 * @copyright   Copyright (c) 2018 Ecomteck (https://ecomteck.com/)
 * @license     https://ecomteck.com/LICENSE.txt
 */

namespace Ecomteck\SocialLogin\Helper;

use Magento\Framework\App\RequestInterface;
use Ecomteck\Core\Helper\AbstractData as CoreHelper;

/**
 * Class Data
 *
 * @package Ecomteck\SocialLogin\Helper
 */
class Data extends CoreHelper
{
    const CONFIG_MODULE_PATH = 'sociallogin';

    /**
     * @param null $storeId
     * @return mixed
     */
    public function isCaptchaEnabled($storeId = null)
    {
        return $this->getConfigValue(static::CONFIG_MODULE_PATH . '/captcha/is_enabled', $storeId);
    }

    /**
     * @param \Magento\Framework\App\RequestInterface $request
     * @param                                         $formId
     * @return string
     */
    public function captchaResolve(RequestInterface $request, $formId)
    {
        $captchaParams = $request->getPost(\Magento\Captcha\Helper\Data::INPUT_NAME_FIELD_VALUE);

        return isset($captchaParams[$formId]) ? $captchaParams[$formId] : '';
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function canSendPassword($storeId = null)
    {
        return $this->getConfigGeneral('send_password', $storeId);
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getPopupEffect($storeId = null)
    {
        return $this->getConfigGeneral('popup_effect', $storeId);
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getStyleManagement($storeId = null)
    {
        $style = $this->getConfigGeneral('style_management', $storeId);
        if ($style == 'custom') {
            return $this->getCustomColor($storeId);
        }

        return $style;
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getCustomColor($storeId = null)
    {
        return $this->getConfigGeneral('custom_color', $storeId);
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getCustomCss($storeId = null)
    {
        return $this->getConfigGeneral('custom_css', $storeId);
    }

    /**
     * @return mixed
     */
    public function isSecure()
    {
        $isSecure = $this->getConfigValue('web/secure/use_in_frontend');

        return $isSecure;
    }
}
