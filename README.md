# Nova Avatars
Additional avatar field options for when Gravatar is not what you want!

![Identicon](https://res.cloudinary.com/davidpiesse/image/upload/v1535492012/Screen_Shot_2018-08-28_at_22.32.44_sijtja.png)

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

```php
// Using the "email" column...
Initials::make()

// Using the "email_address" column...
Initials::make('Avatar', 'email_address')
```

You can publish config
```php
php artisan vendor:publish --provider="Laravolt\Avatar\ServiceProvider"
```
