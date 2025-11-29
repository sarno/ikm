<?php

namespace App\Livewire\Kelolauser;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Index extends Component
{
    public $openModalCreate = false;

    public $changePasswordModal = false;

    public $titleModal = '';

    public $changed = '';

    public $nama;

    public $email;

    public $password;

    public $idItems;

    public $role = 2;

    public $flag = 1;

    public $deleteAlerts = false;

    protected $listeners = [
        'editItems' => 'editItems',
        'deleteItems' => 'deleteItems',
        'changePassword' => 'changePassword',
    ];

    public function render()
    {
        $breadcrumbs = [
            ['url' => 'dashboard', 'text' => 'Home'],
            ['url' => null, 'text' => 'Kelola User'],
        ];

        return view('livewire.kelolauser.index')->layoutData([
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function closeModalCreate()
    {
        $this->openModalCreate = false;
        $this->reset();
    }

    public function store()
    {
        try {
            $this->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required|integer',
                'flag' => 'required|boolean',
            ]);
        } catch (ValidationException $e) {
            $firstErrorMessage = collect($e->errors())->flatten()->first();
            LivewireAlert::title('Validation Error')
                ->text($firstErrorMessage)
                ->error()
                ->toast()
                ->position('top-end')
                ->show();
            throw $e;
        }

        $adduser = new User;
        $adduser->name = $this->nama;
        $adduser->email = $this->email;
        $adduser->current_team_id = $this->role;
        $adduser->password = Hash::make($this->password);
        $adduser->flag = $this->flag;
        $adduser->save();
        $this->openModalCreate = false;
        $this->reset();
        $this->dispatch('refreshDatatable');
        LivewireAlert::title('Success')
            ->text('User "'.$adduser->name.'" berhasil ditambahkan.')
            ->info()
            ->toast()
            ->position('top-end')
            ->show();
    }

    public function editItems($id)
    {
        $this->openModalCreate = true;
        $this->changed = 'updateItems('.$id.')';
        $getDetail = User::find($id);
        $this->nama = $getDetail->name;
        $this->email = $getDetail->email;
        $this->role = $getDetail->current_team_id;
        $this->flag = $getDetail->flag;
        $this->titleModal = 'Edit User : '.$getDetail->name;
    }

    public function updateItems($id)
    {
        try {
            $this->validate([
                'nama' => 'required|string|max:255',
                'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($id)],
                'role' => 'required|integer',
                'flag' => 'required|boolean',
            ]);
        } catch (ValidationException $e) {
            $firstErrorMessage = collect($e->errors())->flatten()->first();
            LivewireAlert::title('Validation Error')
                ->text($firstErrorMessage)
                ->error()
                ->toast()
                ->position('top-end')
                ->show();
            throw $e;
        }

        $getDetail = User::find($id);
        $getDetail->name = $this->nama;
        $getDetail->email = $this->email;
        $getDetail->current_team_id = $this->role;
        $getDetail->flag = $this->flag;
        $getDetail->save();
        $this->dispatch('refreshDatatable');
        LivewireAlert::title('Success')
            ->text('User "'.$getDetail->name.'" berhasil di update.')
            ->info()
            ->toast()
            ->position('top-end')
            ->show();
        $this->reset();
    }

    public function changePassword($id)
    {
        $this->changePasswordModal = true;
        $this->changed = 'updatePassword('.$id.')';
        $getDetail = User::find($id);
        $this->email = $getDetail->email;
        $this->titleModal = 'Edit Password : '.$getDetail->name;
    }

    public function updatePassword($id)
    {
        try {
            $this->validate([
                'password' => 'required|string|min:8',
            ]);
        } catch (ValidationException $e) {
            $firstErrorMessage = collect($e->errors())->flatten()->first();
            LivewireAlert::title('Validation Error')
                ->text($firstErrorMessage)
                ->error()
                ->toast()
                ->position('top-end')
                ->show();
            throw $e;
        }

        $getDetail = User::find($id);
        $getDetail->password = Hash::make($this->password);
        $getDetail->save(); // Save the updated password
        // $this->titleModal = "Edit Password : " . $getDetail->name; // This line is not needed here
        $this->dispatch('refreshDatatable');
        LivewireAlert::title('Success')
            ->text('Password User "'.$getDetail->name.'" berhasil update.')
            ->info()
            ->toast()
            ->position('top-end')
            ->show();
        $this->reset();
    }

    public function deleteItems($id)
    {
        $this->deleteAlerts = true;
        $getDetail = User::find($id);
        $this->nama = $getDetail->name;
        $this->idItems = $id;
    }

    public function closedeleteAlerts()
    {
        $this->deleteAlerts = false;
        $this->reset();
    }

    public function submitDelete($id)
    {
        $getDetail = User::find($id);

        $getDetail->delete();
        $this->dispatch('refreshDatatable');
        LivewireAlert::title('Success')
            ->text('User "'.$getDetail->name.'" berhasil di hapus.')
            ->info()
            ->toast()
            ->position('top-end')
            ->show();
        $this->reset();

        // if ($checkTrx == 0) {
        //     $getDetail->delete();
        //     $this->dispatch("refreshDatatable");
        //     $this->alert(
        //         "success",
        //         'Supplier "' . $getDetail->name . '" berhasil di hapus.',
        //     );
        //     $this->reset();
        // } else {
        //     $this->dispatch("refreshDatatable");
        //     $this->alert(
        //         "warning",
        //         'User "' .
        //             $getDetail->name .
        //             '" tidak dapat di hapus, karna ada transaksi dari user ini. ',
        //     );
        //     $this->reset();
        // }
    }
}
