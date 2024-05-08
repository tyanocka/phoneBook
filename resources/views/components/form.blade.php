<div class="mb-3">
    <label for="name" class="form-label">Имя</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $phonebook ? $phonebook->name : '' }}">
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Номер телефона</label>
    <input type="text" class="form-control" id="phone" name="phone"
        value="{{ $phonebook ? $phonebook->phone : '' }}">
</div>
