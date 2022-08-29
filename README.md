# Instagram Basic API For PHP

# Example

You can find usage example

```PHP
require 'instagram.php';

$instagram = new Instagram();

$userInfo = $instagram->getUserInfo('svnmez');

echo $userInfo['data']['user']['id'];
```