<div>
    <div class="col-md-12 mx-auto">
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group" wire:ignore wire:init>
                            <select class="selectpicker" id="list" data-live-search="true" wire:model="name">
                                <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="name">SKU<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" wire:model="name" />
                            @error('name')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="name">SKU<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" wire:model="name" />
                            @error('name')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label class="control-label" for="name">SKU<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" wire:model="name" />
                            @error('name')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
