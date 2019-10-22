<?php
namespace Leeyo84\ObjectOriented;

require_once("autoload.php");

require_once (dirname(__DIR__)) . "/vendor/autoload.php";


use http\Exception\InvalidArgumentException;
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
	private $authorId;
	/**
	 * this is the activation token for the Author
	 * @var string $AuthorActivationToken
	 */
	private $authorActivationToken;
	/**
	 * this is the Authors avatar url
	 * @var string $AuthorAvatarUrl
	 */
	private $authorAvatarUrl;
	/**
	 * this is the Author email
	 * @var string $AuthorEmail
	 */
	private $authorEmail;
	/**
	 * this is the Hash for the Author
	 * @var string $AuthorHash
	 */
	private $authorHash;
	/**
	 * this is the Authors username
	 * @var string $AuthorUsername
	 */
	private $authorUsername;

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
	public function __construct($newAuthorId, ?string $newAuthorActivationToken,  string $newAuthorAvatarUrl, string $newAuthorEmail, ?string $newAuthorHash, ?string $newAuthorUsername) {
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
	public function getAuthorId(): Uuid {
		return ($this->authorId);
	}
	/**
	 * mutator method for author id
	 *
	 * @param  Uuid|string$newAuthorId new author id
	 * @param \RangeException if $newAuthorId is not positive
	 * @Throws \TypeError if $newAuthorId is not a uuid
	 **/
	public function setAuthorId($newAuthorId): void {
		try {
				$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		// convert and store the profile id
		$this->authorId = $uuid;
	}
	/**
	 * accessor method for account activation token
	 *
	 * @return string value of the activation token
	 */
	public function getAuthorActivationToken() : ?string {
		return ($this->authorActivationToken);
	}
	/**
	 * mutator method for account activation token
	 *
	 * @param string $newAuthorActivationToken
	 * @throws \InvalidArgumentException  if the token is not a string or insecure
	 * @throws \RangeException if the token is not exactly 32 characters
	 * @throws \TypeError if the activation token is not a string
	 */
	public function setAuthorActivationToken(?string $newAuthorActivationToken): void {
		if($newAuthorActivationToken === null) {
			$this->authorActivationToken = null;
			return;
		}
		$newAuthorActivationToken = strtolower(trim($newAuthorActivationToken));
		if(ctype_xdigit($newAuthorActivationToken) === false) {
			throw(new\RangeException("user activation token is not valid"));
		}
		//make sure user activation token is only 32 characters
		if(strlen($newAuthorActivationToken) !== 32) {
			throw(new\RangeException("user activation token has to be 32"));
		}
		$this->authorActivationToken = $newAuthorActivationToken;
	}
	/**
	 * accessor method for avatar url
	 *
	 * @return int value of the avatar url
	 **/
	public function getAuthorAvatarUrl(): string {
		return ($this->authorAvatarUrl);
	}
	/**
	 * mutator for author avatar url
	 *
	 * @param string $newAuthorAvatarUrl new value of the avatar url
	 * @throws \UnexpectedValueException if $newAuthorAvatarUrl is not a string or insecure
	 * @throws \RangeException if $newAuthorAvatarUrl is >32 characters
	 * @throws \TypeError if $newAuthorAvatar is not a string
	 */
	public function setAuthorAvatarUrl($newAuthorAvatarUrl) {
		//verify the at handle is secure
		$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_VALIDATE_URL);
		if($newAuthorAvatarUrl=== false) {
			throw (new \UnexpectedValueException("avatar url is not valid or empty"));
		}
		// convert and store the activationToken
		$this->authorAvatarUrl = $newAuthorAvatarUrl;
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
	 * @Throws  if $newAuthorEmail is not valid
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
	public function getAuthorHash(): string {
		return $this->authorHash;
	}
	/**
	 * mutator method for author hash
	 *
	 * @param string $newAuthorHash
	 * @throws \InvalidArgumentException if the hash is not secure
	 * @throws \RangeException if the hash is not 97 characters
	 * @throws \TypeErrorif profile hash is not a string
	 **/
	public function setAuthorHash(string $newAuthorHash) : void {
		//enforce that the hash is properly formatted
		$newAuthorHash = trim($newAuthorHash);
		$newAuthorHash = strtolower($newAuthorHash);
		if(empty($newAuthorHash) === true) {
			throw (new \InvalidArgumentException("author hash is not valid"));
		}
		$newAuthorHash = trim($newAuthorHash);
		$newAuthorHash = strtolower($newAuthorHash);
		if(empty($newAuthorHash) === true) {
			throw(new \InvalidArgumentException("author password hash empty or insecure"));
		}
		//enforce that the hash is a string representation of a hexadecimal
		if(!ctype_xdigit($newAuthorHash)) {
			throw(new \InvalidArgumentException("author password hash is empty or insecure"));
		}
		//enforce that the hash is exactly 128 characters.
		if(strlen($newAuthorHash) !== 97) {
			throw(new \RangeException("author hash must be 97 characters"));
		}
		//store the hash
		$this->authorHash = $newAuthorHash;
	}
		//enforce the hash is a string representation of a hexadecimal

	/**
	 * accessor method for author username
	 *
	 * @return value of the author username
	 **/
	public function getAuthorUsername() {
		return $this->authorUsername;
	}
	/**
	 * mutator method for author username
	 *
	 * @param string $newAuthorUsername new value of username
	 * @Throws InvalidArgumentException if author username is not valid
	 * @throws \TypeError if username is not a string
	 **/
	public function setAuthorUsername(string $newAuthorUsername): void {
		//verify username is secure
		$newAuthorUsername = trim($newAuthorUsername);
		$newAuthorUsername = filter_var($newAuthorUsername,FILTER_SANITIZE_STRING);
		if(empty($newAuthorUsername === true)) {
			throw (new \InvalidArgumentException("username is not valid"));
		}
		//  store the author username
		$this->authorUsername = $newAuthorUsername;
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