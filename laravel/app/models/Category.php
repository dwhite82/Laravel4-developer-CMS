<?php

class Category extends BaseModel {

    use Listify;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

    /**
     * Category Constructor
     *
     * @param array $attributes
     * @param bool $exists
     */
    public function __construct(array $attributes = array(), $exists = false) {

        parent::__construct($attributes, $exists);

        $this->initListify();
    }

    /**
     * Fields set for mass-assignment
     *
     * @var array
     */
    protected $fillable = array('title','position', 'visible', 'description');

    public $timestamps = true;


    /**
     * One to many relationship with Page Model
     *
     * @return Page
     */
    public function pages() {
        return $this->hasMany('Page');
    }

    /**
     * Validation Rules
     *
     * @var array
     */
    public static $rules = array(
        'title' => 'Required|Min:3|Max:100'
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
     * Find Categories where `visible` is true
     *
     * @param $query
     */
    public function scopeVisible($query) {
        $query->where('visible', 1);
	}

    /**
     * Sort Categories by position in ascending order
     *
     * @param $query
     */
    public function scopeSorted($query) {
        $query->orderBy('position', 'asc');
    }


}
