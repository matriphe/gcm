# Simple GCM Push Notification

Send GCM Push notification using Guzzle. Make sure you have the GCM Api key and could get Device ID and generate GCM ID.

## Compatibility

Works with Laravel 5.0.

## Installation

Open `composer.json` and require this line below.
```json
"matriphe/gcm": "dev-master"
```
Or you can run this command from your project directory.
```bash
composer require "matriphe/gcm:dev-master"
```

### Laravel Installation

Open the `config/app.php` and add this line in `providers` section.
```php
'Matriphe\Gcm\GcmServiceProvider'
```
Still in `config/app.php`, add this line in `alias` section.
```php
'Gcm' => 'Matriphe\Gcm\GcmFacade'
```

## Publish Configuration

To control the configuration, you have to *publish* the configuration file.
```bash
php artisan vendor:publish
```
After running this command, there will be `config/gcm.php` and `resources/views/vendor/gcm/form.blade.php` files.

## Usage

Just use the `push($device_id, $gcm_id, $subject, $message, $extras = [])` function and it will push the message to GCM.

The return of the function is **object**.

### Example
```php
$device_id = '30C89D80C48E96AE';
$gcm_id = 'APA91bGfw8y8DG6CL1BOraVDJyYXUU82rwzbJjnR5PppIcSE7HYgQSvxiSHMJN7zYiCC9CLGNHLiWMxUD22JrlSmvMkaJiUgCsMOvHk0BPeWmvGJu4oHAa1KUm9D5ngdcFNNUwJQ7ttB6VW0F575rhQ2ow56ACM1Yg';
$subject = 'Test Push Subject';
$message = 'This is the message that will be shown in notification.';
$extras = [
    'id' => 21,
    'user' => 'motherfather',
];
Gcm::push($device_id, $gcm_id, $subject, $message, $extras = [])
```
### Output
```object
stdClass Object
(
    [multicast_id] => 6100993858981303466
    [success] => 1
    [failure] => 0
    [canonical_ids] => 0
    [results] => Array
        (
            [0] => stdClass Object
                (
                    [message_id] => 0:1434034071184625%9747e1a6f9fd7ecd
                )

        )

)
```
## Test

It has routes, so you can go to `/matriphe/gcm`on your URL and try to send the GCM notification.
