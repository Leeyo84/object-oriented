<?php
namespace DeepDiveCoders\ObjectOriented;

require_once("autoload.php");
require_once (dirname(__DIR__)) . "/vendor/autoload.php";


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
	 * constructor for this Tweet
	 *
	 * @param string|Uuid $newAuthorId id of this Author or null if a new Author
	 * @param string|Uuid $newAuthorActivationToken id of the activation token
	 * @param string $newAuthorAvatarUrl string containing actual tweet data
	 * @param \DateTime|string|null $newTweetDate date and time Tweet was sent or null if set to current date and time
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct($newAuthorId, $newAuthorActivationToken, string $newAuthorEmail, $newAuthorAvatarUrl, $newAuthorHash, $newAuthorUsername) {
		try {
			$this->setAuthorId($newAuthorId);
			$this->setNewAuthorActivationToken($newAuthorActivationToken);
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
		$newAuthorHash= filter_var($newAuthorHash,FILTER_VALIDATE_INT);
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