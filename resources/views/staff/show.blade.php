<x-bootstrap title="{{ $staff->title }}">
    <div class="row g-4">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{ route('staff.index') }}"> Back</a>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-4">
            <img src="{{ $staff->photo }}" class="img-fluid img-thumbnail" />
        </div>
        <div class="col-lg-8">

            <h2>{{ $staff->title }}</h2>
            <div>{{ $staff->content }} </div>
            <hr />
            <div>
                <strong>Price: </strong>
                <span class="fs-2 text-warning">฿{{ $staff->salary }}</span>
            </div>
            <hr />
            <div>
                <strong>Phone: </strong>
                <span>{{ $staff->phone }}</span>
            </div>
        </div>
    </div>
</x-bootstrap>