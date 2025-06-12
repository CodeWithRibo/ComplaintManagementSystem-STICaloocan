<div class="mb-2">
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>
    <select {{ $attributes }} class="select select-bordered w-full" required>
        <option disabled selected> {{$disabledOption}}</option>
       {{$slot}}
    </select>
</div>
