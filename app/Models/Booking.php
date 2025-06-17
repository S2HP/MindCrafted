<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Booking extends Model {
 protected $fillable = ['session_id', 'learner_id', 'status'];
 public function session() { return $this->belongsTo(Session::class); }
 public function learner() { return $this->belongsTo(User::class, 'learner_id'); }
}