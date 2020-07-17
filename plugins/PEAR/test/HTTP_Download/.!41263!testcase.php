<?php

require_once 'PHPUnit.php';
require_once 'HTTP/Download.php';
require_once 'HTTP/Request.php';

class HTTP_DownloadTest extends PHPUnit_TestCase {

    function HTTP_DownloadTest($name)
    {
        $this->PHPUnit_TestCase($name);
    } 

    function setUp()
    {
        $this->testScript = 'http://local/www/mike/pear/HTTP_Download/tests/send.php';
    } 

    function tearDown()
    {
    } 

    function testHTTP_Download()
    {
        $this->assertTrue(is_a($h = &new HTTP_Download, 'HTTP_Download'));
        $this->assertTrue(is_a($h->HTTP, 'HTTP_Header'));
        unset($h);
    } 

    function testsetFile()
    {
        $h = &new HTTP_Download;
        $this->assertFalse(PEAR::isError($h->setFile('data.txt')), '$h->setFile("data.txt")');
        $this->assertEquals(realpath('data.txt'), $h->file, '$h->file == "data.txt');
        $this->assertTrue(PEAR::isError($h->setFile('nonexistant', false)), '$h->setFile("nonexistant")');
        unset($h);
    } 

    function testsetData()
    {
        $h = &new HTTP_Download;
        $this->assertTrue(null === $h->setData('foo'), 'null === $h->setData("foo")');
        $this->assertEquals('foo', $h->data, '$h->data == "foo"');
        unset($h);
    } 

    function testsetResource()
    {
        $h = &new HTTP_Download;
        $this->assertFalse(PEAR::isError($h->setResource($f = fopen('data.txt', 'r'))), '$h->setResource(fopen("data.txt","r"))');
        $this->assertEquals($f, $h->handle, '$h->handle == $f');
        fclose($f); $f = -1;
        $this->assertTrue(PEAR::isError($h->setResource($f)), '$h->setResource($f = -1)');
        unset($h);
    } 

    function testsetGzip()
    {
        $h = &new HTTP_Download;
        $this->assertFalse(PEAR::isError($h->setGzip(false)), '$h->setGzip(false)');
        $this->assertFalse($h->gzip, '$h->gzip');
        if (PEAR::loadExtension('zlib')) {
            $this->assertFalse(PEAR::isError($h->setGzip(true)), '$h->setGzip(true) without ext/zlib');
            $this->assertTrue($h->gzip, '$h->gzip');
        } else {
            $this->assertTrue(PEAR::isError($h->setGzip(true)), '$h->setGzip(true) with ext/zlib');
            $this->assertFalse($h->gzip, '$h->gzip');
        }
        unset($h);
    } 

    function testsetContentType()
    {
        $h = &new HTTP_Download;
        $this->assertFalse(PEAR::isError($h->setContentType('text/html;charset=iso-8859-1')), '$h->setContentType("text/html;charset=iso-8859-1")');
