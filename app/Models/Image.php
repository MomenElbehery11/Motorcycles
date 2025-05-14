<?php
// app/Models/Image.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow the convention
    protected $table = 'images';

    // Specify the fillable fields
    protected $fillable = ['path','price','user_id'];

    // If you have timestamps, you can leave this as is. Otherwise, set to false.
    public $timestamps = true;
    public function user(){
        return $this->belongsTo(User::class);
    }
}
