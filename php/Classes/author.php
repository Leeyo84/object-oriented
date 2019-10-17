<?php
namespace DeepDiveCoders\ObjectOrientation;

require_once ("autoload.php");
require_once (dirname(__DIR__)) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 *  h1 short description of what the class does.
 *
 * p more detailed description, a couple of sentences.
 *
 * @author Leonela Gutierrez <Leonele_Gutierrez@hotmail.com>
 */
class Author implements \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;
	/**
	 * id for this Author; this is the primary key
	 * @var Uuid $AuthorId
	*/
	private $AuthorId;
	/**
	 * this is the activation token for the Author
	 * @var Uuid $AuthorActivationToken
	 */
	private $AuthorActivationToken;
	/**
	 * this is the Authors avatar url
	 * @var AuthorAvatarUrl
	 */
	private $AuthorAvatarUrl;
	/**
	 * this is the Author email
	 * @var AuthorEmail
	 */
	private $AuthorEmail;
	/**
	 * this is the Hash for the Author
	 * @var $AuthorHash
	 */
	private $AuthorHash;
	/**
	 * this is the Authors username
	 * @var $AuthorUsername
	 */
	private $AuthorUsername;

	/**
	 * constructor for this Author
	 *
	 * @param string|Uuid $newAuthorId id of this Author or null if a new Author
	 * @param string|Uuid $newAuthorActivationToken activation token for new Author
	 * @param string|Uuid $newAuthorAvatarUrl Avatar URL for the Author
	 * @param string|Uuid $AuthorEmail
	 */
}
?>