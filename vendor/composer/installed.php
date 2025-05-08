<?php return array(
    'root' => array(
        'name' => 'osman/wp-plugin-structure',
        'pretty_version' => 'dev-master',
        'version' => 'dev-master',
        'reference' => '4d87067c9596de1722fc45a5958c1bee4786c59e',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'league/container' => array(
            'pretty_version' => '4.2.4',
            'version' => '4.2.4.0',
            'reference' => '7ea728b013b9a156c409c6f0fc3624071b742dec',
            'type' => 'library',
            'install_path' => __DIR__ . '/../league/container',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'orno/di' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '~2.0',
            ),
        ),
        'osman/wp-plugin-structure' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '4d87067c9596de1722fc45a5958c1bee4786c59e',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/container' => array(
            'pretty_version' => '2.0.2',
            'version' => '2.0.2.0',
            'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/container',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/container-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '^1.0',
            ),
        ),
    ),
);
