<div class="col-lg-{{ $col ?? 6 }}">
    <div class="tpd-input">
        <label for="{{ $name }}">
            {{ $label }}
        </label>
        {{-- <input type="text" placeholder="{{ $placeholder ?? $label }}"
            class="form-control
            @error($name) is-invalid @enderror" name="{{ $name }}"
            value="{{ old($name, $value) }}" id="{{ $name }}"> --}}
        <textarea placeholder="{{ $placeholder ?? $label }}" class="form-control @error($name) is-invalid @enderror"
            name="{{ $name }}" id="{{ $name }}">{{ old($name, $value) }}</textarea>

    </div>
    <x-user::input-error :messages="$errors->get($name)" />
</div>
