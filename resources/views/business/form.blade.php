<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="name" value="{{ old('name', $business->name ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Dirección</label>
    <input type="text" name="address" value="{{ old('address', $business->address ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Teléfono</label>
    <input type="text" name="phone" value="{{ old('phone', $business->phone ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $business->email ?? '') }}" class="form-control">
</div>
