<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


    /**
     * One-to-many relationship with Post Model
     *
     * @return Post
     */
    public function posts() {
        return $this->hasMany('Post');
    }

    /**
     * Fields set for mass-assignment
     *
     * @var array
     */
    protected $fillable = array('first_name', 'last_name','email', 'username',
        'role','password', 'active');

    public $timestamps = true;

    /**
     * Array of User Validation Rules
     *
     * @todo fix problem when updating with unique validation on `email` and `username`
     * @var array
     */
    public static $rules = array(
        'first_name' => 'Required|Between:2,25|Alpha',
        'last_name' => 'Required|Between:2,50|Alpha',
        /*'email' => 'Required|Between:5,100|Email|Unique:users',
        'username' => 'Required|Between:5,25|AlphaNum|Unique:users',*/
        'email' => 'Required|Between:5,100|Email',
        'username' => 'Required|Between:5,25|AlphaNum',
        'role' => 'Required|In:developer, admin, user',
        'password' => 'Required|AlphaDash|Between:6,255|Confirmed',
        'password_confirmation' => 'Required|AlphaDash|Between:6,255'
    );
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    /*
    |--------------------------------------------------------------------------
    |  Custom Scope Query Methods
    |--------------------------------------------------------------------------
    |
    | Here is where I put all my custom scope query methods for this model
    |
    */

    /**
     * Find Users where `active` is true
     *
     * @param $query
     */
    public function scopeActive($query) {
        $query->where('active', 1);
    }

    /**
     * Find Users sorted by `id` in ascending order
     *
     * @param $query
     */
    public function scopeSorted($query) {
        $query->orderBy('id', 'asc');
    }


}
