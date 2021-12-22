# Symfony hashids bundle

This bundle integrates [hashids.org](https://hashids.org) as a service  
This repository was forked, updated, and heavily edited from the original [here](https://github.com/neoshadybeat/hashidsBundle)

## Installation

### Composer

```bash
composer require gal-digital-gmbh/hashids-bundle
```

### Enable the bundle

```php
<?php
// config/bundles.php

return [
    GalDigitalGmbh\HashidsBundle\HashidsBundle::class => ['all' => true],
    // ...
}
```

## Configuration

```yaml
# These configs are optional
hashids:
  salt: 'randomsalt'
  min_hash_length: 10
  alphabet: 'abcd...'
```

## Service

Use the service `GalDigitalGmbh\HashidsBundle\Service\HashService` for simpler one-to-one ID conversions,
but you can also use `Hashids\Hashids` as a service directly.

## Twig extension

### Available filters

| Name                   | Description                      |
| ---------------------- | -------------------------------- |
| hashid_encode          | Encodes one ID to string         |
| hashid_decode          | Decodes a string to one ID       |
| hashid_encode_multiple | Encodes multiple IDs to string   |
| hashid_decode_multiple | Decodes a string to multiple IDs |

### Usage example

```twig
<a href="{{- path('user_profile', {
  hashid: user.id|hashid_encode,
}) -}}">View Profile</a>
```

## Original license

> This repository was forked, updated, and heavily edited from the original [here](https://github.com/neoshadybeat/hashidsBundle)

```text
Copyright (c) 2015 neoshadybeat[at]gmail.com

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted, provided that the above
copyright notice and this permission notice appear in all copies.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
```
