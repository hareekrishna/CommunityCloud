<?php
// Bucket Name
$bucket="communitycloud1";
if (!class_exists('S3'))require_once('library/S3.php');

//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAI26EDFLOQPYCL26A');
if (!defined('awsSecretKey')) define('awsSecretKey', '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');


try
{$s3 = new S3(awsAccessKey, awsSecretKey); 
   $s3->putBucket($bucket, S3::ACL_PUBLIC_READ);
   $s3->listBuckets();

}
catch(Exception $e)
{
    echo $e->getMessage();
 }
?>