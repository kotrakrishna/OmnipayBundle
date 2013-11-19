<?php

namespace Xola\OmnipayBundle\Tests\Service;

use Xola\OmnipayBundle\Service\Omnipay;

class OmnipayTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateAuthorizeNetAIM()
    {
        // Do not run test if Gateway has not been included
        if(!class_exists('Omnipay\\AuthorizeNet\\AIMGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\AuthorizeNet\\AIMGateway not found');
            return;
        }

        $config = array(
            'authorize_net_aim' => array(
                'apiLoginId' => 'abc123',
                'transactionKey' => 'xyz987',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\AuthorizeNet\AIMGateway $gateway */
        $gateway = $service->create('AuthorizeNet_AIM');

        $this->assertInstanceOf('Omnipay\\AuthorizeNet\\AIMGateway', $gateway, 'Must return an Authorize.NET AIM gateway');
        $this->assertEquals('abc123', $gateway->getApiLoginId(), 'API login ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getTransactionKey(), 'Transaction key must match configuration');
    }

    public function testCreateAuthorizeNetSIM()
    {
        if(!class_exists('Omnipay\\AuthorizeNet\\SIMGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\AuthorizeNet\\SIMGateway not found');
            return;
        }

        $config = array(
            'authorize_net_sim' => array(
                'apiLoginId' => 'abc123',
                'transactionKey' => 'xyz987',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\AuthorizeNet\AIMGateway $gateway */
        $gateway = $service->create('AuthorizeNet_SIM');

        $this->assertInstanceOf('Omnipay\\AuthorizeNet\\SIMGateway', $gateway, 'Must return an Authorize.NET SIM gateway');
        $this->assertEquals('abc123', $gateway->getApiLoginId(), 'API login ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getTransactionKey(), 'Transaction key must match configuration');
    }

    public function testCreateBuckaroo()
    {
        if(!class_exists('Omnipay\\Buckaroo\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\Buckaroo\\Gateway not found');
            return;
        }

        $config = array(
            'buckaroo' => array(
                'merchantId' => 'abc123',
                'secret' => 'xyz987',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\Buckaroo\Gateway $gateway */
        $gateway = $service->create('Buckaroo');

        $this->assertInstanceOf('Omnipay\\Buckaroo\\Gateway', $gateway, 'Must return a Buckaroo gateway');
        $this->assertEquals('abc123', $gateway->getMerchantId(), 'Merchant ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getSecret(), 'Secret must match configuration');
    }

    public function testCreateCardSave()
    {
        if(!class_exists('Omnipay\\CardSave\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\CardSave\\Gateway not found');
            return;
        }

        $config = array(
            'card_save' => array(
                'merchantId' => 'abc123',
                'password' => 'xyz987',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\CardSave\Gateway $gateway */
        $gateway = $service->create('CardSave');

        $this->assertInstanceOf('Omnipay\\CardSave\\Gateway', $gateway, 'Must return a CardSave gateway');
        $this->assertEquals('abc123', $gateway->getMerchantId(), 'Merchant ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getPassword(), 'Password must match configuration');
    }

    public function testCreateEwayRapid()
    {
        if(!class_exists('Omnipay\\Eway\\RapidGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\Eway\\RapidGateway not found');
            return;
        }

        $config = array(
            'eway_rapid' => array(
                'apiKey' => 'abc123',
                'password' => 'xyz987',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\Eway\RapidGateway $gateway */
        $gateway = $service->create('Eway_Rapid');

        $this->assertInstanceOf('Omnipay\\Eway\\RapidGateway', $gateway, 'Must return an eWAY Rapid gateway');
        $this->assertEquals('abc123', $gateway->getApiKey(), 'API key must match configuration');
        $this->assertEquals('xyz987', $gateway->getPassword(), 'Password must match configuration');
    }

    public function testCreateGoCardless()
    {
        if(!class_exists('Omnipay\\GoCardless\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\GoCardless\\Gateway not found');
            return;
        }

        $config = array(
            'go_cardless' => array(
                'appId' => 'abc123',
                'appSecret' => 'xyz987',
                'merchantId' => 'pqr567',
                'accessToken' => 'uvw543',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\GoCardless\Gateway $gateway */
        $gateway = $service->create('GoCardless');

        $this->assertInstanceOf('Omnipay\\GoCardless\\Gateway', $gateway, 'Must return a GoCardless gateway');
        $this->assertEquals('abc123', $gateway->getAppId(), 'App ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getAppSecret(), 'App secret must match configuration');
        $this->assertEquals('pqr567', $gateway->getMerchantId(), 'Merchant ID must match configuration');
        $this->assertEquals('uvw543', $gateway->getAccessToken(), 'Access token must match configuration');
    }

    public function testCreateMigsTwoParty()
    {
        if(!class_exists('Omnipay\\Migs\\TwoPartyGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\Migs\\TwoPartyGateway not found');
            return;
        }

        $config = array(
            'migs_two_party' => array(
                'merchantId' => 'abc123',
                'merchantAccessCode' => 'xyz987',
                'secureHash' => 'pqr567',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\Migs\TwoPartyGateway $gateway */
        $gateway = $service->create('Migs_TwoParty');

        $this->assertInstanceOf('Omnipay\\Migs\\TwoPartyGateway', $gateway, 'Must return a MIGS 2-Party gateway');
        $this->assertEquals('abc123', $gateway->getMerchantId(), 'Merchant ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getMerchantAccessCode(), 'Merchant access code must match configuration');
        $this->assertEquals('pqr567', $gateway->getSecureHash(), 'Secure hash must match configuration');
    }

    public function testCreateMigsThreeParty()
    {
        if(!class_exists('Omnipay\\Migs\\ThreePartyGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\Migs\\ThreePartyGateway not found');
            return;
        }

        $config = array(
            'migs_three_party' => array(
                'merchantId' => 'abc123',
                'merchantAccessCode' => 'xyz987',
                'secureHash' => 'pqr567',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\Migs\ThreePartyGateway $gateway */
        $gateway = $service->create('Migs_ThreeParty');

        $this->assertInstanceOf('Omnipay\\Migs\\ThreePartyGateway', $gateway, 'Must return a MIGS 3-Party gateway');
        $this->assertEquals('abc123', $gateway->getMerchantId(), 'Merchant ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getMerchantAccessCode(), 'Merchant access code must match configuration');
        $this->assertEquals('pqr567', $gateway->getSecureHash(), 'Secure hash must match configuration');
    }

    public function testCreateMollie()
    {
        if(!class_exists('Omnipay\\Mollie\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\Mollie\\Gateway not found');
            return;
        }

        $config = array(
            'mollie' => array(
                'partnerId' => 'abc123',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\Mollie\Gateway $gateway */
        $gateway = $service->create('Mollie');

        $this->assertInstanceOf('Omnipay\\Mollie\\Gateway', $gateway, 'Must return a Mollie gateway');
        $this->assertEquals('abc123', $gateway->getPartnerId(), 'Partner ID must match configuration');
    }

    public function testCreateMultiSafepay()
    {
        if(!class_exists('Omnipay\\MultiSafepay\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\MultiSafepay\\Gateway not found');
            return;
        }

        $config = array(
            'multi_safepay' => array(
                'accountId' => 'abc123',
                'siteId' => 'xyz987',
                'siteCode' => 'pqr567',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\MultiSafepay\Gateway $gateway */
        $gateway = $service->create('MultiSafepay');

        $this->assertInstanceOf('Omnipay\\MultiSafepay\\Gateway', $gateway, 'Must return a MultiSafepay gateway');
        $this->assertEquals('abc123', $gateway->getAccountId(), 'Account ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getSiteId(), 'Site ID must match configuration');
        $this->assertEquals('pqr567', $gateway->getSiteCode(), 'Site code must match configuration');
    }

    public function testCreateNetaxept()
    {
        if(!class_exists('Omnipay\\Netaxept\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\Netaxept\\Gateway not found');
            return;
        }

        $config = array(
            'netaxept' => array(
                'merchantId' => 'abc123',
                'password' => 'xyz987',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\Netaxept\Gateway $gateway */
        $gateway = $service->create('Netaxept');

        $this->assertInstanceOf('Omnipay\\Netaxept\\Gateway', $gateway, 'Must return a Netaxept gateway');
        $this->assertEquals('abc123', $gateway->getMerchantId(), 'Merchant ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getPassword(), 'Password must match configuration');
    }

    public function testCreateNetBanx()
    {
        if(!class_exists('Omnipay\\NetBanx\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\NetBanx\\Gateway not found');
            return;
        }

        $config = array(
            'net_banx' => array(
                'accountNumber' => 'abc123',
                'storeId' => 'xyz987',
                'storePassword' => 'pqr567',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\NetBanx\Gateway $gateway */
        $gateway = $service->create('NetBanx');

        $this->assertInstanceOf('Omnipay\\NetBanx\\Gateway', $gateway, 'Must return a NetBanx gateway');
        $this->assertEquals('abc123', $gateway->getAccountNumber(), 'Account number must match configuration');
        $this->assertEquals('xyz987', $gateway->getStoreId(), 'Store ID must match configuration');
        $this->assertEquals('pqr567', $gateway->getStorePassword(), 'Store password must match configuration');
    }

    public function testCreatePayFast()
    {
        if(!class_exists('Omnipay\\PayFast\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\PayFast\\Gateway not found');
            return;
        }

        $config = array(
            'pay_fast' => array(
                'merchantId' => 'abc123',
                'merchantKey' => 'xyz987',
                'pdtKey' => 'pqr567',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\PayFast\Gateway $gateway */
        $gateway = $service->create('PayFast');

        $this->assertInstanceOf('Omnipay\\PayFast\\Gateway', $gateway, 'Must return a PayFast gateway');
        $this->assertEquals('abc123', $gateway->getMerchantId(), 'Merchant ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getMerchantKey(), 'Merchant key must match configuration');
        $this->assertEquals('pqr567', $gateway->getPdtKey(), 'PDT key must match configuration');
    }

    public function testCreatePayflow()
    {
        if(!class_exists('Omnipay\\Payflow\\ProGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\Payflow\\ProGateway not found');
            return;
        }

        $config = array(
            'payflow_pro' => array(
                'username' => 'abc123',
                'password' => 'xyz987',
                'vendor' => 'pqr567',
                'partner' => 'uvw543',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\Payflow\ProGateway $gateway */
        $gateway = $service->create('Payflow_Pro');

        $this->assertInstanceOf('Omnipay\\Payflow\\ProGateway', $gateway, 'Must return a Payflow Pro gateway');
        $this->assertEquals('abc123', $gateway->getUsername(), 'Username must match configuration');
        $this->assertEquals('xyz987', $gateway->getPassword(), 'Password must match configuration');
        $this->assertEquals('pqr567', $gateway->getVendor(), 'Vendor must match configuration');
        $this->assertEquals('uvw543', $gateway->getPartner(), 'Partner must match configuration');
    }

    public function testCreatePaymentExpressPxPay()
    {
        if(!class_exists('Omnipay\\PaymentExpress\\PxPayGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\PaymentExpress\\PxPayGateway not found');
            return;
        }

        $config = array(
            'payment_express_px_pay' => array(
                'username' => 'abc123',
                'password' => 'xyz987',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\PaymentExpress\PxPayGateway $gateway */
        $gateway = $service->create('PaymentExpress_PxPay');

        $this->assertInstanceOf('Omnipay\\PaymentExpress\\PxPayGateway', $gateway, 'Must return a PaymentExpress PxPay gateway');
        $this->assertEquals('abc123', $gateway->getUsername(), 'Username must match configuration');
        $this->assertEquals('xyz987', $gateway->getPassword(), 'Password must match configuration');
    }

    public function testCreatePaymentExpressPxPost()
    {
        if(!class_exists('Omnipay\\PaymentExpress\\PxPostGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\PaymentExpress\\PxPostGateway not found');
            return;
        }

        $config = array(
            'payment_express_px_post' => array(
                'username' => 'abc123',
                'password' => 'xyz987',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\PaymentExpress\PxPostGateway $gateway */
        $gateway = $service->create('PaymentExpress_PxPost');

        $this->assertInstanceOf('Omnipay\\PaymentExpress\\PxPostGateway', $gateway, 'Must return a PaymentExpress PxPost gateway');
        $this->assertEquals('abc123', $gateway->getUsername(), 'Username must match configuration');
        $this->assertEquals('xyz987', $gateway->getPassword(), 'Password must match configuration');
    }

    public function testCreatePayPalPro()
    {
        if(!class_exists('Omnipay\\PayPal\\ProGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\PayPal\\ProGateway not found');
            return;
        }

        $config = array(
            'pay_pal_pro' => array(
                'username' => 'abc123',
                'password' => 'xyz987',
                'signature' => 'pqr567',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\PayPal\ProGateway $gateway */
        $gateway = $service->create('PayPal_Pro');

        $this->assertInstanceOf('Omnipay\\PayPal\\ProGateway', $gateway, 'Must return a PayPal Pro gateway');
        $this->assertEquals('abc123', $gateway->getUsername(), 'Username must match configuration');
        $this->assertEquals('xyz987', $gateway->getPassword(), 'Password must match configuration');
        $this->assertEquals('pqr567', $gateway->getSignature(), 'Signature must match configuration');
    }

    public function testCreatePayPalExpress()
    {
        if(!class_exists('Omnipay\\PayPal\\ExpressGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\PayPal\\ExpressGateway not found');
            return;
        }

        $config = array(
            'pay_pal_express' => array(
                'username' => 'abc123',
                'password' => 'xyz987',
                'signature' => 'pqr567',
                'solutionType' => array('foo', 'bar'),
                'landingPage' => array('baz'),
                'headerImageUrl' => 'uvw543',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\PayPal\ExpressGateway $gateway */
        $gateway = $service->create('PayPal_Express');

        $this->assertInstanceOf('Omnipay\\PayPal\\ExpressGateway', $gateway, 'Must return a PayPal Express gateway');
        $this->assertEquals('abc123', $gateway->getUsername(), 'Username must match configuration');
        $this->assertEquals('xyz987', $gateway->getPassword(), 'Password must match configuration');
        $this->assertEquals('pqr567', $gateway->getSignature(), 'Signature must match configuration');
        $this->assertEquals(array('foo', 'bar'), $gateway->getSolutionType(), 'Solution type must match configuration');
        $this->assertEquals(array('baz'), $gateway->getLandingPage(), 'Landing page must match configuration');
        $this->assertEquals('uvw543', $gateway->getHeaderImageUrl(), 'Header image URL must match configuration');
    }

    public function testCreatePin()
    {
        if(!class_exists('Omnipay\\Pin\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\Pin\\Gateway not found');
            return;
        }

        $config = array(
            'pin' => array(
                'secretKey' => 'abc123'
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\Pin\Gateway $gateway */
        $gateway = $service->create('Pin');

        $this->assertInstanceOf('Omnipay\\Pin\\Gateway', $gateway, 'Must return a Pin gateway');
        $this->assertEquals('abc123', $gateway->getSecretKey(), 'API key must match configuration');
    }

    public function testCreateSagePayDirect()
    {
        if(!class_exists('Omnipay\\SagePay\\DirectGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\SagePay\\DirectGateway not found');
            return;
        }

        $config = array(
            'sage_pay_direct' => array(
                'vendor' => 'abc123'
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\SagePay\DirectGateway $gateway */
        $gateway = $service->create('SagePay_Direct');

        $this->assertInstanceOf('Omnipay\\SagePay\\DirectGateway', $gateway, 'Must return a SagePay Direct gateway');
        $this->assertEquals('abc123', $gateway->getVendor(), 'Vendor must match configuration');
    }

    public function testCreateSagePayServer()
    {
        if(!class_exists('Omnipay\\SagePay\\ServerGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\SagePay\\ServerGateway not found');
            return;
        }

        $config = array(
            'sage_pay_server' => array(
                'vendor' => 'abc123'
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\SagePay\ServerGateway $gateway */
        $gateway = $service->create('SagePay_Server');

        $this->assertInstanceOf('Omnipay\\SagePay\\ServerGateway', $gateway, 'Must return a SagePay Server gateway');
        $this->assertEquals('abc123', $gateway->getVendor(), 'Vendor must match configuration');
    }

    public function testCreateSecurePayDirectPost()
    {
        if(!class_exists('Omnipay\\SecurePay\\DirectPostGateway')) {
            $this->markTestSkipped('Gateway Omnipay\\SecurePay\\DirectPostGateway not found');
            return;
        }

        $config = array(
            'secure_pay_direct_post' => array(
                'merchantId' => 'abc123',
                'transactionPassword' => 'xyz987',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\SecurePay\DirectPostGateway $gateway */
        $gateway = $service->create('SecurePay_DirectPost');

        $this->assertInstanceOf('Omnipay\\SecurePay\\DirectPostGateway', $gateway, 'Must return a SecurePay Direct Post gateway');
        $this->assertEquals('abc123', $gateway->getMerchantId(), 'Merchant ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getTransactionPassword(), 'Transaction password must match configuration');
    }

    /**
     * @requires function
     */
    public function testCreateStripe()
    {
        if(!class_exists('Omnipay\\Stripe\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\Stripe\\Gateway not found');
            return;
        }

        $config = array(
            'stripe' => array(
                'apiKey' => 'abc123'
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\Stripe\Gateway $gateway */
        $gateway = $service->create('Stripe');

        $this->assertInstanceOf('Omnipay\\Stripe\\Gateway', $gateway, 'Must return a Stripe gateway');
        $this->assertEquals('abc123', $gateway->getApiKey(), 'API key must match configuration');
    }

    public function testCreateTwoCheckout()
    {
        if(!class_exists('Omnipay\\TwoCheckout\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\TwoCheckout\\Gateway not found');
            return;
        }

        $config = array(
            'two_checkout' => array(
                'accountNumber' => 'abc123',
                'secretWord' => 'xyz987',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\TwoCheckout\Gateway $gateway */
        $gateway = $service->create('TwoCheckout');

        $this->assertInstanceOf('Omnipay\\TwoCheckout\\Gateway', $gateway, 'Must return a TwoCheckout gateway');
        $this->assertEquals('abc123', $gateway->getAccountNumber(), 'Account number must match configuration');
        $this->assertEquals('xyz987', $gateway->getSecretWord(), 'Secret word must match configuration');
    }

    public function testCreateWorldPay()
    {
        if(!class_exists('Omnipay\\WorldPay\\Gateway')) {
            $this->markTestSkipped('Gateway Omnipay\\WorldPay\\Gateway not found');
            return;
        }

        $config = array(
            'world_pay' => array(
                'installationId' => 'abc123',
                'secretWord' => 'xyz987',
                'callbackPassword' => 'pqr567',
            )
        );

        $service = new Omnipay($config);

        /** @var \Omnipay\WorldPay\Gateway $gateway */
        $gateway = $service->create('WorldPay');

        $this->assertInstanceOf('Omnipay\\WorldPay\\Gateway', $gateway, 'Must return a WorldPay gateway');
        $this->assertEquals('abc123', $gateway->getInstallationId(), 'Installation ID must match configuration');
        $this->assertEquals('xyz987', $gateway->getSecretWord(), 'Secret word must match configuration');
        $this->assertEquals('pqr567', $gateway->getCallbackPassword(), 'Callback password must match configuration');
    }
}
