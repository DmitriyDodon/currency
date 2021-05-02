<div xmlns:wire="http://www.w3.org/1999/xhtml">

    <h1>Введите сумму:</h1>
    <div class="input-group">
        <div class="col-md">
            <label for="validationServer03" class="form-label">Иностранная валюта</label>
            <input type="text" wire:model="inserted" class="form-control @if($errors->has('inserted'))is-invalid @endif"
                   id="validationServer03"
                   aria-describedby="validationServer03Feedback" required>
            <div id="validationServer03Feedback" class="invalid-feedback">
                @error('inserted')
                <div class="block w-full text-red-600">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-group-append">
                <select wire:model="resultCurrency" class="form-select">
                    <option>Выберите валюту</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency['rate'] }}">{{ $currency['txt']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <label class="form-label">Результат</label>
    <div class="input-group mb-3">
        <input type="text" disabled class="form-control" value="{{ $result }}">
        <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect02">UAH</label>
        </div>
    </div>


</div>
