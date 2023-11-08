<?php

namespace App\Models;

use App\Enums\RoleEnum;
use App\Traits\NameTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, NameTrait;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prettyTextIsGraduated()
    {
        return $this->is_graduated ? 'Yes' : 'False';
    }

    public function fullName()
    {
        return $this->first_name ." ". $this->last_name;
    }

    public function approve()
    {
        $user = User::create([
            'username' => $this->student_number,
            'role_id' => Role::where('name', RoleEnum::STUDENT)->first()?->id,
            'password' => bcrypt('1234')
        ]);

        $this->update([
            'user_id' => $user->id,
            'is_approved' => 1,
            'approved_by' => auth()->id(),
        ]);
    }
}
