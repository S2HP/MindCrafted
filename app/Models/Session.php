<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Session extends Model {
    protected $table = 'course_sessions';
    protected $fillable = ['user_id', 'title', 'description', 'category_id', 'start_time', 'end_time', 'location', 'capacity', 'price'];
    public function instructor() { return $this->belongsTo(User::class, 'user_id'); }
    public function bookings() { return $this->hasMany(Booking::class); }
    public function user() { return $this->belongsTo(User::class); }
    public function learners() {
        return $this->belongsToMany(User::class, 'bookings', 'session_id', 'learner_id');
    }
}