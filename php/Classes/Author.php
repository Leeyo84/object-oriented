<?php
namespace Leeyo84\ObjectOriented;

require_once("autoload.php");

require_once (dirname(__DIR__)) . "/vendor/autoload.php";

use http\Url;
use Ramsey\Uuid\Uuid;

/**
 *  gives author access to make changes
 *
 * Author will be able to make changes to is author profile, including author id, avatar, email and username.
 *
 * @author Leonela Gutierrez <Leonele_Gutierrez@hotmail.com>
 */
class Author implements \JsonSerializable {
	use ValidateUuid;
	/**
	 * id for this Author; this is the primary key
	 * @var Uuid $AuthorId
	 */
	private $AuthorId;
	/**
	 * this is the activation token for the Author
	 * @var string $AuthorActivationToken
	 */
	private $AuthorActivationToken;
	/**
	 * this is the Authors avatar url
	 * @var string $AuthorAvatarUrl
	 */
	private $AuthorAvatarUrl;
	/**
	 * this is the Author email
	 * @var string $AuthorEmail
	 */
	private $AuthorEmail;
	/**
	 * this is the Hash for the Author
	 * @var string $AuthorHash
	 */
	private $AuthorHash;
	/**
	 * this is the Authors username
	 * @var string $AuthorUsername
	 */
	private $AuthorUsername;

	/**
	 * constructor for this author
	 *
	 * @param string|Uuid $newAuthorId id of this Author or null if a new Author
	 * @param string $newAuthorActivationToken activation token
	 * @param string $newAuthorAvatarUrl
	 * @param string $newAuthorEmail
	 * @param string $newAuthorHash
	 * @param string $newAuthorUsername
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct($newAuthorId, $newAuthorActivationToken,  $newAuthorAvatarUrl, $newAuthorEmail, $newAuthorHash, $newAuthorUsername) {
		try {
			$this->setAuthorId($newAuthorId);
			$this->setAuthorActivationToken($newAuthorActivationToken);
			$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
			$this->setAuthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorUsername($newAuthorUsername);
		}
			//determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
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
	 * accessor method for activation token
	 *
	 * @return int value of the activation token
	 **/
	public function getActivationToken(){
		return ($this->activationToken());
	}
	/**
	 * mutator method for author activation token
	 *
	 * @param int $newActivationToken new value of activation token
	 * @Throws UnexpectedValueException if $newActivationToken is not an integer
	 **/
	public function setAuthorActivationToken($newAuthorActivationToken) {
		$newAuthorActivationToken = filter_var($newAuthorActivationToken,FILTER_VALIDATE_INT);
		if($newAuthorActivationToken === false) {
			throw (new UnexpectedValueException("activation token is not valid"));
		}
		// convert and store the activationToken
		$this->authorActivationToken = intval($newAuthorActivationToken);
	}
	/**
	 * accessor method for avatar url
	 *
	 * @return int value of the avatar url
	 **/
	public function getAvatarUrl(){
		return ($this->avatarUrl());
	}
	/**
	 * mutator for author avatar url
	 *
	 * @param string $newAuthorAvatarUrl
	 * @Throws UnexpectedValueException if $newAuthorAvatarUrl is not valid
	 */
	public function setAuthorAvatarUrl($newAuthorAvatarUrl) {
		$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl,FILTER_VALIDATE_INT);
		if($newAuthorAvatarUrl === false) {
			throw (new UnexpectedValueException("avatar url is not valid"));
		}
		// convert and store the activationToken
		$this->AuthorAvatarUrl = intval($newAuthorAvatarUrl);
	}
	/**
	 * accessor method for author email
	 *
	 * @return int value of the author email
	 **/
	public function getAuthorEmail(){
		return ($this->authorEmail());
	}
	/**
	 * mutator method for author email
	 *
	 * @param string $newAuthorEmail new value of email
	 * @Throws UnexpectedValueException if $newAuthorEmail is not valid
	 **/
	public function setAuthorEmail($newAuthorEmail) {
		$newAuthorEmail = filter_var($newAuthorEmail,FILTER_SANITIZE_EMAIL);
		if($newAuthorEmail === false) {
			throw (new UnexpectedValueException("email is not a valid email"));
		}
		//  store the author email
		$this->authorEmail = intval($newAuthorEmail);
	}
	/**
	 * accessor method for author hash
	 *
	 * @return int value of the author hash
	 **/
	public function getAuthorHash(){
		return ($this->authorHash());
	}
	/**
	 * mutator method for author hash
	 *
	 * @param int $newAuthorHash new value of author hash
	 * @Throws UnexpectedValueException if $newAuthorHash is not an integer
	 **/
	public function setAuthorHash($newAuthorHash) {
		$newAuthorHash= filter_var($newAuthorHash,FILTER_VALIDATE_INT);
		if($newAuthorHash === false) {
			throw (new UnexpectedValueException("author hash is not valid"));
		}
		// convert and store the author hash
		$this->authorHash = intval($newAuthorHash);
	}
	/**
	 * accessor method for author username
	 *
	 * @return int value of the author username
	 **/
	public function getAuthorUsername(){
		return ($this->authorUsername());
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

	/**
	 * Specify data which should be serialized to JSON
	 * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 * @since 5.4.0
	 */
	public function jsonSerialize() {
		// TODO: Implement jsonSerialize() method.
	}
}
?>