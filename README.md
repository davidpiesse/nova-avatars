# Nova Avatars

Additional avatar field options for when Gravatar is not what you want!

## Included Avatars
* Identicons

## Upcoming Avatars
* Adorable.io (Cute Monsters)
* UI Avatars (Initials)

## Installation
```
composer require davidpiesse/nova-avatars
```

## Usage
This field works EXACTLY the same as the built in Gravatar field - but for Identicons.

In your Nova Resource (such as User)
```php
use Davidpiesse\NovaAvatars\Identicon;

public function fields(Request $request)
    {
        return [
            ... 
            Identicon::make(),
            ...
        ]
    }
```

```php
// Using the "email" column...
Identicon::make()

// Using the "email_address" column...
Identicon::make('Avatar', 'email_address')
```

