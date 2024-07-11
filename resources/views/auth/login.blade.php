<x-guest-layout>

    <div class="form-group">
        <a href="{{ route('admin.login') }}" class="user-type-link">
            Admin
        </a>
        <a href="{{ route('tenant.login') }}" class="user-type-link btn1">
            Tenant
        </a>
        <a href="{{ route('rental_owner.login') }}" class="user-type-link btn2">
            Rental Owner
        </a>
    </div>

    @if (session('tenant'))
    <div style="color: green;text-align:center;background-color:white;border-color:white;border-radius:5px 5px;font-size:20px;">
        Logout from tenant account successfully!
    </div>
    @endif

    @if (session('rental_owner'))
    <div style="color: blue;text-align:center;background-color:white;border-color:white;border-radius:5px 5px;font-size:20px;">
        Logout from rental_owner account successfully!
    </div>
    @endif

    @if (session('admin'))
    <div style="color: red;text-align:center;background-color:white;border-color:white;border-radius:5px 5px;font-size:20px;">
        Logout from admin account successfully!
    </div>
    @endif
    
 

</x-guest-layout>
