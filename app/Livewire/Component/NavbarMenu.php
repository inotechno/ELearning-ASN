<?php

namespace App\Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavbarMenu extends Component
{
    protected $menuAll = [
        [
            'name' => 'Dashboard',
            'icon' => 'bx bx-home-circle',
            'url' => 'dashboard',
            'roles' => 'administrator|teacher|participant',
        ],
        [
            'name' => 'Courses',
            'icon' => 'bx bxl-discourse',
            'url' => 'courses',
            'roles' => 'administrator|teacher',
        ],
        [
            'name' => 'Position',
            'icon' => 'bx bx-briefcase',
            'url' => 'position',
            'roles' => 'view:position',
        ],
        [
            'name' => 'User',
            'icon' => 'bx bx-user',
            'url' => 'user',
            'roles' => 'view:user',
        ],
        [
            'name' => 'Employee',
            'icon' => 'bx bx-user',
            'url' => 'employees',
            'roles' => 'view:employee',
        ],
        [
            'name' => 'Role',
            'icon' => 'bx bx-user',
            'url' => 'role',
            'roles' => 'view:role',
        ],
        [
            'name' => 'Site',
            'icon' => 'bx bx-building',
            'url' => 'site',
            'roles' => 'view:site',
        ],
        [
            'name' => 'Announcement',
            'icon' => 'bx bx-bell',
            'url' => 'announcement',
            'roles' => 'view:announcement',
        ],
        [
            'name' => 'Attendance',
            'icon' => 'bx bx-badge-check',
            'url' => 'attendance',
            'roles' => 'view:attendance',
        ],
        [
            'name' => 'Daily Report',
            'icon' => 'bx bxl-dailymotion',
            'url' => 'daily-report',
            'roles' => 'view:daily report',
        ],
        [
            'name' => 'Employee Daily Report',
            'icon' => 'bx bxl-dailymotion',
            'url' => 'employee-daily-report',
            'roles' => 'view:employee daily report',
        ],
        [
            'name' => 'Expanse Request',
            'icon' => 'bx bx-wallet-alt',
            'url' => 'expense-request',
            'roles' => 'view:expense request',
        ],
        [
            'name' => 'Employee Expanse Request',
            'icon' => 'bx bx-wallet-alt',
            'url' => 'employee-expense-request',
            'roles' => 'view:employee expense request',
        ],
        [
            'name' => 'Leave Request',
            'icon' => 'bx bx-calendar-check',
            'url' => 'leave-request',
            'roles' => 'view:leave request',
        ],
        [
            'name' => 'Employee Leave Request',
            'icon' => 'bx bx-calendar-check',
            'url' => 'employee-leave-request',
            'roles' => 'view:employee leave request',
        ],
        [
            'name' => 'Sick Leave Request',
            'icon' => 'bx bx-calendar-check',
            'url' => 'sick-leave-request',
            'roles' => 'view:sick leave request',
        ],
        [
            'name' => 'Visit',
            'icon' => 'bx bx-map-pin',
            'url' => 'visit',
            'roles' => 'view:visit',
        ],
        [
            'name' => 'Attendance Report',
            'icon' => 'bx bx-file',
            'url' => 'attendance-report',
            'roles' => 'report:attendance',
        ],
        [
            'name' => 'Daily Report',
            'icon' => 'bx bx-file',
            'url' => 'daily-report',
            'roles' => 'report:daily report',
        ]
    ];

    public function render()
    {

        $user = Auth::user(); // Mendapatkan user yang sedang login
        $menus = [];

        foreach ($this->menuAll as $menu) {
            $requiredRoles = explode('|', $menu['roles']);
            foreach ($requiredRoles as $role) {
                if ($user->hasRole($role)) {
                    $menus[] = [
                        'name' => $menu['name'],
                        'url' => $menu['url'],
                        'icon' => $menu['icon'],
                        'roles' => $menu['roles']
                    ];
                    break; // No need to check further if one role matches
                }
            }

        }

        return view('livewire.component.navbar-menu', compact('menus'));
    }
}
