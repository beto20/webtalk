<?php

    $contraseña = 'hola';
    echo $contraseña.'<br/>';
    echo md5($contraseña).'<br/>';
    echo sha1($contraseña);


    //hash(algo, string);
    foreach (hash_algos() as $algo) {
        echo $algo.' = '.hash($algo,$contraseña).'<br/>';
    }

    //password_hash
    $hash1 = password_hash($contraseña, PASSWORD_ARGON2I);
    $hash2 = password_hash($contraseña, PASSWORD_DEFAULT,['cost' => 10]);

    echo $hash1.'<br/>';
    echo $hash2.'<br/>';

    if (password_verify($contraseña, $hash1)) {
        echo 'Correcto 1 <br/>';
    }
    if (password_verify($contraseña, $hash2)) {
        echo 'Correcto 2';
    }

    
?>