<?php

use Aws\S3\S3Client;

class S3Controller {

    public $bucket      ;
    public $accessKeyId ;
    public $policy      = false;
    public $signature   = false;

    protected $secret ;

    public function __construct() {
        $aws_config = Config::get('packages/aws/aws-sdk-php-laravel/config');
        $this->accessKeyId = $aws_config['key'];
        $this->secret = $aws_config['secret'];
        $this->bucket = $aws_config['bucket'];
        $this->setPolicyAndSignature();
    }

    protected function setPolicyAndSignature() {

        // prepare policy
        $this->policy = base64_encode(json_encode(array(
                "expiration" => date('Y-m-d\TH:i:s.000\Z', strtotime('+1 day')),
                "conditions" => array(
                        array("bucket" => $this->bucket),
                        array("acl" => "public-read"),
                        array("success_action_status" => "201"),
                        array("starts-with", '$key', "files/"),
                        array("starts-with", '$Content-Type', ""),
                        array("starts-with", '$name', ""),
                        array("starts-with", '$Filename', "files/"),
                )
        )));

        // sign policy
        $this->signature = base64_encode(hash_hmac("sha1", $this->policy, $this->secret, true));

        mail('your@email.com', 'Your Name', "S- ".$this->signature." -P- ".$this->policy);

        return true;
    }
}
