<div class="form-group">
    <label for="selectcountry">Select Country</label>
    <select id="selectcountry" name="country_id[]" onchange="get_university(this)" class="form-control">
        <option value="">Select Country</option>
            @forelse ( get_country() as $uni)
                <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
            @empty
            <option value="#">No Country Available </option>
        @endforelse
    </select>
</div>
