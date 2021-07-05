<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Encript {
 
 
    const PBKDF2_HASH_ALGORITHM = 'sha256';
    const PBKDF2_ITERATIONS = 1000;
    const PBKDF2_SALT_BYTE_SIZE = 24;
    const PBKDF2_HASH_BYTE_SIZE = 24;
   
    const HASH_SECTIONS = 4;
    const HASH_ALGORITHM_INDEX = 0;
    const HASH_ITERATION_INDEX = 1;
    const HASH_SALT_INDEX = 2;
    const HASH_PBKDF2_INDEX = 3;
 
    function create_hash($string)
    {
        $key    = "MAL_979805"; //key to encrypt and decrypts.
        $result = '';
        $test   = "";
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)+ord($keychar));

            $test[$char]= ord($char)+ord($keychar);
            $result.=$char;
        }
        return urlencode(base64_encode($result));
    }
 
    function validate_password($password, $string)
    {
        $key = "MAL_979805"; //key to encrypt and decrypts.
            $result = '';
            $string = base64_decode(urldecode($string));
            for($i=0; $i<strlen($string); $i++) {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key))-1, 1);
                $char = chr(ord($char)-ord($keychar));
                $result.=$char;
            }
            if($password == $result){
                $return = true;
            }else{
                $return = false;
            }
        return $return;

        // $params = explode(":", $correct_hash);
        // if(count($params) < self::HASH_SECTIONS)
        //    return false;
        // $pbkdf2 = base64_decode($params[self::HASH_PBKDF2_INDEX]);
        // return $this->slow_equals(
        //     $pbkdf2,
        //     $this->pbkdf2(
        //         $params[self::HASH_ALGORITHM_INDEX],
        //         $password,
        //         $params[self::HASH_SALT_INDEX],
        //         (int)$params[self::HASH_ITERATION_INDEX],
        //         strlen($pbkdf2),
        //         true
        //     )
        // );
    }
   
}