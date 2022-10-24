# php-sdk
### Usage

#### I- Installation

```bash
composer require spare-technologies/php-sdk "^1.1"
``` 

Include these files in your application and do this at the top of your file:

```php
require __DIR__ . '/vendor/autoload.php';
```
#### II- To Generate ECC key pair

```php
use Helpers\Crypto\SpCrypto;

public class MyClass {
    $keys = SpCrypto::GenerateKeyPair();
    
    echo "Private key \n" . nl2br($keys->getPrivateKey());
    echo "\n\n";
    echo "Public key \n" . nl2br($keys->getPublicKey())
}
```

#### III- To create your first payment request

```php
use Helpers\Security\DigitalSignature\EccSignatureManager;
use Helpers\Serialization\SpSerializer;
use Payment\Client\SpPaymentClient;

public class MyClass {

    // Business ECC private key
    public static string $privateKey = "";

    // Spare ECC public key
    public static string $serverPublicKey = "";

    public static function createPayment(): void {

        // Configure client
        $clientOptions = new SpPaymentClientOptions(
        "https://payment.tryspare.com",
        "Your app id",
        "Your API key"
        );

        $client = new SpPaymentClient($clientOptions);

        // Initialize payment
        $paymentRequest = new SpPaymentRequest();
        $paymentRequest->setAmount(10.0);
        $paymentRequest->setDescription("Test payment");
        $paymentRequest->setOrderId("8jwaQ");

        // Sign the payment 
        $signature = EccSignatureManager::Sign($paymentRequest->toJonsString(), $privateKey);

        // Create payment
        $paymentResponse = $this->paymentClient->CreateDomesticPayment($paymentRequest, $signature);

        // To verify signature of the created payment 
        if (EccSignatureManager::Verify($serverPublicKey, $paymentResponse->getPayment()->toJonsString(), createPayment->getSignature())) {
            // signature verified
        }
    }
}
```