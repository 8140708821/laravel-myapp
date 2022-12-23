<div>
    <form id="regForm" action="/action_page.php">

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <h1>Step: {{ $currentStep }}</h1>
        <!-- One "tab" for each step in the form: -->
        <div class="{{ $currentStep == 1 ? '' : 'tab' }}">Name:
            <p><input placeholder="First name..." wire:model.defer="formData.fname" name="fname"></p>
            @error('formData.fname')
                <span class="error">{{ $message }}</span>
            @enderror
            <p><input placeholder="Last name..." wire:model.defer="formData.lname" name="lname"></p>
            @error('formData.lname')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="{{ $currentStep == 2 ? '' : 'tab' }}">Contact Info:
            <p><input placeholder="E-mail..." wire:model.defer="formData.email" name="email"></p>
            @error('formData.email')
                <span class="error">{{ $message }}</span>
            @enderror
            <p><input type="number" placeholder="Phone..." wire:model.defer="formData.phone" name="phone"></p>
            @error('formData.phone')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="{{ $currentStep == 3 ? '' : 'tab' }}">Address:
            <p>
                <select wire:model="selectedCountry">
                    <option value="0" selected>Select Country</option>
                    @foreach ($country as $countryData)
                        <option value="{{ $countryData['id'] }}">{{ $countryData['name'] }}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <select wire:model="selectedState">
                    <option value="0" selected>Select State</option>
                    @foreach ($state as $key => $stateData)
                        @if ($selectedCountry == $stateData['country_id'])
                            <option value="{{ $stateData['id'] }}">{{ $stateData['name'] }}</option>
                        @endif
                    @endforeach
                </select>
            </p>
            <p>
                <select wire:model="selectedCity">
                    <option value="" selected>Select City</option>
                    @foreach ($city as $key => $cityData)
                        <option value="{{ $cityData['id'] }}">{{ $cityData['name'] }}</option>
                    @endforeach
                </select>
            </p>
        </div>
        <div class="{{ $currentStep == 4 ? '' : 'tab' }}">Login Info:
            <p><input placeholder="Username..." wire:model.defer="formData.uname" name="uname"></p>
            <p><input place holder="Password..." wire:model.defer="formData.password" name="password" type="password">
            </p>
        </div>
        <div style="overflow:auto;">
            <div style="float:right;">
                <button class="{{ $currentStep != 1 ? '' : 'tab' }}" type="button" id="prevBtn"
                    wire:click="prvStep">Previous</button>
                <button class="{{ $currentStep != 4 ? '' : 'tab' }}" type="button" id="nextBtn"
                    wire:click="nextStep">Next</button>
                <button class="{{ $currentStep != 4 ? 'tab' : '' }}" type="button" id="submitBtn"
                    wire:click="formSubmit">Submit</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step {{ $currentStep == 1 ? 'active' : '' }}"></span>
            <span class="step {{ $currentStep == 2 ? 'active' : '' }}"></span>
            <span class="step {{ $currentStep == 3 ? 'active' : '' }}"></span>
            <span class="step {{ $currentStep == 4 ? 'active' : '' }}"></span>
        </div>
    </form>
</div>
