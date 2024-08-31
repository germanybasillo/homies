<div class="modal fade" id="suggestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-home"></i> Suggestions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal Content Goes Here -->
                <div class="container-fluid">
                    <div class="card card-info elevation-2 centered-card">
                        <br>
                        <div class="col-md-12 table-responsive">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead class="btn-cancel">
                                    <tr>
                                        <th>Suggestion</th>
                                        <th>Date</th>
                                        <th>Reply Owner</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suggestions as $suggestion)
                                    <tr>
                                        <td>{{$suggestion->suggest}}</td>
                                        <td>{{$suggestion->date}}</td>
                                        <td>{{ asdasdas }}</td>
                                        <td>{{ asdasdasd }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="/tenant/suggestions/{{$suggestion->id}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$suggestion->id}}"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <div id="deleteModal{{$suggestion->id}}" class="modal animated rubberBand delete-modal" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form id="deleteForm{{$suggestion->id}}" action="{{ route('tenant.suggestions.destroy', $suggestion->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body text-center">
                                                        <img src="{{asset('logo.png')}}" alt="Logo" width="50" height="46">
                                                        <h3>Are you sure you want to delete this Suggestion?</h3>
                                                        <div class="m-t-20">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal" style="background-color: blue;color:white;border-color:blue;">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <style>
.custom-modal-dialog {
   max-width: 80% !important;
   margin: 1.75rem auto; /* Adjust the top and bottom margins if needed */
}
</style>