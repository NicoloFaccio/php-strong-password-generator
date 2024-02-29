<?php
  function createdPassword($lunghezzaPassword, $letters, $numbers, $symbols, $AgreedDuplication) {
    $newPassword= '';
    $AllSymobols = $letters . $numbers . $symbols;

    while(strlen($newPassword) < $lunghezzaPassword ) {
        $indexLetters = rand(0, strlen($AllSymobols) - 1);

        if($AgreedDuplication == true || !str_contains($newPassword, $AllSymobols[$indexLetters])){
            $newPassword .= $AllSymobols[$indexLetters]; 
        };
    }

    return $newPassword;
  }