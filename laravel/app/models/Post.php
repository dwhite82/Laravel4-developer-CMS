<?php

class Post extends BaseModel {

    use Listify;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';


    /**
     * Post Constructor
     *
     * @param array $attributes
     * @param bool $exists
     */
    public function __construct(array $attributes = array(), $exists = false) {

        parent::__construct($attributes, $exists);

        $this->initListify([
            'scope' => $this->page()
        ]);
    }

    /**
     * Fields set for mass-assignment
     *
     * @var array
     */
    protected $fillable = array('page_id', 'user_id','title', 'position',
        'visible','content_placement', 'content_type', 'container_attr', 'content' );

    public $timestamps = true;


    /**
     * Update `updated_at` value for Page
     *
     * @var array
     */
    protected $touches = array('page');


    /**
     * Post belongs to Page Model
     *
     * @return Page
     */
    public function page()
    {
        return $this->belongsTo('Page');
    }

    /**
     * Post belongs to User Model
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * Validation Rules
     *
     * @var array
     */
    public static $rules = array(
        'title' => 'Required|Between:1,100',
        'content_placement' => 'Required',
        'content_type' => 'Required'
    );

    /*
    |--------------------------------------------------------------------------
    |  Custom Scope Query Methods
    |--------------------------------------------------------------------------
    |
    | Here is where I put all my custom scope query methods for this model
    |
    */

    /**
     * Find Posts where `visible` is true
     *
     * @param $query
     */
    public function scopeVisible($query) {
        $query->where('visible', 1);
    }

    /**
     * Sort Posts by position in ascending order
     *
     * @param $query
     */
    public function scopeSorted($query) {
        $query->orderBy('position', 'asc');
    }

}
