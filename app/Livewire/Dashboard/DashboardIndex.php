<?php

namespace App\Livewire\Dashboard;

use App\Models\Course;
use App\Models\CourseTopic;
use App\Models\Participant;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardIndex extends Component
{
    public $user, $name, $email, $image, $username, $totalCourse, $totalCourseTopic, $userDetail, $role, $totalParticipant, $totalTeacher;

    public $breadcrumbData = [
        ['label' => 'Dashboard', 'url' => '/'],
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->username = $this->user->username;
        $this->image = $this->user->image ?? asset('images/users/avatar-1.jpg');

        if ($this->user->hasRole('teacher')) {
            $this->role = 'teacher';
            $this->userDetail = $this->user->teacher;
        } elseif ($this->user->hasRole('participant')) {
            $this->role = 'participant';
            $this->userDetail = $this->user->participant;
        } else {
            $this->userDetail = null;
            $this->getTotalTeacher();
        }

        $this->getTotalCourse();
        $this->getTotalCourseTopic();
        $this->getTotalParticipant();
    }

    public function getTotalCourse()
    {
        if ($this->role != null) {
            return $this->totalCourse = $this->user->{$this->role}->courses->count();
        }

        return $this->totalCourse = Course::count();
    }

    public function getTotalCourseTopic()
    {
        if ($this->role != null) {
            if ($this->role == 'participant') {
                return $this->totalCourseTopic = $this->user->{$this->role}->activities->count();
            } else {
                return $this->totalCourseTopic = $this->user->{$this->role}->topics->count();
            }
        }

        return $this->totalCourseTopic = CourseTopic::count();
    }

    public function getTotalTeacher()
    {
        if ($this->user->hasRole('administrator')) {
            return $this->totalTeacher = Teacher::whereHas('user', function ($query) {
                $query->where('status', true);
            })->count();
        }
    }

    public function getTotalParticipant()
    {
        if($this->role == 'teacher') {
            return $this->totalParticipant = Participant::whereHas('courses', function ($query) {
                $query->where('teacher_id', $this->user->teacher->id);
            })->count();
        }

        return $this->totalParticipant = Participant::whereHas('user', function ($query) {
            $query->where('status', true);
        })->count();
    }

    

    public function render()
    {
        return view('livewire.dashboard.dashboard-index')->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => 'Dashboard']);
    }
}
