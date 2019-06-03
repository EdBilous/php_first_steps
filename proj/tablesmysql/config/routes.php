<?php

return [
    'db/item/([a-z_]+)/([a-z_]+)/([a-z_]+)' => 'db/item/$1/$2/$3',
    'db/column/([a-z_]+)/([a-z_]+)' => 'db/column/$1/$2',
    'db/database/([a-z_]+)/([a-z_]+)' => 'db/database/$1/$2',
    'db/database/([a-z_]+)' => 'db/database/$1',
    'db/table' => 'db/table',
    'db/qwery/([a-z_]+)/([a-z_]+)' => 'db/qwery/$1/$2',
    'db/insert/([a-z_]+)/([a-z_]+)' => 'db/insert/$1/$2',
    'user/register/([a-z_]+)' => 'user/register/$1',
    'user/login/([a-z_]+)' => 'user/login/$1',
    '' => 'site/index'
];
