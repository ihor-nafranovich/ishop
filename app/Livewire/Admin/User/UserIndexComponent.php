<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.admin')]
#[Title('Пользователи')]
class UserIndexComponent extends Component
{

    use WithPagination;

    public function deleteUser(User $user)
    {
        try {
            DB::beginTransaction();
//            $user->orders()->delete();
            DB::table('orders')
                ->where('user_id', '=', $user->id)
                ->update(['user_id' => NULL]);
            $user->delete();
            DB::commit();
            $this->js("toastr.success('Пользователь успешно удален')");
            return;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            $this->js("toastr.error('Ошибка при удалении пользователя')");
        }
    }

    public function render()
    {
        $users = User::query()->orderBy('id', 'desc')->paginate();
        return view('livewire.admin.user.user-index-component', compact('users'));
    }
}
