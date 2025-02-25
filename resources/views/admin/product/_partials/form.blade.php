<fieldset class="row">
    <!-- Campo Descrição -->
    <div class="mb-3 col-4">
        <label for="description" class="form-label">Descrição</label>
        <input type="text" id="description" name="description"
            class="form-control @error('description') is-invalid @enderror"
            value="{{ old('description') ?? $product->description }}" required placeholder="Descrição">
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo Preço -->
    <div class="mb-3 col-4">
        <label for="price" class="form-label">Preço R$</label>
        <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror"
            value="{{ old('price') ?? formatQtd($product->price) }}" oninput="formatarNumeroAutomaticoDecimal(this)"
            required placeholder="0,00">
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</fieldset>
