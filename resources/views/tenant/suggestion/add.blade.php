<x-tenant-app-layout>
    <x-slot name="header">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Add Your Suggestion</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Suggestions</li>
                  </ol>
                </div>
              </div>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <!-- form start -->
              <form role="form" id="quickForm" action="{{ route('tenant.suggestion.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                      <label>Email</label>
                      <input name="name" class="form-control" value="{{ auth()->user()->email }}" readonly>
                      </div></div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label>Suggestion</label>
                    <input type="text" name="suggest" class="form-control" placeholder="Suggestion" value="{{ old('suggest') }}">
                    @if ($errors->has('suggest'))
                    <span class="text-danger" style="color: red">{{ $errors->first('suggest') }}</span>
                    @endif 
                  </div></div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                    @if ($errors->has('date'))
                    <span class="text-danger" style="color: red">{{ $errors->first('date') }}</span>
                    @endif 
                  </div></div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
</x-tenant-app-layout>
