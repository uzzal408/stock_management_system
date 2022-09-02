<div class="tile">
    <form action="{{ route('admin.contents.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">About Page Content</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="total_file">About Page Title</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter a title for about page"
                    id="about_page_title"
                    name="about_page_title"
                    value="{{ config('settings.about_page_title') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="about_page">About Page Content</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Write Description for about page"
                    id="about_page"
                    name="about_page"
                >{!! Config::get('settings.about_page') !!}</textarea>
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
