<?php 
session_start();

$host="localhost";
$user="root";
$pass="";
$db="schemabuilder";
$conn=mysqli_connect($host, $user, $pass, $db);

class Crypt{
    private $password;
    /**
     * Undocumented function
     *
     * @param string $passkey
     */
    function __construct($passkey="My current passkey is 100% safe!")
    {
        $this->password=$passkey;
    }
    /**
     * Undocumented function
     *
     * @param [string] $plaintext
     * @return void
     */
    function enc($plaintext) {    //Encrypt
        $method="AES-256-CBC";
        $key = hash('sha256', $this->password, true);
        $iv = openssl_random_pseudo_bytes(16);
        $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext, $key, true);
        $ret= $iv . $hash . $ciphertext;
        return base64_encode($ret);
    }
    /**
     * Undocumented function
     *
     * @param [string] $ivHashCiphertext
     * @return void
     */
    function dec($ivHashCiphertext) {  //Decrypt
        $ivHashCiphertext = base64_decode($ivHashCiphertext);
        $method="AES-256-CBC";
        $iv = substr($ivHashCiphertext, 0, 16);
        $hash = substr($ivHashCiphertext, 16, 32);
        $ciphertext = substr($ivHashCiphertext, 48);
        $key = hash('sha256', $this->password, true);
        if (hash_hmac('sha256', $ciphertext, $key, true) !== $hash) return null;
        return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
    }
}

/* usage of Crypt: 
$crp=new Crypt();
$encStr=$crp->enc("Exempelsträng");
$decStr=$crp->dec($encStr);
*/

?>