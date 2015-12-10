#TikaBundle

A bundle for [Tika wrapper](https://github.com/Funstaff/Tika)

Installation
------------

To install FunstaffTikaBundle with Composer just run:

```bash
$ php composer.phar require funstaff/tika-bundle dev-master
```

Usage
-----

config.yml
```yml
funstaff_tika:
    tika_path:  /path/to/tika.jar   # required
    java_path:  ~                   # default: null
    metadata_class: ~               # default: Funstaff\Tika\Metadata
    output_format: ~                # default: xml
    metadata_only: ~                # default: false
    output_encoding: ~              # default: UTF-8
    logging: ~                      # default: prod = false, dev = true
```

On controller:
```php
$wrapper = $this->get('funstaff_tika.wrapper')
    ->addDocument(new Document('doc.pdf', $funstaffVendor.'/Tests/File/test.pdf'))
    ->execute();

/* Get Document */
$document = $wrapper->getDocument('doc.pdf');

/* Get Metadata */
$metadata = $document->getMetadata();
```

Credits
-------
To all users that gave feedback and committed code [https://github.com/Funstaff/TikaBundle](https://github.com/Funstaff/TikaBundle).

© Bertrand Zuchuat - Funstaff