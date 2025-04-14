@extends('backend.layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="callout callout-info">
      <h4>Nội dung bài viết</h4>
      <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.
      </p>
  </div>
  </div>
</section>

<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            Start creating your amazing application!
          </div>
          <div class="card-footer">
            Footer
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
@endsection
