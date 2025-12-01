<div class="mb-3">
  <label>SKU</label>
  <input name="sku" value="{{ old('sku', $product->sku ?? '') }}" class="form-control">
</div>
<div class="mb-3">
  <label>Nombre</label>
  <input name="name" value="{{ old('name', $product->name ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
  <label>Categoría</label>
  <select name="category_id" class="form-control">
    <option value="">-- Ninguna --</option>
    @foreach($categories as $c)
      <option value="{{ $c->id }}" @if(old('category_id', $product->category_id ?? '')==$c->id) selected @endif>{{ $c->name }}</option>
    @endforeach
  </select>
</div>
<div class="mb-3">
  <label>Precio</label>
  <input name="price" value="{{ old('price', $product->price ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
  <label>Stock</label>
  <input name="stock" value="{{ old('stock', $product->stock ?? 0) }}" class="form-control" required>
</div>
<div class="mb-3">
  <label>Imagen</label>
  <input type="file" name="image" class="form-control">
  @if(!empty($product->image)) <img src="/storage/{{ $product->image }}" width="100" class="mt-2"> @endif
</div>
