class Customer extends Model
{
    protected $fillable = ['name','email','phone','address'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
