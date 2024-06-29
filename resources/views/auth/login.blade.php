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

</x-guest-layout>
