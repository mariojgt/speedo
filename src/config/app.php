<?php

return [
    // Using the base_route you can protect you files from direct access
    'base_route'     => 'speedo',
    'base_view_path' => realpath('src/App/views/'),    // Normaly is the folder name You may need to use getcwd().'/src/App/Views' if some linux servers
    'url'            => 'http://localhost/speedo/',   // Please change this to the current website up to the root folder
];
