<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Review extends Model {
 protected $fillable = ['session_id', 'learner_id', 'rating', 'comment'];
}