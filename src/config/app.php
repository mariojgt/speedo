<?php

return [
    // Normaly is the folder nama, this will be use create a routes name ignoring the first part of the url
    'base_route'     => 'speedo',
    'base_view_path' => realpath('src/App/views/'),    // Normaly is the folder name You may need to use getcwd().'/src/App/Views' if some linux servers
    'url'            => 'http://localhost/speedo/',   // Please change this to the current website up to the root folder
];
