<?php
namespace DeepDiveCoders\ObjectOrientation;

require_once ("autoload.php");
require_once (dirname(__DIR__)) . "/vendor/autoload.php");

use http\Exception\UnexpectedValueException;use Ramsey\Uuid\Uuid;

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
	 * accessor method for author id
	 *
	 * @return int value of the author id
	 **/
	public function getAuthorId(){
		return ($this->authorId);
	}

	/**
	 * mutator method for author id
	 *
	 * @param int $newAuthoId new value of author id
	 * @Throws UnexpectedValueException if $newAuthorId is not an integer
	 **/
	public function setAuthorId($newAuthorId) {
		$newAuthorId = filter_var($newAuthorId,FILTER_VALIDATE_INT);
		if($newAuthorId === false) {
			throw (new UnexpectedValueException("profile id is not a valid integer"));
		}
		// convert and store the profile id
		$this->authorId = intval($newAuthorId);
	}
	/**
	 * mutator method for author activation token
	 *
	 * @param int $newActivationToken new value of activation token
	 * @Throws UnexpectedValueException if $newActivationToken is not an integer
	 **/
	public function setActivationToken($newActivationToken) {
		$newActivationToken = filter_var($newActivationToken,FILTER_VALIDATE_INT);
		if($newActivationToken === false) {
			throw (new UnexpectedValueException("activation token is not valid"));
		}
		// convert and store the activationToken
		$this->activationToken = intval($newActivationToken);
	}
	/**
	 * mutator method for author avatar url
	 *
	 * @param string $newAuthorEmail new value of email
	 * @Throws UnexpectedValueException if $newAuthorEmail is not valid
	 **/
	public function setAuthorEmail($newAuthorEmail) {
		$newAuthorEmail = filter_var($newAuthorEmail,FILTER_SANITIZE_EMAIL);
		if($newAuthorEmail === false) {
			throw (new UnexpectedValueException("email is not a valid string"));
		}
		//  store the author email
		$this->AuthorEmail = intval($newAuthorEmail);
	}
	/**
	 * mutator method for author hash
	 *
	 * @param int $newAuthorHash new value of author hash
	 * @Throws UnexpectedValueException if $newAuthorHash is not an integer
	 **/
	public function setAuthorHash($newAuthorHash) {
		$newAuthorHash= filter_var($newAuthorHash,FILTER_VALIDATE_INT;
		if($newAuthorHash === false) {
			throw (new UnexpectedValueException("author hash is not valid"));
		}
		// convert and store the author hash
		$this->authorHash = intval($newAuthorHash);
	}
	/**
	 * mutator method for author username
	 *
	 * @param string $newAuthorEmailUsername new value of username
	 * @Throws UnexpectedValueException if $newAuthorUsername is not valid
	 **/
	public function setAuthorUsername($newAuthorUserName) {
		$newAuthorUserName = filter_var($newAuthorUserName,FILTER_SANITIZE_STRING);
		if($newAuthorUserName=== false) {
			throw (new UnexpectedValueException("username is not a valid string"));
		}
		//  store the author username
		$this->AuthorUsername = intval($newAuthorUserName);
	}
}
?>