<?php

class User
{
    const ACCESS_READ = 1;
    const ACCESS_CREATE = 2;
    const ACCESS_UPDATE = 4;
    const ACCESS_DELETE = 8;
}

if (User::ACCESS_UPDATE) {
    echo 'To edit';
}