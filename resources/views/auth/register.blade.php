<x-guest-layout>
    <div class="form-group">
        <a href="{{ route('tenant.register') }}" class="user-type-link btn1">
            Tenant Register
        </a>
        <a href="{{ route('rental_owner.register') }}" class="user-type-link btn2">
            Rental Owner Register
        </a>
    </div>
</x-guest-layout>
