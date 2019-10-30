<?php
use Leeyo84\ObjectOriented\Author;
use Ramsey\Uuid\Uuid;
//load the author class
require_once("../Classes/autoload.php");



// use the constructor to create a new author
$author = new Author('e304052d-0690-4e79-b330-f7e25df657c5',
	'01234567890123456789012345678912',
	'http://google.com',
	'newAuthor1@yay.com',
	'b7652be5587ad2549996c4e69578412a2458909cc844f70fd7a5df81c471ce80fd02cc109606d1cc0bf0611ee3daef21c',
	'Test Username');


echo($author->getAuthorId());
echo($author->getAuthorActivationToken());
echo($author->getAuthorAvatarUrl());
echo($author->getAuthorEmail());
echo($author->getAuthorHash());
echo($author->getAuthorUsername());



