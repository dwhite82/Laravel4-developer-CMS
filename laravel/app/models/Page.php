<?php

class Page extends BaseModel {

    use Listify;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

    /**
     * Page Constructor
     *
     * @param array $attributes
     * @param bool $exists
     */
    public function __construct(array $attributes = array(), $exists = false) {

        parent::__construct($attributes, $exists);

        $this->initListify([
            'scope' => DB::table($this->getTable())->where('parent_id', '=', 'id')
        ]);
    }

    /**
     * Fields set for mass-assignment
     *
     * @var array
     */
    protected $fillable = array('category_id', 'parent_id','title','permalink', 'position', 'visible',
        'subnav', 'template', 'description');

    public $timestamps = true;

    /**
     * Update `updated_at` value for Category
     *
     * @var array
     */
    protected $touches = array('category');

    /**
     * Page belongs to Category Model
     *
     * @return Category
     */
    public function category()
    {
        return $this->belongsTo('Category');
    }

    /**
     * One to many relationship with Post Model
     *
     * @return Post
     */
    public function posts() {
        return $this->hasMany('Post');
    }

    /**
     * Page has one parent id
     *
     * @return Page
     */

    public function parent()
    {
        return $this->belongsTo('Page', 'parent_id');
    }


    /*public function parent() {
        return $this->hasOne('Page', 'id', 'parent_id');
    }*/

    /**
     * Page has many child page id's
     *
     * @return Page
     */
    public function children() {
        return $this->hasMany('Page', 'parent_id', 'id');
    }

    /**
     * Find all child pages for pages who have them
     *
     * @return static[]
     */
    public static function tree() {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', 0)->get();
    }

    /**
     * Validation Rules
     *
     * @var array
     */
    public static $rules = array(
        'category_id' => 'Integer',
        'parent_id' => 'Integer',
        'title' => 'Required|Between:1,100',
        'permalink' => 'Required|AlphaDash|Max:100',
        'template' => 'AlphaDash'
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
     * Find Pages where `visible` is true
     *
     * @param $query
     */
    public function scopeVisible($query) {
        $query->where('visible', 1);
    }

    /**
     * Sort Pages by position in ascending order
     *
     * @param $query
     */
    public function scopeSorted($query) {
        $query->orderBy('parent_id', 'asc')
            ->orderBy('position', 'asc');
    }

}
