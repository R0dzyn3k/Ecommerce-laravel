<?php

namespace App\Livewire\Web\Auth;


use App\Enums\UserType;
use App\Models\Customer;
use App\Models\User;
use App\Traits\Admin\Alerts;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


class Register extends Component
{
    use Alerts;


    public ?User $customer = null;


    public string $password = '';


    public string $password_confirmation = '';


    public function login(): void
    {
        $this->redirectRoute('web.login', navigate: true);
    }


    public function mount(): void
    {
        $this->customer = new Customer();
    }


    public function register(): void
    {
        try {
            $this->validate();
        } catch (ValidationException $e) {
            $this->resetPasswordFields();

            throw $e;
        }

        $user = $this->customer->fill([
            'password' => $this->password,
            'role' => UserType::customer(),
        ]);

        $this->customer->save();

        event(new Registered($user));

        Auth::login($user);

        $this->alertSuccess(__('auth.registerSuccess'));

        $this->redirectRoute('web.homepage', navigate: true);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.auth.register')->layout('components.layouts.web', ['title' => __('pages.register')]);
    }


    protected function rules(): array
    {
        return [
            'customer.firstname' => ['required', 'string', 'max:30'],
            'customer.lastname' => ['required', 'string', 'max:30'],
            'customer.email' => ['required', 'email', 'max:255', Rule::unique(Customer::class, 'email')->ignore($this->customer)],
            'customer.phone' => ['nullable', 'string', 'max:20'],
            'password' => ['sometimes', 'nullable', 'string', Password::default(), 'confirmed'],
            'password_confirmation' => ['sometimes', 'nullable', 'required_with:password', 'string', 'same:password'],
        ];
    }


    private function resetPasswordFields(): void
    {
        $this->password = '';
        $this->password_confirmation = '';
    }
}
