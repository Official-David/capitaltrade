<?php
  
namespace App\Enums;
 
enum UserGender:string {
    case Male = 'male';
    case Female = 'female';
    case Unknown = 'prefer not to say';
}