<div class="tile">
    <form action="{{ route('admin.contents.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Payment Page Content</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="total_project">Payment Page Title</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter payment page title"
                    id="payment_page_title"
                    name="payment_page_title"
                    value="{{ config('settings.payment_page_title') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="payment_page">Payment Page Content</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Write Description for payment page"
                    id="payment_page"
                    name="payment_page"
                >{!! Config::get('settings.payment_page') !!}</textarea>
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
