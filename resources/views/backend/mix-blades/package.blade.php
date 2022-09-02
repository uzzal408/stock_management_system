<div class="tile">
    <form action="{{ route('admin.contents.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Package Page Content</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="package_page_title">Packages Page title</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter package page title"
                    id="package_page_title"
                    name="package_page_title"
                    value="{{ config('settings.package_page_title') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="about_page">Package Page Content</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Write Description for package page"
                    id="package_page"
                    name="package_page"
                >{!! Config::get('settings.package_page') !!}</textarea>
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                </div>
            </div>
        </div>
    </form>
</div>
